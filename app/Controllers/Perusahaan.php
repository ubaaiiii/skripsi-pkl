<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\PerusahaanModel;

class Perusahaan extends BaseController
{

protected $perusahaanModel;

	public function __construct()
	{
		$this->perusahaanModel = new PerusahaanModel();
	}

	public function index($id = false)
	{
		$perusahaan = $this->perusahaanModel;
		dd($perusahaan->trashSiswa());
	}

	public function data($id = false)
	{
		if ($id) {
			echo json_encode($this->perusahaanModel->tablePerusahaan($id));
		} else {
			echo json_encode($this->perusahaanModel->tablePerusahaan());
		}
	}

	public function trash()
	{
		return json_encode($this->perusahaanModel->onlyDeleted()->findAll());
	}

	public function tambah()
	{
		$perusahaan = $this->perusahaanModel;
		if (!$this->validate([
			'nama'					=>	'required|alpha_space|is_unique[perusahaan.nama]',
			'notelp'				=>	'required|integer',
			'alamat'				=>	'required',
		],
		[
			'nama'					=> [
				'required'		=> "Nama perusahaan wajib diisi",
				'alpha_space'	=> "Nama perusahaan hanya boleh mengandung huruf dan spasi",
				'is_unique'		=> "Nama perusahaan sudah terdaftar atau mungkin terhapus",
			],
			'notelp'				=> [
				'required'		=> "Nomor telepon wajib diisi",
				'integer'			=> "Nomor telepon hanya boleh mengandung angka",
			],
			'alamat'				=> [
				'required'	=> "Alamat wajib diisi",
			],
		])) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$gambar = $this->request->getFile('upload_foto');
			if ($gambar->isValid() && ! $gambar->hasMoved()) {
				$nmFoto	= $perusahaan->simpanGambar($gambar,$this->request->getPost('id'));
				$data = [
					'nama'          =>  $this->request->getPost('nama'),
					'notelp' 				=>  $this->request->getPost('notelp'),
					'alamat'        =>  $this->request->getPost('alamat'),
					'logo'					=>	$nmFoto,
				];
				$perusahaan->insert($data);
				echo "berhasil";
			} else {
				echo json_encode(['upload_foto' => 'Harap memilih logo perusahaan']);
			}
		}
	}

	public function ubah()
	{
		$perusahaan = $this->perusahaanModel;

		$data = [
			'nama'          =>  $this->request->getPost('nama'),
			'notelp' 				=>  $this->request->getPost('notelp'),
			'alamat'        =>  $this->request->getPost('alamat'),
		];

		$gambar = $this->request->getFile('upload_foto');
		if ($gambar->isValid() && ! $gambar->hasMoved()) {
			$dataPerusahaan	= $perusahaan->find($this->request->getPost('id'));
			$gambarLama			= "/images/perusahaan/".$dataPerusahaan->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $perusahaan->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$perusahaan->update($this->request->getPost('id'),$data);
		echo "berhasil";
	}

	public function hapus()
	{
		$perusahaan = $this->perusahaanModel;
		$perusahaan->delete($this->request->getPost('id'));
	}



}
