<?php

namespace App\Controllers;

use App\Models\MasterModel;

class Auth extends BaseController
{

	public function __construct()
	{
		$this->masterModel	= new MasterModel();
	}

	public function index()
	{
		if (!session('pkl-mandala')) {
			$data = [
				'title'	=>	'Login',
			];
			return view('auth/login', $data);
		} else {
			redirect()->to('dashboard/index');
		}
	}

	public function siswa()
	{
		$data = [
			'title'	=>	'Daftar Siswa',
			'kelas'	=>	$this->masterModel->getData('kelas'),
		];
		return view('auth/reg_siswa', $data);
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
	}
}
