<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PerusahaanModel;
use App\Models\PembimbingModel;
use App\Models\AdminModel;
use App\Models\MasterModel;

class Data extends BaseController
{

	public function __construct()
	{
		$this->siswaModel	= new SiswaModel();
		$this->pembimbingModel	= new PembimbingModel();
		$this->perusahaanModel	= new PerusahaanModel();
		$this->adminModel	= new AdminModel();
		$this->masterModel	= new MasterModel();
	}

	public function index()
	{
		if (!session('user_name')) {
			return redirect()->to('/auth');
		}
		// $faker = \Faker\Factory::create('id_ID');
		// dd($faker->phoneNumber);
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			case ("Siswa"):
				$dataUser = $this->siswaModel->tableSiswa($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}

		$data = [
			'jml_siswa'				=> $this->siswaModel->countAllResults(),
			'jml_pembimbing'		=> $this->pembimbingModel->countAllResults(),
			'jml_perusahaan'		=> $this->perusahaanModel->countAllResults(),
			'jml_admin'				=> $this->adminModel->countAllResults(),
			'title' 					=> "Data",
			'subtitle' 				=> "Data",
			'session'				=> $session,
			'data'					=> $dataUser,
			// 'script'				=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('data', $data);
	}

	public function siswa()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Siswa",
			'subtitle'		=> "Siswa",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'			=> $this->masterModel->getData('kelas'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $session,
			'data'			=> $dataUser,
		];
		// dd($data['kelas']);
		return view('tables/siswa', $data);
	}

	public function jadwal()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Jadwal PKL",
			'subtitle'		=> "Jadwal PKL",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'			=> $this->masterModel->getData('kelas'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $this->session,
			'data'			=> $dataUser,
		];
		// dd($data['kelas']);
		return view('tables/jadwal', $data);
	}

	public function pembimbing()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Pembimbing",
			'subtitle'		=> "Pembimbing",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'kelas'			=> $this->masterModel->getData('kelas'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $session,
			'data'			=> $dataUser,
		];
		return view('tables/pembimbing', $data);
	}

	public function perusahaan()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Perusahaan",
			'subtitle'		=> "Perusahaan",
			'perusahaan'	=> $this->perusahaanModel->where('deleted_at IS NULL')->findAll(),
			'kelas'			=> $this->masterModel->getData('kelas'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $session,
			'data'			=> $dataUser,
		];
		// dd($data['kelas']);
		return view('tables/perusahaan', $data);
	}

	public function admin()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Admin",
			'subtitle'		=> "Admin",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'jabatan'		=> $this->masterModel->getData('jabatan'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $session,
			'data'			=> $dataUser,
		];
		return view('tables/admin', $data);
	}

	public function nilai()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Admin', 'Pembimbing', 'Siswa'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$session = $this->session;
		switch ($session->user_level) {
			case ("Admin"):
				$dataUser = $this->adminModel->find($session->nomor_induk);
				break;

			case ("Pembimbing"):
				$dataUser = $this->pembimbingModel->tablePembimbing($session->nomor_induk)[0];
				break;

			case ("Siswa"):
				$dataUser = $this->siswaModel->tableSiswa($session->nomor_induk)[0];
				break;

			default:
				return redirect()->to('/auth');
		}
		$data = [
			'title' 			=> "Data Admin",
			'subtitle'		=> "Admin",
			'perusahaan'	=> $this->perusahaanModel->findAll(),
			'jabatan'		=> $this->masterModel->getData('jabatan'),
			'jurusan'		=> $this->masterModel->getData('kelas'),
			'status'			=> $this->masterModel->getData('status'),
			'session'		=> $session,
			'data'			=> $dataUser,
		];
		return view('tables/admin', $data);
	}

	//--------------------------------------------------------------------

}
