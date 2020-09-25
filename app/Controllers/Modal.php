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

	public function siswa($tipe = "tambah", $ni = false)
	{
		$data = [
			'judul_modal'	=> 'Tambah Data Siswa',
			'tipe'				=> $tipe,
			'kelas'				=> $this->masterModel->getData('kelas'),
		];

		if ($tipe == 'ubah') {
			$data['judul_modal']	= 'Ubah Data Siswa';
			$data['siswa']				=	$this->siswaModel->find($ni);
		}

		return view('modals/siswa',$data);
	}

	public function kegiatan()
	{
		// code...
	}

	//--------------------------------------------------------------------

}
