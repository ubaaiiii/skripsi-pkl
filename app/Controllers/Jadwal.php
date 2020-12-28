<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\NilaiModel;
use App\Models\SiswaModel;
use App\Models\AdminModel;
use TCPDF;

class pengantar_pdf extends TCPDF
{

	public function Header()
	{
		$headerData = $this->getHeaderData();
		$this->SetFont('helvetica', 'B', 10);
		$this->writeHTML($headerData['string']);
	}

	public function Footer($tambahan = null)
	{
		$this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 10, $tambahan . ' Surat Pengantar PKL - Halaman ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

class nilai_pdf extends TCPDF
{

	public function Header()
	{
		$headerData = $this->getHeaderData();
		$this->SetFont('helvetica', 'B', 10);
		$this->writeHTML($headerData['string']);
	}
}


class Jadwal extends BaseController
{

	protected $jadwalModel;

	public function __construct()
	{
		$this->jadwalModel = new JadwalModel();
		$this->nilaiModel = new NilaiModel();
		$this->siswaModel = new SiswaModel();
		$this->adminModel = new AdminModel();
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

	public function surat()
	{
		$data = [
			'nomor_surat' 	=> '191/SMK-YMH/PKL/E.5/X/2019',
			'perihal'		=> 'Pengantar Praktik Kerja/Magang',
			'perusahaan'	=> 'PT. Duta Hita Jaya',
			'tempat'			=> 'Bekasi',
			'tgl_terima'	=> '22 Oktober 2020',
			'no_reff'		=> '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
			'perihal2'		=> 'Praktik Kerja Industri (PRAKERIN)',
			'jumlah_siswa'	=> '3 (Tiga)',
			'siswa'			=> [
				[
					'nama' 			=> 'Alya Maharani Putri',
					'nomor_induk'	=> '181910224',
					'kelas_jurusan' =>	'XI AP 1',
					'ket'				=> null
				],
				[
					'nama' 			=> 'Desi Yuliana',
					'nomor_induk'	=> '181910228',
					'kelas_jurusan' =>	'XI AP 1',
					'ket'				=> null
				],
				[
					'nama' 			=> 'Mutiara Hasanah',
					'nomor_induk'	=> '181910242',
					'kelas_jurusan' =>	'XI AP 1',
					'ket'				=> null
				],
			],

		];
		return view('surat/pengantar', $data);
	}

	public function print_nilai($id_jadwal, $ni_siswa)
	{
		$nilai = $this->nilaiModel;
		$jadwal = $this->jadwalModel;
		$data_surat = $jadwal->getSurat($id_jadwal);
		$data['data'] = $data_surat;
		// dd($data_surat);

		$data_siswa = explode(",", $data_surat[0]->ni_siswa);
		foreach ($data_siswa as $siswa) {
			$nik = explode("|", $siswa)[0];
			$datanya_siswa[] = $this->siswaModel->tableSiswa($nik)[0];
		}

		$data_cp = explode(",", $data_surat[0]->ni_contact_person);
		foreach ($data_cp as $cp) {
			$datanya_cp[] = $this->adminModel->tableAdmin($cp)[0];
		}

		$data['datanya_siswa'] = $datanya_siswa;
		$data['datanya_cp'] = $datanya_cp;

		// $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf = new nilai_pdf('P', 'mm', 'A4', true, 'UTF-8', false);

		// $pdf->setHeaderData($ln = '', $lw = 0, $ht = '', $hs = '
		// <table id="header" style="border-bottom: 1px dotted;vertical-align: middle; font-family: serif; font-size: 8pt;width:100%">
		// 	<tr>
		// 		<td width="15%" align="left"><img width="100px" src="/images/logo/logo-mandalahayu.png"></td>
		// 		<td width="85%" align="center">
		// 			<b style="font-size: 200%;">SMK Mandalahayu</b>
		// 			<p style="font-size: 150%;">Jl. Margahayu Jaya No.304-312 RT.007/RW.017, Margahayu,<br>
		// 				Kecamatan Bekasi Timur, Kota Bekasi, Jawa Barat 17113<br>
		// 				Telp: (021) 88346805</p>
		// 		</td>
		// 	</tr>
		// </table>', $tc = array(0, 0, 0), $lc = array(0, 0, 0));
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

		$pdf->SetTitle('Surat Pengantar PKL SMK Mandalahayu');
		// $pdf->SetHeaderMargin(10);
		// $pdf->SetTopMargin(45);
		// $pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('SMK Mandalahayu');
		// $pdf->SetDisplayMode('real', 'default');
		$pdf->SetMargins(15, 20, 15, true);
		$pdf->AddPage();

		// $pdf->Write(1, view('surat/pengantar'));
		$pdf->writeHTML(view('surat/nilai', $data));
		header('Content-Type: application/pdf');
		$pdf->Output('Surat Pengantar PKL.pdf', 'I');
		exit();
	}

	public function print_surat_pengantar($id_jadwal)
	{
		$jadwal = $this->jadwalModel;
		$data_surat = $jadwal->getSurat($id_jadwal);
		$data['data'] = $data_surat;
		// dd($data_surat);

		$data_siswa = explode(",", $data_surat[0]->ni_siswa);
		foreach ($data_siswa as $siswa) {
			$nik = explode("|", $siswa)[0];
			$datanya_siswa[] = $this->siswaModel->tableSiswa($nik)[0];
		}

		$data_cp = explode(",", $data_surat[0]->ni_contact_person);
		foreach ($data_cp as $cp) {
			$datanya_cp[] = $this->adminModel->tableAdmin($cp)[0];
		}

		$data['datanya_siswa'] = $datanya_siswa;
		$data['datanya_cp'] = $datanya_cp;

		// $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf = new pengantar_pdf('P', 'mm', 'A4', true, 'UTF-8', false);

		$pdf->setHeaderData($ln = '', $lw = 0, $ht = '', $hs = '
		<table id="header" style="border-bottom: 1px dotted;vertical-align: middle; font-family: serif; font-size: 8pt;width:100%">
			<tr>
				<td width="15%" align="left"><img width="100px" src="/images/logo/logo-mandalahayu.png"></td>
				<td width="85%" align="center">
					<b style="font-size: 200%;">SMK Mandalahayu</b>
					<p style="font-size: 150%;">Jl. Margahayu Jaya No.304-312 RT.007/RW.017, Margahayu,<br>
						Kecamatan Bekasi Timur, Kota Bekasi, Jawa Barat 17113<br>
						Telp: (021) 88346805</p>
				</td>
			</tr>
		</table>', $tc = array(0, 0, 0), $lc = array(0, 0, 0));
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

		$pdf->SetTitle('Surat Pengantar PKL SMK Mandalahayu');
		$pdf->SetHeaderMargin(10);
		$pdf->SetTopMargin(45);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('SMK Mandalahayu');
		// $pdf->SetDisplayMode('real', 'default');

		$pdf->AddPage();

		// $pdf->Write(1, view('surat/pengantar'));
		$pdf->writeHTML(view('surat/pengantar', $data));
		header('Content-Type: application/pdf');
		$pdf->Output('Surat Pengantar PKL.pdf', 'I');
		exit();
	}
}
