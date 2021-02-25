<a href="index.php?page=tambahwisata" class="btn btn-primary"><i class="fas fa-plus"></i>  Tambah Wisata</a>
<a href="cetakwisata.php" class="btn btn-secondary" target="_blank"><i class="fas fa-print"></i>  Export PDF</a><br><br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
    </div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Paket</th>
						<th>Destinasi</th>
						<th>Gambar</th>
						<th>Aksi</th>
					</tr>
				</thead> 
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM tb_wisata LEFT JOIN tb_paketwisata ON tb_wisata.id_paketwisata=tb_paketwisata.id_paketwisata");?>
					<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_paketwisata']; ?></td>
						<td><?php echo $pecah['nama']; ?></td>
						<td>
							<img src="../foto_wisata/<?php echo $pecah['foto']; ?>" width="100">
						</td>
						<td>
							<a href="index.php?page=hapuswisata&id=<?php echo $pecah['id_wisata']?>" class="btn-danger btn"><i class="fas fa-trash"></i></a>
							<a href="index.php?page=ubahwisata&id=<?php echo $pecah['id_wisata']?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
						</td>
					</tr>
						<?php $nomor++; ?>
						<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
