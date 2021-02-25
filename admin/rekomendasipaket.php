<a href="" class="btn btn-primary" target="_blank"><i class="fas fa-plus"></i>  Tambah Variabel</a><br><br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Paket Wisata</h6>
    </div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Kriteria</th>
						<th>Variabel</th>
						<th>Nilai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM tb_rekomendasi_variabel as v JOIN tb_rekomendasi_kriteria as k ON v.id_kriteria = k.id_kriteria"); ?>
					<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['kriteria'].". ".$pecah['keterangan']; ?></td>
						<td><?php echo $pecah['variabel']; ?></td>
						<td><?php echo $pecah['nilai']; ?></td>
						<td>
                            <a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
                            <a class="btn btn-warning" href=""><i class="fa fa-pen"></i></a>
                        </td>
					</tr>
						<?php $nomor++; ?>
						<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>