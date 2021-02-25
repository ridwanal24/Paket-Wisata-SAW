<?php
	require_once('../koneksi.php');
	
	$semuadata=array();
	$tgl_mulai="-";
	$tgl_selesai="-";

	if (isset($_POST["cetak"])) 
	{
		$tgl_mulai = $_POST["tglm"];
		$tgl_selesai = $_POST["tgls"];
		$ambil = $koneksi->query("SELECT * FROM tb_pemesanan pm LEFT JOIN tb_pelanggan pl ON 
			pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pesan BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
		while ($pecah = $ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecah;
		}
	}

$content = '<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pemesanan Paket Wisata</title>
</head>
<body>
	<h1>Laporan Pemesanan dari '. $tgl_mulai .' hingga '. $tgl_selesai .' </h1>
	<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Pelanggan</th>
				<th>Tanggal Pesan</th>
				<th>Total</th>
				<th>Status</th>
			</tr>';

	$total=0;
	foreach ($semuadata as $key => $value) {
		$total+=$value["total_pemesanan"];
		$content .= '<tr>
			<td>'. $key+1 .'</td>
			<td>'. $value["nama"] .'</td>
			<td>'. $value["tanggal_pesan"] .'</td>
			<td>'. $value["total_pemesanan"] .'</td>
			<td>'. $value["status_pemesanan"] .'</td>
		</tr>';
	}
		'<tr>
			<th colspan="3">Total</th>
			<th>Rp. '. $total .'</th>
			<th></th>
		</tr>';

$content .= '</table>
</body>
</html>';

	require_once('../html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('exemple.pdf');
?>
