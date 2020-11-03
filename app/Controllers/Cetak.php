<?php

namespace App\Controllers;

class Cetak extends BaseController
{

	public function index()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Monitoring",
			'subtitle' 	=> "Monitoring",
			'session'	=> $this->session,
		];
		return view('monitoring', $data);
	}

	public function surat_pengantar($id)
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		}
	}
}
