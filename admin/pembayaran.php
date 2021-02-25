<?php
//mendapatkan id_pemesanan dari url
$id_pemesanan = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pemesanan
$ambil = $koneksi->query("SELECT * FROM tb_pembayaran WHERE id_pemesanan='$id_pemesanan'");
$detail = $ambil->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="row">
				<div class="col-md-6">
					<table class="table" id="dataTable" width="100%" cellspacing="0">
						<tr>
							<th>Nama</th>
							<td><?php echo $detail['nama']; ?></td>
						</tr>
						<tr>
							<th>Jumlah</th>
							<td>Rp. <?php echo number_format($detail['jumlah_bayar']); ?></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><?php echo $detail['tanggal']; ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<img src="../bukti_pembayaran/<?php echo $detail['bukti_transfer'] ?>" alt="" width="450" height="500">
				</div>
			</div>
		</div>
	</div>
</div>