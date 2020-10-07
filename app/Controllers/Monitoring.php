<?php

namespace App\Controllers;

class Monitoring extends BaseController
{

	public function index()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin','Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Monitoring",
			'subtitle' 	=> "Monitoring",
			'session'	=> $this->session,
		];
		return view('monitoring', $data);
	}

	public function kegiatan()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin','Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Kegiatan Siswa",
			'subtitle'	=> "Kegiatan Siswa",
			'session'	=> $this->session,
		];
		return view('monitoring/kegiatan', $data);
	}

	public function absensi()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin','Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Absen Siswa",
			'subtitle'	=> "Absen Siswa",
			'session'	=> $this->session,
		];
		return view('monitoring/absensi', $data);
	}

	//--------------------------------------------------------------------

}
