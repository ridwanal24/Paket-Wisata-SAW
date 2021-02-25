<?php
	require_once('../koneksi.php');
	$ambil=$koneksi->query("SELECT * FROM tb_wisata LEFT JOIN tb_paketwisata ON tb_wisata.id_paketwisata=tb_paketwisata.id_paketwisata");

$content = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Wisata</title>
</head>
<body>
	<h1>Data Wisata</h1>
	<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th>Nama Paket</th>
				<th>Destinasi</th>
				<th>Gambar</th>
			</tr>';

	$no = 1;
	while($pecah = $ambil->fetch_assoc()){
		$content .= '<tr>
			<td>'. $no++ .'</td>
			<td>'. $pecah["nama_paketwisata"] .'</td>
			<td>'. $pecah["nama"] .'</td>
			<td><img src="../foto_wisata/'. $pecah["foto"] .'" width="100"></td>
		</tr>';
	}

$content .= '</table>
</body>
</html>';

	require_once('../html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('exemple.pdf');
?>
