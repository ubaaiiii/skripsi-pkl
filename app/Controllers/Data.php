<?php namespace App\Controllers;

class Data extends BaseController
{

	public function siswa()
	{
		$data = [
			'title' 		=> "Data Siswa",
			'subtitle'	=> "Siswa",
			'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('tables/siswa',$data);
	}

	//--------------------------------------------------------------------

}
