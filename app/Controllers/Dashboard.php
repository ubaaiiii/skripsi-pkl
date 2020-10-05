<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		if (!session('user_name')) {
			return redirect()->to('/auth');
		}
		$data = [
			'title' 		=> "Dashboard",
			'subtitle' 	=> "Dashboard",
			'session'	=> $this->session,
		];
		return view('dashboard', $data);
	}

	//--------------------------------------------------------------------

}
