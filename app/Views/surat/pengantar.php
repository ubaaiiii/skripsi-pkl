<style>
	* {
		font-size: 10px;
		font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	}

	.isian {
		text-align: center;
		border-bottom: 1px solid #000;
		font-weight: bold;
	}

	u {
		border-bottom: 1px dotted #000;
		text-decoration: none;
		font-weight: bold;
	}

	div.justify {
		text-align: justify;
		text-justify: inter-word;
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
<br>
<table align="left" width="100%" style="padding: 0px;width:100%">
	<tr>
		<td width="10%">Nomor</td>
		<td width="2%">:</td>
		<td width="88%"><?= $data->nomor_surat; ?></td>
	</tr>
	<tr>
		<td width="10%">Lamp</td>
		<td width="2%">:</td>
		<td>-</td>
	</tr>
	<tr>
		<td width="10%">Hal</td>
		<td width="2%">:</td>
		<td><?= $data->perihal; ?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="10%">Kepada<br>Yth</td>
		<td width="2%">:</td>
		<td>
			Manager HRD / Personalia<br>
			<span style="font-weight: bold;"><?= $data->nama_perusahaan; ?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td>di <?= $data->kota_perusahaan; ?></td>
	</tr>
</table>
<br><br>
<table width="100%">
	<tr>
		<td width="3%"></td>
		<td colspan="7" width="97%">Dengan Hormat,<br></td>
	</tr>
	<tr>
		<td width="3%"></td>
		<td colspan="4" width="43%">Sesuai dengan informasi yang kami terima tanggal</td>
		<td class="isian" width="25%"><?= tgl_indo($data->tgl_terima_info); ?></td>
		<td width="4%">No.</td>
		<td width="25%" class="isian">&nbsp;</td>
	</tr>
	<tr>
		<td width="3%"></td>
		<td width="8%">Perihal:</td>
		<td colspan="6" width="89%" class="isian"><?= $data->perihal; ?></td>
	</tr>
	<tr>
		<td width="3%"></td>
		<td colspan="3" width="22%">Dengan ini kami kirimkan</td>
		<td width="20%" class="isian"><?= $data->jumlah_siswa . " (" . penyebut($data->jumlah_siswa) . " )"; ?></td>
		<td colspan="3" width="55%">orang siswa.</td>
	</tr>
	<tr>
		<td colspan="8">&nbsp;</td>
	</tr>
	<tr>
		<td width="3%">&nbsp;</td>
		<td colspan="7" width="97%">
			<table width="100%" border="1" style="padding: 4px;">
				<tr>
					<th width="7%">NO</th>
					<th width="33%">NAMA</th>
					<th width="20%">NOMOR INDUK</th>
					<th width="20%">KELAS / JURUSAN</th>
					<th width="20%">KETERANGAN</th>
				</tr>
				<?php $i = 1;
				foreach ($datanya_siswa as $siswa) { ?>
					<tr>
						<td align="center"><?= $i++; ?></td>
						<td><?= $siswa->nama; ?></td>
						<td align="center"><?= $siswa->nomor_induk; ?></td>
						<td align="center"><?= $siswa->kelas; ?></td>
						<td>&nbsp;</td>
					</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="8">&nbsp;</td>
	</tr>
	<tr>
		<td width="3%">&nbsp;</td>
		<td width="97%" colspan="7">Untuk melaksanakan Praktik Kerja Industri (PRAKERIN) pada perusahaan yang Bapak / Ibu pimpin.</td>
	</tr>
	<tr>
		<td width="3%">&nbsp;</td>
		<td width="8%">Selama</td>
		<td width="21%" class="isian"><?= $jml_bulan . " (" . penyebut($jml_bulan) . " )"; ?> bulan</td>
		<td width="14%">, mulai tanggal</td>
		<td width="20%" class="isian"><?= tgl_indo($data->tgl_mulai); ?></td>
		<td width="14%">sampai dengan</td>
		<td width="20%" colspan="2" class="isian"><?= tgl_indo($data->tgl_selesai); ?></td>
	</tr>
	<tr>
		<td colspan="8">&nbsp;</td>
	</tr>
	<tr>
		<td width="3%">&nbsp;</td>
		<td colspan="7" width="97%" style="text-align:justify;">Pada akhir Praktik Kerja Industri (PRAKERIN), siswa diwajibkan untuk membuat laporan yang disetujui oleh pimpinan perusahaan.</td>
	</tr>
	<tr>
		<td colspan="8">&nbsp;</td>
	</tr>
	<tr>
		<td width="3%">&nbsp;</td>
		<td colspan="7" width="97%" style="text-align:justify;">Demikian surat pengantar ini kami sampaikan. Atas perhatian dan kerjasama yang baik, kami ucapkan terima kasih.<br></td>
	</tr>
</table>
<table align="right" width="100%">
	<tr>
		<td width="75%">&nbsp;</td>
		<td width="25%" align="center">Bekasi, <?= tgl_indo(date('Y-m-d')); ?></td>
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
</table>
<table align="left">
	<tr>
		<td colspan="2"><i>Contact Person:</i></td>
	</tr>
	<?php $i = 1;
	foreach ($datanya_cp as $cp) { ?>
		<tr>
			<td width="7%">&nbsp;</td>
			<td width="93%">
				<i><?= $i++; ?>. <?= $cp->nama; ?> - <?= $cp->jbtn; ?> (<?= $cp->notelp; ?>)</i>
			</td>
		</tr>
	<?php } ?>
</table>