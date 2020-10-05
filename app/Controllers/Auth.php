<?php

namespace App\Controllers;

use App\Models\MasterModel;
use App\Models\PerusahaanModel;
use App\Models\SiswaModel;
use App\Models\AdminModel;
use App\Models\PembimbingModel;
use App\Models\AuthModel;

class Auth extends BaseController
{

	public function __construct()
	{
		$this->masterModel		= new MasterModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->siswaModel			= new SiswaModel();
		$this->adminModel			= new AdminModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->authModel			= new AuthModel();
	}

	public function index()
	{
		if (!session('user_name')) {
			$data = [
				'title'	=>	'Login',
			];
			return view('auth/login', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function siswa()
	{
		$data = [
			'title'	=>	'Sebagai Siswa',
			'kelas'	=>	$this->masterModel->getData('kelas'),
		];
		return view('auth/reg_siswa', $data);
	}

	public function pembimbing()
	{
		$data = [
			'title'			=>	'Sebagai Pembimbing',
			'perusahaan'	=>	$this->perusahaanModel->where('deleted_at is null')->findAll(),
		];
		return view('auth/reg_pembimbing', $data);
	}

	public function forgot()
	{
		$data = [
			'title'	=>	'Lupa Password',
		];
		return view('auth/forgot', $data);
	}

	public function logout()
	{
		$this->session->destroy();
		$data = [
			'title'	=>	'Login',
		];
		return view('auth/login', $data);
	}

	public function login()
	{
		$username	= $this->request->getPost('user-name');
		$password	= md5($this->request->getPost('user-password'));
		$userSession = $this->session->user_name;
		if (!$userSession && $username !== null && $password !== null) {
			$dataLogin = [
				'username'	=> $username,
				'password'	=> $password,
			];
			$user = $this->authModel->asObject()->where($dataLogin)->limit(1)->find();
			if (count($user) > 0) {
				if ($user[0]->deleted_at !== null) {
					return json_encode(['user-name' => 'Akun anda telah terhapus, harap menghubungi Admin']);
				} else {
					switch ($user[0]->level) {
						case 'admin':
							$dataUser = $this->adminModel->find($user[0]->nomor_induk);
							break;
						case 'siswa':
							$dataUser = $this->siswaModel->find($user[0]->nomor_induk);
							break;
						case 'pembimbing':
							$dataUser = $this->pembimbingModel->find($user[0]->nomor_induk);
							break;

						default:
							return "salah level";
							break;
					}

					$dataSession = [
						'user_name'		=> $user[0]->username,
						'user_level'	=> ucwords($user[0]->level),
						'user_nama'		=> ucwords($dataUser->nama),
						'user_foto'		=> $dataUser->foto,
						'nomor_induk'	=> $dataUser->nomor_induk,
					];

					$this->session->set($dataSession);
					return json_encode(['result' => 'success', 'message' => 'Berhasil masuk, sedang mengalihkan ke halaman dashboard...']);
				}
			} else {
				return json_encode(['result' => 'error', 'message' => 'Nama Pengguna dan Katasandi tidak cocok']);
			}
		}
	}
}
