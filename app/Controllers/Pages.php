<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Dashboard",
		];
		return view('dashboard',$data);
	}

	//--------------------------------------------------------------------

}
