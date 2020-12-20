<?php

namespace App\Controllers;

use App\Models\AbsenModel;

class Tugas extends BaseController
{
	public function __construct()
	{
		$this->absenModel	= new AbsenModel();
		$this->session				= session();
	}

	public function index()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Siswa'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Tugas",
			'subtitle' 	=> "Tugas",
			'session'	=> $this->session,
			// 'script'		=> '<script src="'.base_url('app-assets/js/script/siswa.js').'"></script>',
		];
		return view('tugas', $data);
	}

	public function kegiatan()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Siswa'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Agenda Kegiatan",
			'subtitle'	=> "Agenda Kegiatan",
			'script'		=> '<script src="' . base_url('vuexy/app-assets/js/scripts/pages/app-todo.js') . '"></script>',
			'session'	=> $this->session,
		];
		return view('tugas/kegiatan', $data);
	}

	public function cekAbsen($tipe = false)
	{
		$this->db = \Config\Database::connect();
		$nomor_induk = session('nomor_induk');
		$id_jadwal = session('id_jadwal');
		$tabel 	= $this->absenModel;
		$hariIni = date('Y-m-d h:m:s');
		if ($nomor_induk) {
			$data = [
				'id_jadwal' => $id_jadwal,
				'ni_siswa'	=> $nomor_induk,
				'tgl_masuk' => $hariIni,
				'tgl_keluar' => null,
				'tipe'		=> $tipe,
				'ket'			=> null,
			];
			$dataAbsen = $tabel->where('ni_siswa', $nomor_induk)->where('tgl_masuk like "%' . $hariIni . '%"')->find();
			// print_r($this->db->getLastQuery());
			if (count($dataAbsen) > 0) {
				if (count($dataAbsen) > 1) {
					$result = ['result' => 'error', 'message' => 'Sudah Cukup Absen Untuk Hari Ini'];
				} else {
					$result = ['result' => 'error', 'message' => 'Baru Absen Masuk, Belum Absen Keluar'];
					// bikin absen keluar
				}
			} else {
				$result = ['result' => 'error', 'message' => 'Belum Absen'];
			}
			echo json_encode($result);
		} else {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		}
	}

	public function loadAbsen()
	{
		$nomor_induk = session('nomor_induk');
		$tabel 	= $this->absenModel;

		if ($nomor_induk) {
			$dataAbsen = $tabel->getLoadAbsensi($nomor_induk);
			$data = [];
			foreach ($dataAbsen as $row) {
				$data[] = array(
					'id'	=> (int)$row->id,
					'title' => $row->title,
					'start' => $row->start,
					'end' => $row->end,
					'editable' => (int)$row->editable,
					'color' => $row->color,
					'allDay' => (int)$row->allDay,
				);
			}
			// echo "'" . json_encode($dataAbsen) . "'";
			return $data;
		} else {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		}
	}

	public function absensi()
	{
		if (!session('user_name')) {
			$this->session->setFlashdata('message', 'Harap login terlebih dahulu');
			return redirect()->to('/auth');
		} else if (!in_array(session('user_level'), ['Siswa'])) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$data = [
			'title' 		=> "Absensi",
			'subtitle'	=> "Absensi",
			'dataAbsen'	=> $this->loadAbsen(),
			// 'script'		=> '<script src="' . base_url('vuexy/app-assets/js/scripts/extensions/fullcalendar.js') . '"></script>',
			'session'	=> $this->session,
		];
		return view('tugas/absensi', $data);
	}

	//--------------------------------------------------------------------

}
