<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\AdminModel;

class Admin extends BaseController
{

protected $adminModel;

	public function __construct()
	{
		$this->adminModel = new adminModel();
	}

	public function index($ni)
	{
		$admin = $this->adminModel;
		echo $admin->cekSyarat($ni);
	}

	public function data($ni = false)
	{
		if ($ni) {
			echo json_encode($this->adminModel->tableAdmin($ni));
		} else {
			echo json_encode($this->adminModel->tableAdmin());
		}
	}

	public function tambah()
	{
		$admin = $this->adminModel;
		if (!$this->validate([
			'nomor_induk'		=>	'required|integer|is_unique[admin.nomor_induk]',
			'nama'					=>	'required',
			'jenis_kelamin'	=>	'required',
			'notelp'				=>	'required',
			'alamat'				=>	'required',
			'jabatan'				=>	'required',
		],
		[
			'nomor_induk'		=> [
				'required'	=> "Nomor induk wajib diisi",
				'is_unique'	=> "Nomor induk sudah terdaftar atau mungkin terhapus",
			],
			'nama'					=> [
				'required'	=> "Nama wajib diisi",
			],
			'jenis_kelamin'	=> [
				'required'	=> "Wajib memilih jenis kelamin",
			],
			'alamat'				=> [
				'required'	=> "Alamat wajib diisi",
			],
			'kelas'					=> [
				'required'	=> "Wajib memilih kode kelas",
			],
		])) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$gambar = $this->request->getFile('upload_foto');
			$nmFoto	= $admin->simpanGambar($gambar,$this->request->getPost('nomor_induk'));
			$status	=	$admin->cekSyarat($this->request->getPost('kelas'));
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'kelas'         =>  $this->request->getPost('kelas'),
				'foto'					=>	$nmFoto,
				'status'				=>	$status,
			];
			$admin->insert($data);
			echo "berhasil";
		}
	}

	public function ubah()
	{
		$admin = $this->adminModel;
		if ($this->request->getPost('nomor_induk') !== $this->request->getPost('nomor_induk_real')) {
			$cekadmin	= $admin->find($this->request->getPost('nomor_induk'));
			if ($cekadmin !== null) {
				return "exists";
			}
		}

		$data = [
			'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
			'nama'          =>  $this->request->getPost('nama'),
			'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
			'alamat'        =>  $this->request->getPost('alamat'),
			'kelas'         =>  $this->request->getPost('kelas'),
		];
		$gambar = $this->request->getFile('upload_foto');
		if ($gambar->isValid() && ! $gambar->hasMoved()) {
			$dataadmin	= $admin->find($this->request->getPost('nomor_induk'));
			$gambarLama	= "/images/users/".$dataadmin->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $admin->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$admin->update($this->request->getPost('nomor_induk_real'),$data);
		echo "berhasil";

	}

	public function hapus()
	{
		$admin = $this->adminModel;
		return $admin->delete($this->request->getPost('nomor_induk'));
	}



}
