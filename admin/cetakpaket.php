<?php
	require_once('../koneksi.php');
	$ambil=$koneksi->query("SELECT * FROM tb_paketwisata");

$content = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Paket</title>
</head>
<body>
	<h1>Data Paket Wisata</h1>
	<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
            	<th>Nama Paket</th>
            	<th>Fasilitas</th>
            	<th>Harga</th>
			</tr>';

	$no = 1;
	while($pecah = $ambil->fetch_assoc()){
		$content .= '<tr>
			<td>'. $no++ .'</td>
			<td>'. $pecah["nama_paketwisata"] .'</td>
			<td>'. $pecah["fasilitas"] .'</td>
			<td>'. $pecah["harga"] .'</td>
		</tr>';
	}

$content .= '</table>
</body>
</html>';

	require_once('../html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('example.pdf');
?>
