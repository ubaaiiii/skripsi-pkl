<?php

namespace App\Controllers;

class Profile extends BaseController
{
	public function index()
	{
		$data = [
			'title' 		=> "Profile",
			'subtitle' 	=> "Profile",
		];
		return view('profile', $data);
	}

	//--------------------------------------------------------------------

}
