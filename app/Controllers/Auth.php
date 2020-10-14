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
		$this->session				= session();
		$this->email				= \Config\Services::email();
	}

	private function sendEmail($to, $title, $message, $altmessage)
	{
		$this->email->setFrom('pkl.mandalahayu@gmail.com', 'PKL Mandalahayu');
		$this->email->setTo($to);

		$this->email->setSubject($title);
		$this->email->setMessage($message);
		$this->email->setAltMessage($altmessage);

		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}

	public function nyoba()
	{
		$parser = \Config\Services::parser();
		$token  = csrf_hash();
		$data = [
			'title' 		=> 'Email Pemulihan',
			'gambar'		=> 'https://i.ibb.co/xf90Jtq/forgot-password.png',
			'nama' 		=> 'James Bond',
			'pengantar' => 'Sepertinya anda melupakan sesuatu',
			'judul' 		=> 'Pulihkan Katasandi',
			'isi_email'	=> 'Anda telah mencoba memulihkan katasandi melalui web PKL SMK Mandalahayu, klik tombol berikut untuk memulihkan katasandi Anda.',
			'tombol'		=> 'Pulihkan',
			'link'		=> 'http://localhost:8080/auth/pulihkan/' . $token,
			'alt'			=> 'Pemulihan Akun PKL|Mandalahayu a/n Rizqi Ubaidillah (Siswa)',
		];
		// $this->sendEmail('emailnya.ubai@gmail.com', 'Nyoba Kirim Email', $parser->setData($data)->render('email/pulihkan_akun'), $data['alt']);
		echo $parser->setData($data)->render('email/pulihkan_akun');
	}

	public function index()
	{
		if (!session('user_name')) {
			$data = [
				'title'		=>	'Login',
				'session' 	=> $this->session,
			];
			return view('auth/login', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function siswa()
	{
		if (!session('user_name')) {
			$data = [
				'title'		=>	'Sebagai Siswa',
				'kelas'		=>	$this->masterModel->getData('kelas'),
				'session' 	=> $this->session,
			];
			return view('auth/reg_siswa', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function pembimbing()
	{
		if (!session('user_name')) {
			$data = [
				'title'			=>	'Sebagai Pembimbing',
				'perusahaan'	=>	$this->perusahaanModel->where('deleted_at is null')->findAll(),
				'session' 		=> $this->session,
			];
			return view('auth/reg_pembimbing', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function forgot()
	{
		if (!session('user_name')) {
			$data = [
				'title'		=>	'Lupa Password',
				'session' 	=> $this->session,
			];
			return view('auth/forgot', $data);
		} else {
			return redirect()->to('/dashboard');
		}
	}

	public function logout()
	{
		$this->session->destroy();
		$data = [
			'title'		=>	'Login',
			'session' 	=> $this->session,
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
				$user = $user[0];
				if ($user->deleted_at !== null) {
					return json_encode(['user-name' => 'Akun anda telah terhapus, harap menghubungi Admin']);
				} else {
					switch ($user->level) {
						case 'admin':
							$dataUser = $this->adminModel->find($user->nomor_induk);
							break;
						case 'siswa':
							$dataUser = $this->siswaModel->find($user->nomor_induk);
							break;
						case 'pembimbing':
							$dataUser = $this->pembimbingModel->find($user->nomor_induk);
							break;

						default:
							return "salah level";
							break;
					}

					$dataSession = [
						'user_name'		=> $user->username,
						'user_level'	=> ucwords($user->level),
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

	public function cekEmail()
	{
		if (!$this->validate(
			[
				'email'	=>	'required|valid_email',
			],
			[
				'email'				=> [
					'required'		=> "Email wajib diisi",
					'valid_email'	=> "Harap cek kembali Email anda, sepertinya tidak valid.",
				],
			]
		)) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$user = $this->authModel->asObject()->where('email', $this->request->getPost('email'))->limit(1)->find();
			if (count($user) > 0) {
				$user = $user[0];
				switch ($user->level) {
					case 'admin':
						$dataUser = $this->adminModel->find($user->nomor_induk);
						break;
					case 'siswa':
						$dataUser = $this->siswaModel->find($user->nomor_induk);
						break;
					case 'pembimbing':
						$dataUser = $this->pembimbingModel->find($user->nomor_induk);
						break;

					default:
						return redirect()->to('/auth');
						break;
				}
				$parser = \Config\Services::parser();
				$token  = csrf_hash();
				$data = [
					'title' 		=> 'Email Pemulihan',
					'gambar'		=> 'https://i.ibb.co/xf90Jtq/forgot-password.png',
					'nama' 		=> $dataUser->nama,
					'pengantar' => 'Sepertinya anda melupakan sesuatu',
					'judul' 		=> 'Pulihkan Katasandi',
					'isi_email'	=> 'Anda telah mencoba memulihkan katasandi melalui web PKL SMK Mandalahayu, klik tombol berikut untuk memulihkan katasandi Anda.',
					'tombol'		=> 'Pulihkan',
					'link'		=> 'http://localhost:8080/auth/pulihkan/' . $token,
					'alt'			=> 'Pemulihan Akun PKL|Mandalahayu a/n ' . ucwords($dataUser->nama) . ' (' . ucwords($user->level) . ')',
				];
				$updToken = [
					'token'	=> $token,
				];
				$this->authModel->update($user->username, $updToken);
				if ($this->sendEmail($user->email, $data['title'], $parser->setData($data)->render('email/pulihkan_akun'), $data['alt'])) {
					echo json_encode(['result' => "success", 'message' => 'Email pemulihan berhasil dikirim, harap cek email masuk anda.']);
				} else {
					echo json_encode(['result' => "error", 'message' => 'Email tidak terkirim.']);
				}
			} else {
				echo json_encode(['result' => "error", 'message' => 'Email yang anda masukkan tidak terdaftar.']);
			}
		}
	}

	public function pulihkan($token = false)
	{
		if ($token) {
			$user = $this->authModel->asObject()->where('token', $token)->limit(1)->find();
			if (count($user) > 0) {
				$user = $user[0];
				switch ($user->level) {
					case 'admin':
						$dataUser = $this->adminModel->find($user->nomor_induk);
						break;
					case 'siswa':
						$dataUser = $this->siswaModel->find($user->nomor_induk);
						break;
					case 'pembimbing':
						$dataUser = $this->pembimbingModel->find($user->nomor_induk);
						break;

					default:
						return redirect()->to('/auth');
						break;
				}
				$data = [
					'title'		=>	'Reset Katasandi',
					'session' 	=> $this->session,
					'data'		=> $dataUser,
					'login'		=> $user,
				];
				return view('auth/pulihkan', $data);
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Token tidak ditemukan");
			}
		} else {
			return redirect()->to('/auth');
		}
	}

	public function reset($token)
	{
		if (!$this->validate(
			[
				'katasandi_baru'	=>	'required',
				'katasandi_baru2'	=>	'required|matches[katasandi_baru]',
			],
			[
				'katasandi_baru'	=> [
					'required'		=> "Katasandi wajib diisi",
				],
				'katasandi_baru2'	=> [
					'required'		=> "Katasandi wajib diulangi",
					'matches'		=> "Ulangi katasandi tidak cocok",
				],
			]
		)) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$user = $this->authModel->asObject()->where('token', $token)->limit(1)->find();
			if (count($user) > 0) {
				$user = $user[0];
				$data = [
					'password'   	=>  md5($this->request->getPost('katasandi_baru')),
					'token'        =>  null,
				];
				$this->authModel->update($user->username, $data);
				return "berhasil";
			} else {
				return json_encode(['failed' => 'Mohon maaf token anda kadaluarsa!']);
			}
		}
	}
}
