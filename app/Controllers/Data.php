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

	public function siswa()
	{
		$data = [
			'title' 			=> "Data Siswa",
			'subtitle'		=> "Siswa",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'				=> $this->masterModel->getData('kelas'),
			'jurusan'			=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
		];
		// dd($data['kelas']);
		return view('tables/siswa',$data);
	}

	public function pembimbing()
	{
		$data = [
			'title' 		=> "Data Pembimbing",
			'subtitle'	=> "Pembimbing",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'				=> $this->masterModel->getData('kelas'),
			'jurusan'			=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
		];
		return view('tables/pembimbing',$data);
	}

	public function perusahaan()
	{
		$data = [
			'title' 			=> "Data Perusahaan",
			'subtitle'		=> "Perusahaan",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'				=> $this->masterModel->getData('kelas'),
			'jurusan'			=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
		];
		// dd($data['kelas']);
		return view('tables/perusahaan',$data);
	}

	public function admin()
	{
		$data = [
			'title' 			=> "Data Admin",
			'subtitle'		=> "Admin",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'jabatan'			=> $this->masterModel->getData('jabatan'),
			'jurusan'			=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
		];
		return view('tables/admin',$data);
	}

	//--------------------------------------------------------------------

}
