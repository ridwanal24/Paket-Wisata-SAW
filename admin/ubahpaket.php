<h2>Ubah Paket</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM tb_paketwisata WHERE id_paketwisata='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Paket</label>
		<input type="text" class="form-control" name="nama_paket" value="<?php echo $pecah['nama_paketwisata']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="fasilitas" rows="10"> <?php echo $pecah['fasilitas']; ?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) 
{
	$koneksi->query("UPDATE tb_paketwisata set nama_paketwisata='$_POST[nama_paket]', fasilitas='$_POST[fasilitas]', harga='$_POST[harga]' WHERE id_paketwisata='$_GET[id]'");
	echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=paketwisata'>";
}
?>