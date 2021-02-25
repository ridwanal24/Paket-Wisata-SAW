<?php
	$ambil= $koneksi->query("SELECT * FROM tb_pemesanan JOIN tb_pelanggan ON tb_pemesanan.id_pelanggan=tb_pelanggan.id_pelanggan 
		WHERE tb_pemesanan.id_pemesanan='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>

<a href="cetakdetail.php" class="btn btn-secondary" target="_blank"><i class="fas fa-print"></i>  Export PDF</a><br><br>

<!-- <pre><?php //print_r($detail); ?></pre> -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan</h6>
    </div>
	<div class="card-body">
		<div class="table-responsive">
<div class="row">
	<div class="col-md-4">
		<h3>Pemesanan</h3><br>
		<p>
			Tanggal Pemesanan: <?php echo date('d F Y', strtotime($detail['tanggal_pesan'])) ?> <br>
			Tanggal Tour: <?php echo date('d F Y', strtotime($detail['tanggal_tour'])) ?> <br>
			Total: Rp. <?php echo number_format($detail['total_pemesanan']); ?> <br>
			Status: <?php echo $detail["status_pemesanan"]; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama']; ?></strong><br>
		<p>
			<?php echo $detail['alamat']; ?> <br> 
			<?php echo $detail['telepon']; ?> <br>
			<?php echo $detail['email']; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Paket Wisata</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_pemesanan_paket JOIN tb_paketwisata ON tb_pemesanan_paket.id_paketwisata=tb_paketwisata.id_paketwisata 
		WHERE tb_pemesanan_paket.id_pemesanan='$_GET[id]'"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_paketwisata']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
</div>
	</div>
</div>