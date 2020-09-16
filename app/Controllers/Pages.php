<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Home",
			'subtitle' => "Dashboard",
		];
		return view('index',$data);
	}

	//--------------------------------------------------------------------

}
