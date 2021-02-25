<?php
	require_once('../koneksi.php');
	$ambil= $koneksi->query("SELECT * FROM tb_pemesanan JOIN tb_pelanggan ON tb_pemesanan.id_pelanggan=tb_pelanggan.id_pelanggan 
		WHERE tb_pemesanan.id_pemesanan='$_GET[id]'");
	$detail = $ambil->fetch_assoc();

$content = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pelanggan</title>
</head>
<body>
	<h1>Data Pelanggan Daftar</h1>
	<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Username</th>
				<th>Pasword</th>
			</tr>';

	$no = 1;
	while($pecah = $ambil->fetch_assoc()){
		$content .= '<tr>
			<td>'. $no++ .'</td>
			<td>'. $pecah["nama"] .'</td>
			<td>'. $pecah["alamat"] .'</td>
			<td>'. $pecah["telepon"] .'</td>
			<td>'. $pecah["email"] .'</td>
			<td>'. $pecah["username"] .'</td>
			<td>'. $pecah["password"] .'</td>
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
