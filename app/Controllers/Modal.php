<?php namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PerusahaanModel;
use App\Models\MasterModel;

class Modal extends BaseController
{

	public function __construct()
	{
		$this->siswaModel	= new SiswaModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->masterModel	= new MasterModel();
	}

	public function siswa()
	{
		$data = [
			'kelas'				=> $this->masterModel->getData('kelas'),
		];
		return view('modals/siswa',$data);
	}

	public function kegiatan()
	{
		// code...
	}

	//--------------------------------------------------------------------

}
