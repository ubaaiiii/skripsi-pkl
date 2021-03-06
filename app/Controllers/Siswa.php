<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\SiswaModel;

class Siswa extends BaseController
{

	protected $siswaModel;

	public function __construct()
	{
		$this->siswaModel = new SiswaModel();
	}

	public function index($ni = false)
	{
		$siswa = $this->siswaModel;
		dd($siswa->trashSiswa());
	}

	public function data($ni = false)
	{
		if ($ni) {
			echo json_encode($this->siswaModel->tableSiswa($ni));
		} else {
			echo json_encode($this->siswaModel->tableSiswa());
		}
	}

	public function trash()
	{
		return json_encode($this->siswaModel->trashSiswa());
	}

	public function tambah()
	{
		$siswa = $this->siswaModel;
		if (!$this->validate(
			[
				'nomor_induk'		=>	'required|integer|is_unique[siswa.nomor_induk]',
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
			$nmFoto	= $siswa->simpanGambar($gambar, $this->request->getPost('nomor_induk'));
			$status	=	$siswa->cekSyarat($this->request->getPost('kelas'));
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'kelas'         =>  $this->request->getPost('kelas'),
				'foto'					=>	$nmFoto,
				'status'				=>	$status,
			];
			$siswa->insert($data);
			echo "berhasil";
		}
	}

	public function ubah()
	{
		$siswa = $this->siswaModel;
		if ($this->request->getPost('nomor_induk') !== $this->request->getPost('nomor_induk_real')) {
			$cekSiswa	= $siswa->find($this->request->getPost('nomor_induk'));
			if ($cekSiswa !== null) {
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
			$dataSiswa	= $siswa->find($this->request->getPost('nomor_induk'));
			$gambarLama	= "/images/users/" . $dataSiswa->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $siswa->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$siswa->update($this->request->getPost('nomor_induk_real'), $data);
		echo "berhasil";
	}

	public function hapus()
	{
		$siswa = $this->siswaModel;
		return $siswa->delete($this->request->getPost('nomor_induk'));
	}
}
