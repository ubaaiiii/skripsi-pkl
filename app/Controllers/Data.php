<?php namespace App\Controllers;

class Data extends BaseController
{

	public function siswa()
	{
		$data = [
			'title' 		=> "Data Siswa",
			'subtitle'	=> "Siswa"
		];
		return view('tables/siswa',$data);
	}

	//--------------------------------------------------------------------

}
