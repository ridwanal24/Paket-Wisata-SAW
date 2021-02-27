<a href="index.php?page=alternatiftambah" class="btn btn-primary"><i class="fas fa-plus"></i>  Tambah Alternatif</a>
<a href="index.php?page=alternatifubah" class="btn btn-warning"><i class="fas fa-pen"></i>  Ubah Alternatif</a>
<br><br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Alternatif</h6>
    </div>
	<div class="card-body">

	<?php
	$option = $koneksi->query("SELECT DISTINCT pw.id_paketwisata, pw.nama_paketwisata FROM tb_paketwisata as pw JOIN tb_rekomendasi_alternatif as ra ON pw.id_paketwisata=ra.id_paketwisata")
	?>

	<form>
	<div class="form-row">
		<div class="form-group col-9">
			<label>Pilih Alternatif</label>
			<select class="form-control" name="paketwisata">
				<option value="null">--Pilih paket wisata</option>
				<?php
				while($pecah = $option->fetch_assoc()){
				?>
				<option value="<?php echo $pecah['id_paketwisata']; ?>"><?php echo $pecah['nama_paketwisata']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col">
		<label></label>
			<a href="#" class="btn btn-danger form-control mt-2 btn-hapus-alternatif"><i class="fas fa-trash"></i>  Hapus Alternatif</a>
		</div>
	</div>
	</form>
		<div class="table-responsive">
			<table class="table table-bordered table-alternatif" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Paket Wisata</th>
						<th>Kriteria</th>
						<th>Variabel</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>