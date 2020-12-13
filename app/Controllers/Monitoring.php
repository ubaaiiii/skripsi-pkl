<?php

namespace App\Controllers;

use App\Models\PembimbingModel;
use App\Models\AdminModel;

class Monitoring extends BaseController
{

	public function __construct()
	{
		$this->pembimbingModel	= new PembimbingModel();
		$this->adminModel	= new AdminModel();
	}

	public function index()
	{
		$session = $this->session;
		if (!session('user_name')) {
			$session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 		=> "Monitoring",
			'subtitle' 	=> "Monitoring",
			'session'	=> $this->session,
			'data'		=> $dataUser,
		];
		return view('monitoring', $data);
	}

	public function kegiatan()
	{
		$session = $this->session;
		if (!session('user_name')) {
			$session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 		=> "Kegiatan Siswa",
			'subtitle'	=> "Kegiatan Siswa",
			'session'	=> $this->session,
			'data'		=> $dataUser,
		];
		return view('monitoring/kegiatan', $data);
	}

	public function absensi()
	{
		$session = $this->session;
		if (!session('user_name')) {
			$session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 		=> "Absen Siswa",
			'subtitle'	=> "Absen Siswa",
			'session'	=> $this->session,
			'data'		=> $dataUser,
		];
		return view('monitoring/absensi', $data);
	}

	//--------------------------------------------------------------------

}
