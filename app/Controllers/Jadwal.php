<?php

namespace App\Controllers;

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

	public function print($tipe = null)
	{
		$view = \Config\Services::renderer();
		// $pageContent = $view->render('surat/pengantar');
		// die;
		$pdf = new \Mpdf\Mpdf();
		$pdf->SetTopMargin(35);
		$pdf->SetAutoPageBreak(true, 20);

		$pdf->SetHTMLHeader('
			<table id="header" width="100%" style="border-bottom: 1px double;vertical-align: middle; font-family: serif; font-size: 8pt; color: #000000;"><tr>
			<td width="7%" align="left"><img width="100px" src="https://i.ibb.co/5XDJ14L/logo-mandalahayu.png"></td>
			<td align="center">
				<b style="font-size: 170%;">SMK Mandalahayu</b><br>
				<p style="font-size: 110%;">Jl. Margahayu Jaya No.304-312 RT.007/RW.017, Margahayu,<br>
				Kecamatan Bekasi Timur, Kota Bekasi, Jawa Barat 17113<br>
				Telp: (021) 88346805</p>
			</td>
			</tr></table>
			');

		$pdf->SetHTMLFooter('
			<table width="100%" style="border-top: 1px solid; vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000;"><tr>
			<td width="7%" align="left" style="font-style: italic;">Surat Pengantar PKL</td>
			<td width="30%" style="text-align: right;font-style: italic;  ">Halaman {PAGENO}/{nbpg}</td>
			</tr></table>
			');
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
		// dd($data);
		$pdf->WriteHTML(view('surat/pengantar', $data));
		// $pdfFilePath = "uploads/pdf/surat-pengantar-pkl-" . time() . ".pdf";
		$pdfFilePath = "uploads/pdf/surat-pengantar-pkl.pdf";

		// $pdf->SetJS('this.print();');
		$dataPdf = $pdf->Output($pdfFilePath, "F");
		return redirect()->to("../" . $pdfFilePath);
	}
}
