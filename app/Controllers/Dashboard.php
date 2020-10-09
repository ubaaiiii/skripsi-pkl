<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PembimbingModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->siswaModel			= new SiswaModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->adminModel			= new AdminModel();
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
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			case ("Siswa"):
				$dataUser = $this->siswaModel->tableSiswa($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}

		$data = [
			'title' 		=> "Dashboard",
			'subtitle' 	=> "Dashboard",
			'session'	=> $session,
			'data'		=> $dataUser,
		];
		return view('dashboard', $data);
	}

	//--------------------------------------------------------------------

}
