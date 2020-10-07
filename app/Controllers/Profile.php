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
				$dataUser = $this->adminModel->find($session->nomor_induk);
				$dataSelect	= $this->masterModel->getData('jabatan');
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->find($session->nomor_induk);
				$dataSelect	= $this->perusahaanModel->findAll();
				break;

			case ("Siswa"):
				$dataUser = $this->siswaModel->find($session->nomor_induk);
				$dataSelect	= $this->masterModel->getData('kelas');
				break;

			default:
				return redirect()->to('/auth');
		}

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
		return view('profile', $data);
	}

	//--------------------------------------------------------------------

}
