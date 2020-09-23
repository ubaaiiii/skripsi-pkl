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

}
