<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{

	protected $jadwalModel;

	public function __construct()
	{
		$this->jadwalModel = new JadwalModel();
	}

	public function index($id = false)
	{
		$jadwal = $this->jadwalModel;
		dd($jadwal->trashJadwal());
	}

	public function data($id = false)
	{
		if ($id) {
			echo json_encode($this->jadwalModel->tableJadwal($id));
		} else {
			echo json_encode($this->jadwalModel->tableJadwal());
		}
	}

	public function trash()
	{
		return json_encode($this->jadwalModel->trashJadwal());
	}

	public function tambah()
	{
		$jadwal = $this->jadwalModel;
		if (!$this->validate(
			[
				'nomor_induk'		=>	'required|integer|is_unique[jadwal.nomor_induk]',
				'nama'				=>	'required|alpha_space',
				'jenis_kelamin'	=>	'required',
				'alamat'				=>	'required',
				'kelas'				=>	'required',
			],
			[
				'nomor_induk'		=> [
					'required'		=> "Nomor induk wajib diisi",
					'is_unique'		=> "Nomor induk sudah terdaftar atau mungkin terhapus",
					'integer'		=> "Nomor induk hanya boleh diisi angka",
				],
				'nama'				=> [
					'required'		=> "Nama wajib diisi",
					'alpha_space'	=> "Nama hanya boleh mengandung huruf dan spasi",
				],
				'jenis_kelamin'	=> [
					'required'		=> "Wajib memilih jenis kelamin",
				],
				'alamat'				=> [
					'required'		=> "Alamat wajib diisi",
				],
				'kelas'				=> [
					'required'		=> "Wajib memilih kode kelas",
				],
			]
		)) {
			$validation = \Config\Services::validation();
			echo json_encode($validation->getErrors());
		} else {
			$gambar = $this->request->getFile('upload_foto');
			$nmFoto	= $jadwal->simpanGambar($gambar, $this->request->getPost('nomor_induk'));
			$status	=	$jadwal->cekSyarat($this->request->getPost('kelas'));
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'kelas'         =>  $this->request->getPost('kelas'),
				'foto'			 =>  $nmFoto,
				'status'			 =>  $status,
			];
			$jadwal->insert($data);
			echo "berhasil";
		}
	}

	public function ubah()
	{
		$jadwal = $this->jadwalModel;
		if ($this->request->getPost('nomor_induk') !== $this->request->getPost('nomor_induk_real')) {
			$cekJadwal	= $jadwal->find($this->request->getPost('nomor_induk'));
			if ($cekJadwal !== null) {
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
			$dataJadwal	= $jadwal->find($this->request->getPost('nomor_induk'));
			$gambarLama	= "/images/users/" . $dataJadwal->foto;
			if (file_exists($gambarLama)) {
				unlink($gambarLama);
			}
			$nmFoto	= $jadwal->simpanGambar($gambar);
			$data['foto']		= $nmFoto;
		}

		$jadwal->update($this->request->getPost('nomor_induk_real'), $data);
		echo "berhasil";
	}

	public function hapus()
	{
		$jadwal = $this->jadwalModel;
		return $jadwal->delete($this->request->getPost('nomor_induk'));
	}
}
