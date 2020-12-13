<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PerusahaanModel;
use App\Models\PembimbingModel;
use App\Models\AdminModel;
use App\Models\MasterModel;
use App\Models\MedsosModel;

class Profile extends BaseController
{

	public function __construct()
	{
		$this->siswaModel			= new SiswaModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->adminModel			= new AdminModel();
		$this->masterModel		= new MasterModel();
		$this->medsosModel		= new MedsosModel();
	}

	public function index()
	{
		if (!session('user_name')) {
			return redirect()->to('/auth');
		}
		$session = $this->session;

		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->tableAdmin($session->nomor_induk)[0];
				$dataSelect	= $this->masterModel->getData('jabatan');
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				$dataSelect	= $this->perusahaanModel->findAll();
				break;

			case ("Siswa"):
				$dataUser = $this->siswaModel->tableSiswa($session->nomor_induk)[0];
				$dataSelect	= $this->masterModel->getData('kelas');
				break;

			default:
				return redirect()->to('/auth');
		}
		// dd($dataUser);

		$medsos = $this->medsosModel->find($session->nomor_induk);
		// dd($medsos);
		$data = [
			'title' 			=> "Profile",
			'subtitle' 		=> "Profile",
			'session'		=> $session,
			'data'			=> $dataUser,
			'dataSelect' 	=> $dataSelect,
			'medsos'			=>	$medsos,
		];
		// dd($data['data']);
		return view('profile', $data);
	}

	public function updatePhoto($sebagai)
	{
	}

	public function updateProfile($sebagai)
	{
		$data = [
			'nama'	=> $this->request->getPost('user-nama'),
			'email'	=> $this->request->getPost('user-email'),
			'alamat'	=> $this->request->getPost('alamat'),
		];
		$dataLogin =	[
			'username'	=> $this->request->getPost('user-name'),
			'email'		=> $data['email'],
		];

		if ($sebagai == 'admin') {
			$model = $this->adminModel;
		} elseif ($sebagai == 'pembimbing') {
			$model = $this->pembimbingModel;
		} elseif ($sebagai == 'siswa') {
			$model = $this->siswaModel;
		}
	}



	//--------------------------------------------------------------------

}
