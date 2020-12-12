<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\UserModel;

class User extends BaseController
{

	protected $userModel;

	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	public function index($ni = false)
	{
		$user = $this->userModel;
		dd($user->trashUser());
	}

	public function data($ni = false)
	{
		if ($ni) {
			echo json_encode($this->userModel->tableUser($ni));
		} else {
			echo json_encode($this->userModel->tableUser());
		}
	}

	public function trash()
	{
		return json_encode($this->userModel->trashUser());
	}

	public function tambah()
	{
		$user = $this->userModel;
		if (!$this->validate(
			[
				'nomor_induk'		=>	'required|integer|is_unique[user.nomor_induk]',
				'nama'					=>	'required|alpha_space',
				'jenis_kelamin'	=>	'required',
				'alamat'				=>	'required',
				'kelas'					=>	'required',
			],
			[
				'nomor_induk'		=> [
					'required'	=> "Nomor induk wajib diisi",
					'is_unique'	=> "Nomor induk sudah terdaftar atau mungkin terhapus",
					'integer'		=> "Nomor induk hanya boleh diisi angka",
				],
				'nama'					=> [
					'required'		=> "Nama wajib diisi",
					'alpha_space'	=> "Nama hanya boleh mengandung huruf dan spasi",
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
			]
		)) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$gambar = $this->request->getFile('upload_foto');
			$nmFoto	= $user->simpanGambar($gambar, $this->request->getPost('nomor_induk'));
			$status	=	$user->cekSyarat($this->request->getPost('kelas'));
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'kelas'         =>  $this->request->getPost('kelas'),
				'foto'					=>	$nmFoto,
				'status'				=>	$status,
			];
			$user->insert($data);
			echo "berhasil";
		}
	}

	public function ubah()
	{
		$user = $this->userModel;
		if ($this->request->getPost('nomor_induk') !== $this->request->getPost('nomor_induk_real')) {
			$cekUser	= $user->find($this->request->getPost('nomor_induk'));
			if ($cekUser !== null) {
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
		if ($gambar->isValid() && !$gambar->hasMoved()) {
			$dataUser	= $user->find($this->request->getPost('nomor_induk'));
			$gambarLama	= "/images/users/" . $dataUser->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $user->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$user->update($this->request->getPost('nomor_induk_real'), $data);
		echo "berhasil";
	}

	public function hapus()
	{
		$user = $this->userModel;
		return $user->delete($this->request->getPost('nomor_induk'));
	}
}
