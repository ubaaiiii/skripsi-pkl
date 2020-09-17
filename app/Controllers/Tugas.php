<?php namespace App\Controllers;

class Tugas extends BaseController
{

	public function index()
	{
		$data = [
			'title' 		=> "Tugas",
			// 'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('tugas',$data);
	}

	public function kegiatan()
	{
		$data = [
			'title' 		=> "Agenda Kegiatan",
			'subtitle'	=> "Siswa",
			'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js').'"></script>
											<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js').'"></script>',
		];
		return view('tables/siswa',$data);
	}

	//--------------------------------------------------------------------

}
