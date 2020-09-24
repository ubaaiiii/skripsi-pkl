<?php namespace App\Controllers;

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
		$config['upload_path']    = "assets/images/bukti/";
		$config['allowed_types']  = 'gif|jpg|png|jpeg';
		$config['encrypt_name']   = true;
		$config['max_size']       = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	}

}
