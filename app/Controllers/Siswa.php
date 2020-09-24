<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\SiswaModel;

class Siswa extends BaseController
{

protected $siswaModel;

	public function __construct()
	{
		$this->siswaModel = new SiswaModel();
	}

	public function data($ni = false)
	{
		if ($ni) {
			echo json_encode($this->siswaModel->tableSiswa($ni));
		} else {
			echo json_encode($this->siswaModel->tableSiswa());
		}
	}

	public function tambah()
	{
		$siswa = $this->siswaModel;
		if (!$this->validate([
			'nomor_induk'		=>	'required|is_unique[siswa.nomor_induk]',
			'nama'					=>	'required',
			'jenis_kelamin'	=>	'required',
			'alamat'				=>	'required',
			'kelas'					=>	'required',
		],
		[
			'nomor_induk'		=> [
				'required'	=> "Nomor induk wajib diisi",
				'is_unique'	=> "Nomor induk sudah terdaftar",
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
			$nmFoto	= $siswa->simpanGambar($gambar);
			$data = [
				'nomor_induk'   =>  $this->request->getPost('nomor_induk'),
				'nama'          =>  $this->request->getPost('nama'),
				'jenis_kelamin' =>  $this->request->getPost('jenis_kelamin'),
				'alamat'        =>  $this->request->getPost('alamat'),
				'kelas'         =>  $this->request->getPost('kelas'),
				'foto'					=>	$nmFoto,
			];
			$siswa->insert($data);
			echo "berhasil";
		}

	}

}
