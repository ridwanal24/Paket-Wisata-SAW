<?php 

	$semuadata=array();
	$tgl_mulai="-";
	$tgl_selesai="-";

	if (isset($_POST["kirim"])) 
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
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Pemesanan dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h6>
    </div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="post">
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Tanggal Selesai</label>
							<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
						</div>
					</div>
					<div class="col-md-2">
						<label>&nbsp;</label><br>
						<button class="btn btn-primary" name="kirim">Lihat</button>
						<a href="cetaklaporan.php" target="_blank" class="btn btn-warning" name="cetak"><i class="fas fa-print"></i>  PDF</a>
					</div>
				</div>
			</form>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Pelanggan</th>
						<th>Tanggal Pesan</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $total=0; ?>
					<?php foreach ($semuadata as $key => $value): ?>
					<?php $total+=$value['total_pemesanan'] ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama"]; ?></td>
						<td><?php echo $value["tanggal_pesan"]; ?></td>
						<td>Rp. <?php echo number_format($value["total_pemesanan"]); ?></td>
						<td><?php echo $value["status_pemesanan"]; ?></td>
					</tr>
						<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total</th>
						<th>Rp. <?php echo number_format($total) ?></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>