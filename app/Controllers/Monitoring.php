<?php

namespace App\Controllers;

class Monitoring extends BaseController
{

	public function index()
	{
		$data = [
			'title' 		=> "Monitoring",
			'subtitle' 	=> "Monitoring",
			'session'	=> $this->session,
		];
		return view('monitoring', $data);
	}

	public function kegiatan()
	{
		$data = [
			'title' 		=> "Kegiatan Siswa",
			'subtitle'	=> "Kegiatan Siswa",
			'session'	=> $this->session,
		];
		return view('monitoring/kegiatan', $data);
	}

	public function absensi()
	{
		$data = [
			'title' 		=> "Absen Siswa",
			'subtitle'	=> "Absen Siswa",
			'session'	=> $this->session,
		];
		return view('monitoring/absensi', $data);
	}

	//--------------------------------------------------------------------

}
