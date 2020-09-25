<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PerusahaanModel;
use App\Models\PembimbingModel;
use App\Models\AdminModel;
use App\Models\MasterModel;

class Data extends BaseController
{

	public function __construct()
	{
		$this->siswaModel	= new SiswaModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->adminModel	= new AdminModel();
		$this->masterModel	= new MasterModel();
	}

	public function index()
	{
		// $faker = \Faker\Factory::create('id_ID');
		// dd($faker->phoneNumber);
		$data = [
			'jml_siswa'				=> $this->siswaModel->countAllResults(),
			'jml_pembimbing'	=> $this->pembimbingModel->countAllResults(),
			'jml_perusahaan'	=> $this->perusahaanModel->countAllResults(),
			'jml_admin'				=> $this->adminModel->countAllResults(),
			'title' 					=> "Data",
			'subtitle' 				=> "Data",
			// 'script'				=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('data',$data);
	}

	public function siswa($tipe = null)
	{

		$data = [
			'title' 			=> "Data Siswa",
			'subtitle'		=> "Siswa",
			'script'			=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js').'"></script>
												<script src="'.base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js').'"></script>',
			'perusahaan'	=> $this->perusahaanModel->findAll(),
		];
		return view('tables/siswa',$data);
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
