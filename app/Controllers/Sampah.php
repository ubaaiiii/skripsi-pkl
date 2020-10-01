<?php namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SiswaModel;

class Sampah extends BaseController
{
	protected $db;
	protected $adminModel;
	protected $siswaModel;

  public function __construct()
  {
		$this->adminModel	= new AdminModel();
		$this->siswaModel	= new SiswaModel();
    $this->db = \Config\Database::connect();
  }

	public function index()
	{
		$data = [
			'title' 		=> "Profile",
			'subtitle' 	=> "Profile",
		];
		return view('profile',$data);
	}

	public function restore($tabel)
	{
		$id		= $this->request->getPost('id');
		$data = [
			'deleted_at'	=> null,
		];
		switch ($tabel) {
			case 'admin':
				$this->adminModel->update($id,$data);
				break;
			case 'siswa':
				$this->siswaModel->update($id,$data);
				break;

			default:
				return "salah sasaran";
				break;
		}
		return "berhasil";
	}

	public function delete($tabel)
	{
		$id		= $this->request->getPost('id');
		switch ($tabel) {
			case 'admin':
				$this->adminModel->delete($id,true);
				break;
			case 'siswa':
				$this->siswaModel->delete($id,true);
				break;

			default:
				return "salah sasaran";
				break;
		}
		return "berhasil";
	}

}
