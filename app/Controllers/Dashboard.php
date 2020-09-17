<?php namespace App\Controllers;

class dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'title' 		=> "Dashboard",
			'subtitle' 	=> "Dashboard",
		];
		return view('dashboard',$data);
	}

	//--------------------------------------------------------------------

}
