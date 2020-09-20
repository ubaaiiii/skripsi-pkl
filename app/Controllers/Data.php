<?php
namespace App\Controllers;

use App\Models\SiswaModel;

class Data extends BaseController
{
	protected $siswaModel;

	public function __construct()
	{
		$this->siswaModel	= new SiswaModel();
	}

	public function index()
	{
		$data = [
			'title' 		=> "Data",
			'subtitle' 	=> "Data",
			// 'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('data',$data);
	}

	public function siswa($tipe = null)
	{
		$siswaModel	= new SiswaModel();
		if ($tipe == 'data') {
			echo json_encode($this->siswaModel->tableSiswa());
		} else {
			$data = [
				'title' 		=> "Data Siswa",
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
	}

	public function pembimbing()
	{
		$data = [
			'title' 		=> "Data Pembimbing",
			'subtitle'	=> "Pembimbing",
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
		return view('tables/pembimbing',$data);
	}

	public function perusahaan()
	{
		$data = [
			'title' 		=> "Data Perusahaan",
			'subtitle'	=> "Perusahaan",
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
		return view('tables/perusahaan',$data);
	}

	public function admin()
	{
		$data = [
			'title' 		=> "Data Admin",
			'subtitle'	=> "Admin",
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
		return view('tables/admin',$data);
	}

	//--------------------------------------------------------------------

}
