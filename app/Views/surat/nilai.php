 <style>
 	* {
 		font-size: 12px;
 		font-family: 'Monotype Corsiva', Times, Serif;
 	}

 	.nama_sekolah {
 		font-family: 'Times New Roman', Times, serif;
 		font-size: 14px;
 		font-weight: bold;
 		text-align: center;
 	}

 	.isian {
 		text-align: center;
 		border-bottom: 1px solid #000;
 	}

 	.italic {
 		font-style: italic;
 	}

 	.center {
 		display: flex;
 		justify-content: center;
 		align-items: center;
 	}

 	div.justify {
 		text-align: justify;
 		text-justify: inter-word;
 	}

 	table td {
 		padding: 2px
 	}

 	th {
 		text-align: center;
 		font-weight: bold;
 		background-color: lightsteelblue;
 	}
 </style>
 <?php
	$data = $data[0];
	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	}
	function penyebut($nilai)
	{
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " " . $huruf[$nilai];
		} else if ($nilai < 20) {
			$temp = penyebut($nilai - 10) . " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
		}
		return $temp;
	}
	$jml_bulan = date_diff(date_create($data->tgl_mulai), date_create($data->tgl_selesai))->format("%m");
	?>
 <table width="100%">
 	<tr>
 		<td colspan="3" class="nama_sekolah">SEKOLAH MENENGAH KEJURUAN MANDALAHAYU</td>
 	</tr>
 	<tr>
 		<td colspan="3" class="nama_sekolah">KOTA BEKASI</td>
 	</tr>
 	<tr>
 		<td colspan="3">&nbsp;<br>&nbsp;<br>&nbsp;</td>
 	</tr>
 	<tr>
 		<td colspan="3" align="center"><img src="/images/sertifikat.png" width="250px"></td>
 	</tr>
 	<tr>
 		<td width="38%" align="right">Nomor</td>
 		<td width="5%" align="right">:</td>
 		<td width="26%" align="left" class="isian">210/YMH-SMK/XI/2019</td>
 	</tr>
 	<tr>
 		<td colspan="3">&nbsp;<br>&nbsp;<br>&nbsp;</td>
 	</tr>
 	<tr>
 		<td colspan="3" width="100%">Kepala Sekolah Menengah Kejuruan Mandalahayu Kota Bekasi dengan ini menerangkan bahwa:
 		</td>
 	</tr>
 </table>
 <table width="100%" style="padding:2px;">
 	<tr>
 		<td colspan="5">&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="10%">&nbsp;</td>
 		<td width="25%">Nama</td>
 		<td width="5%" align="right">:</td>
 		<td width="45%" class="isian" align="left">Rizqi Ubaidillah</td>
 		<td width="20%">&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="10%">&nbsp;</td>
 		<td width="25%">Tempat, Tanggal Lahir</td>
 		<td width="5%" align="right">:</td>
 		<td width="45%" class="isian" align="left">Cirebon, 23 Agustus 1997</td>
 		<td width="20%">&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="10%">&nbsp;</td>
 		<td width="25%">Nomor Induk</td>
 		<td width="5%" align="right">:</td>
 		<td width="45%" class="isian" align="left">3275012308970015</td>
 		<td width="20%">&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="10%">&nbsp;</td>
 		<td width="25%">Kompetensi Keahlian</td>
 		<td width="5%" align="right">:</td>
 		<td width="45%" class="isian" align="left">Rekayasa Perangkat Lunak</td>
 		<td width="20%">&nbsp;</td>
 	</tr>
 	<tr>
 		<td colspan="5">&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="10%">&nbsp;</td>
 		<td colspan="4">Telah mengikuti Praktik Kerja Industri (PRAKERIN) yang dilaksanakan di:</td>
 	</tr>
 	<tr>
 		<td colspan="5" width="100%" class="isian" style="font-size:16px;font-weight:bold;">PT. Matsumoto</td>
 	</tr>
 	<tr>
 		<td colspan="5">&nbsp;</td>
 	</tr>
 </table>
 <table width="100%" style="padding:2px">
 	<tr>
 		<td width="10%">Bagian :</td>
 		<td width="57%" class="isian italic">Quality Control</td>
 		<td width="33%">. Yang dilaksanakan dari tanggal</td>
 	</tr>
 	<tr>
 		<td width="38%" class="isian italic">22 Oktober 2020</td>
 		<td width="23%">sampai dengan tanggal</td>
 		<td width="38%" class="isian italic">22 Januari 2020</td>
 	</tr>
 	<tr>
 		<td width="23%">Nilai yang diperoleh :</td>
 		<td width="40%" class="isian italic" colspan="2" style="font-weight: bold;">4.00 (Sangat Baik)</td>
 	</tr>
 	<tr>
 		<td>&nbsp;<br>&nbsp;</td>
 	</tr>
 </table>
 <table align="right" width="100%">
 	<tr>
 		<td width="75%">&nbsp;</td>
 		<td width="27%" align="center">Bekasi, <?= tgl_indo(date('Y-m-d')); ?></td>
 	</tr>
 	<tr>
 		<td width="75%">&nbsp;</td>
 		<td width="25%" align="center"><?= $data->jabatan_pejabat; ?></td>
 	</tr>
 	<tr>
 		<td width="75%">&nbsp;</td>
 		<td width="25%" align="center"><img width="80px" src="/images/ttd/<?= $data->ttd_pejabat; ?>"></td>
 	</tr>
 	<tr>
 		<td width="75%">&nbsp;</td>
 		<td width="25%" align="center"><?= $data->nama_pejabat; ?></td>
 	</tr>
 	<tr>
 		<td colspan="2">&nbsp;<br>&nbsp;</td>
 	</tr>
 </table>
 <table align="left">
 	<tr>
 		<td><i>Keterangan: Daftar Nilai dibalik ini</i></td>
 	</tr>
 </table>

 <!-- Page Break -->
 <br pagebreak="true" />
 <!-- /Page Break -->

 <table width="100%">
 	<tr>
 		<td colspan="3" class="nama_sekolah">DAFTAR NILAI</td>
 	</tr>
 	<tr>
 		<td colspan="3" class="nama_sekolah">JOB TRAINING YANG DILAKSANAKAN</td>
 	</tr>
 	<tr>
 		<td colspan="3">&nbsp;<br>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="20%">&nbsp;</td>
 		<td width="22%">Nama</td>
 		<td width="7%" align="right">:</td>
 		<td width="30%" class="isian" align="left">Rizqi Ubaidillah</td>
 	</tr>
 	<tr>
 		<td width="20%">&nbsp;</td>
 		<td width="22%">Nomor Induk</td>
 		<td width="7%" align="right">:</td>
 		<td width="30%" class="isian" align="left">3275012308970015</td>
 	</tr>
 	<tr>
 		<td width="20%">&nbsp;</td>
 		<td width="22%">Kompetensi Keahlian</td>
 		<td width="7%" align="right">:</td>
 		<td width="30%" class="isian" align="left">Rekayasa Perangkat Lunak</td>
 	</tr>
 	<tr>
 		<td>&nbsp;<br>&nbsp;</td>
 	</tr>
 </table>
 <table width="100%" style="padding:5px;" border="1">
 	<tr>
 		<th rowspan="2" width="10%">&nbsp;<br>NO</th>
 		<th rowspan="2" width="30%">&nbsp;<br>JOB TRAINING</th>
 		<th colspan="2" width="30%">NILAI</th>
 		<th rowspan="2" width="30%">&nbsp;<br>KETERANGAN</th>
 	</tr>
 	<tr>
 		<th width="15%">ANGKA</th>
 		<th width="15%">HURUF</th>
 	</tr>
 	<tr>
 		<td align="center">1</td>
 		<td>Kedisiplinan</td>
 		<td align="center">4.00</td>
 		<td align="center">A</td>
 		<td align="center">Sangat Baik</td>
 	</tr>
 	<tr>
 		<td colspan="2"><b><i>JUMLAH</i></b></td>
 		<td colspan="2" align="center"><b><i>4.00</i></b></td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td colspan="2"><b><i>NILAI RATA-RATA</i></b></td>
 		<td colspan="2" align="center"><b><i>4.00</i></b></td>
 		<td align="center"><b><i>Sangat Baik</i></b></td>
 	</tr>
 </table>
 <table width="100%">
 	<tr>
 		<td>&nbsp;<br>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="70%" align="left" class="italic">Keterangan Nilai:</td>
 		<td width="30%" align="center">Bekasi, created_at</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">A</td>
 		<td width="7%" class="italic">: 4,00</td>
 		<td width="53%" class="italic">Sangat Baik</td>
 		<td align="center">Pembimbing PRAKERIN</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">A-</td>
 		<td width="7%" class="italic">: 3,67</td>
 		<td width="53%" class="italic">Hampir Sangat Baik</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">B+</td>
 		<td width="7%" class="italic">: 3,33</td>
 		<td width="53%" class="italic">Lebih Baik</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">B</td>
 		<td width="7%" class="italic">: 3,00</td>
 		<td width="53%" class="italic">Baik</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">B-</td>
 		<td width="7%" class="italic">: 2,67</td>
 		<td width="53%" class="italic">Hampir Baik</td>
 		<td align="center"><b>Tommy Adiguna</b></td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">C+</td>
 		<td width="7%" class="italic">: 2,33</td>
 		<td width="53%" class="italic">Lebih Dari Cukup</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">C</td>
 		<td width="7%" class="italic">: 2,00</td>
 		<td width="53%" class="italic">Cukup</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">D</td>
 		<td width="7%" class="italic">: 1,00</td>
 		<td width="53%" class="italic">Kurang</td>
 		<td>&nbsp;</td>
 	</tr>
 	<tr>
 		<td width="5%">&nbsp;</td>
 		<td width="5%" class="italic">E</td>
 		<td width="7%" class="italic">: 0,00</td>
 		<td width="53%" class="italic">Jelek</td>
 		<td>&nbsp;</td>
 	</tr>
 </table>