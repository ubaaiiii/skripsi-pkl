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

	public function trash()
	{
		return json_encode($this->adminModel->trashAdmin());
	}

	public function tambah()
	{
		$admin = $this->adminModel;
		if (!$this->validate([
			'nomor_induk'		=>	'required|integer|is_unique[admin.nomor_induk]',
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
			$nmFoto	= $admin->simpanGambar($gambar,$this->request->getPost('nomor_induk'));
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
			'jabatan'       =>  $this->request->getPost('jabatan'),
			'notelp'        =>  $this->request->getPost('notelp'),
			'email'        	=>  $this->request->getPost('email'),
			'alamat'        =>  $this->request->getPost('alamat'),
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
