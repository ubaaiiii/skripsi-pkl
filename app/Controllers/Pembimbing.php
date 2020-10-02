<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\PembimbingModel;

class Pembimbing extends BaseController
{

protected $pembimbingModel;

	public function __construct()
	{
		$this->pembimbingModel = new pembimbingModel();
	}

	public function index($ni)
	{
		$pembimbing = $this->pembimbingModel;
		echo $pembimbing->cekSyarat($ni);
	}

	public function data($ni = false)
	{
		if ($ni) {
			echo json_encode($this->pembimbingModel->tablePembimbing($ni));
		} else {
			echo json_encode($this->pembimbingModel->tablePembimbing());
		}
	}

	public function trash()
	{
		return json_encode($this->pembimbingModel->trashPembimbing());
	}

	public function tambah()
	{
		$pembimbing = $this->pembimbingModel;
		if (!$this->validate([
			'nomor_induk'		=>	'required|integer|is_unique[pembimbing.nomor_induk]',
			'nama'					=>	'required|alpha_space',
			'jenis_kelamin'	=>	'required',
			'jabatan'				=>	'required',
			'notelp'				=>	'required|integer',
			'email'					=>	'required|valid_email',
			'alamat'				=>	'required',
		],
		[
			'nomor_induk'		=> [
				'required'		=> "Nomor induk wajib diisi",
				'is_unique'		=> "Nomor induk sudah terdaftar atau mungkin terhapus",
				'integer'			=> "Nomor induk hanya boleh mengandung angka",
			],
			'nama'					=> [
				'required'		=> "Nama wajib diisi",
				'alpha_space'	=> "Nama hanya boleh mengandung huruf dan spasi",
			],
			'jenis_kelamin'	=> [
				'required'		=> "Wajib memilih jenis kelamin",
			],
			'jabatan'				=> [
				'required'		=> "Jabatan wajib diisi",
			],
			'notelp'				=> [
				'required'		=> "Nomor telepon wajib diisi",
				'integer'			=> "Nomor telepon hanya boleh mengandung angka",
			],
			'email'					=> [
				'required'		=> "Email wajib diisi",
				'valid_email'	=> "Email tidak valid",
			],
			'alamat'				=> [
				'required'		=> "Alamat wajib diisi",
			],
		])) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$gambar = $this->request->getFile('upload_foto');
			$nmFoto	= $pembimbing->simpanGambar($gambar,$this->request->getPost('nomor_induk'));
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'jabatan'       =>  $this->request->getPost('jabatan'),
				'notelp'        =>  $this->request->getPost('notelp'),
				'email'        	=>  $this->request->getPost('email'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'foto'					=>	$nmFoto,
			];
			$pembimbing->insert($data);
			echo "berhasil";
		}
	}

	public function ubah()
	{
		$pembimbing = $this->pembimbingModel;
		if ($this->request->getPost('nomor_induk') !== $this->request->getPost('nomor_induk_real')) {
			$cekpembimbing	= $pembimbing->find($this->request->getPost('nomor_induk'));
			if ($cekpembimbing !== null) {
				return "exists";
			}
		}

		$data = [
			'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
			'nama'          =>  $this->request->getPost('nama'),
			'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
			'jabatan'       =>  $this->request->getPost('jabatan'),
			'notelp'        =>  $this->request->getPost('notelp'),
			'email'        	=>  $this->request->getPost('email'),
			'alamat'        =>  $this->request->getPost('alamat'),
		];
		$gambar = $this->request->getFile('upload_foto');
		if ($gambar->isValid() && ! $gambar->hasMoved()) {
			$datapembimbing	= $pembimbing->find($this->request->getPost('nomor_induk'));
			$gambarLama	= "/images/users/".$datapembimbing->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $pembimbing->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$pembimbing->update($this->request->getPost('nomor_induk_real'),$data);
		echo "berhasil";

	}

	public function hapus()
	{
		$pembimbing = $this->pembimbingModel;
		return $pembimbing->delete($this->request->getPost('nomor_induk'));
	}



}
