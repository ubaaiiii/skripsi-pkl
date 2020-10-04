<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'title' 		=> "Dashboard",
			'subtitle' 	=> "Dashboard",
		];
		return view('dashboard', $data);
	}

	//--------------------------------------------------------------------

}
