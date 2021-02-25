<h2>Tambah Paket Wisata</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama_paket">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="fasilitas" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$koneksi->query("INSERT INTO tb_paketwisata (nama_paketwisata, fasilitas, harga) VALUES('$_POST[nama_paket]','$_POST[fasilitas]','$_POST[harga]')");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=paketwisata'>";
}
?>