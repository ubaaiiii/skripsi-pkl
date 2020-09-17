<?php namespace App\Controllers;

class Tugas extends BaseController
{

	public function index()
	{
		$data = [
			'title' 		=> "Tugas",
			'subtitle' 	=> "Tugas",
			// 'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('tugas',$data);
	}

	public function kegiatan()
	{
		$data = [
			'title' 		=> "Agenda Kegiatan",
			'subtitle'	=> "Agenda Kegiatan",
			'script'		=> '<script src="'.base_url('vuexy/app-assets/js/scripts/pages/app-todo.js').'"></script>',
		];
		return view('tugas/kegiatan',$data);
	}

	public function absensi()
	{
		$data = [
			'title' 		=> "Absensi",
			'subtitle'	=> "Absensi",
			'script'		=> '<script src="'.base_url('vuexy/app-assets/js/scripts/extensions/fullcalendar.js').'"></script>',
		];
		return view('tugas/absensi',$data);
	}

	//--------------------------------------------------------------------

}
