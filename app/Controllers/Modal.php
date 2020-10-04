<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SiswaModel;
use App\Models\PerusahaanModel;
use App\Models\PembimbingModel;
use App\Models\MasterModel;

class Modal extends BaseController
{

	public function __construct()
	{
		$this->adminModel				= new AdminModel();
		$this->siswaModel				= new SiswaModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->masterModel			= new MasterModel();
	}

	public function siswa($tipe = "tambah", $ni = false)
	{
		$data = [
			'judul_modal'	=> '<i class="feather icon-user-plus"></i> Tambah Data Siswa',
			'tipe'				=> $tipe,
			'kelas'				=> $this->masterModel->getData('kelas'),
		];

		if ($tipe == 'ubah') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Ubah Data Siswa';
			$data['siswa']				=	$this->siswaModel->find($ni);
		} else if ($tipe == 'lihat') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Data Siswa';
			$data['siswa']				=	$this->siswaModel->find($ni);
		}

		return view('modals/siswa', $data);
	}

	public function admin($tipe = "tambah", $ni = false)
	{
		$data = [
			'judul_modal'	=> '<i class="feather icon-user-plus"></i> Tambah Data Admin',
			'tipe'				=> $tipe,
			'jabatan'			=> $this->masterModel->getData('jabatan'),
		];

		if ($tipe == 'ubah') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Ubah Data Admin';
			$data['admin']				=	$this->adminModel->find($ni);
		} else if ($tipe == 'lihat') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Data Admin';
			$data['admin']				=	$this->adminModel->find($ni);
		}

		return view('modals/admin', $data);
	}

	public function pembimbing($tipe = "tambah", $ni = false)
	{
		$data = [
			'judul_modal'	=> '<i class="feather icon-user-plus"></i> Tambah Data Pembimbing',
			'tipe'				=> $tipe,
			'perusahaan'	=> $this->perusahaanModel->where('deleted_at IS NULL')->findAll(),
		];

		if ($tipe == 'ubah') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Ubah Data Pembimbing';
			$data['pembimbing']		=	$this->pembimbingModel->find($ni);
		} else if ($tipe == 'lihat') {
			$data['judul_modal']	= '<i class="feather icon-user"></i> Data Pembimbing';
			$data['pembimbing']		=	$this->pembimbingModel->find($ni);
		}

		return view('modals/pembimbing', $data);
	}

	public function perusahaan($tipe = "tambah", $id = false)
	{
		$data = [
			'judul_modal'	=> '<i class="feather icon-plus"></i> Tambah Data Perusahaan',
			'tipe'				=> $tipe,
			'jabatan'			=> $this->masterModel->getData('jabatan'),
		];

		if ($tipe == 'ubah') {
			$data['judul_modal']	= '<i class="feather icon-edit"></i> Ubah Data Perusahaan';
			$data['perusahaan']				=	$this->perusahaanModel->find($id);
		} else if ($tipe == 'lihat') {
			$data['judul_modal']	= '<i class="feather icon-info"></i> Data Perusahaan';
			$data['perusahaan']				=	$this->perusahaanModel->find($id);
		}

		return view('modals/perusahaan', $data);
	}

	public function sampah($tabel)
	{
		$data = [
			'judul_modal'	=> '<i class="feather icon-trash-2"></i> Tabel Sampah ' . ucwords($tabel),
			'table'				=> $tabel,
		];

		switch ($tabel) {
			case 'admin':
				$data['kolomnya']	=	$this->adminModel->getFields();
				$data['primary']	= "nomor_induk";
				break;
			case 'siswa':
				$data['kolomnya']	=	$this->siswaModel->getFields();
				$data['primary']	= "nomor_induk";
				break;
			case 'perusahaan':
				$data['kolomnya']	=	$this->perusahaanModel->getFields();
				$data['primary']	= "id";
				break;

			default:
				// code...
				break;
		}
		// dd($data);

		return view('modals/sampah', $data);
	}

	//--------------------------------------------------------------------

}
