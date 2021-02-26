<h2>Ubah Bobot Kriteria</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM tb_rekomendasi_kriteria WHERE id_kriteria='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kriteria</label>
		<input type="text" class="form-control" name="kriteria" value="<?php echo $pecah['kriteria']; ?>" disabled>
	</div>
	<div class="form-group">
		<label>Bobot</label>
		<input type="text" class="form-control" name="bobot" value="<?php echo $pecah['bobot']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) 
{
	$koneksi->query("UPDATE tb_rekomendasi_kriteria set bobot='$_POST[bobot]' WHERE id_kriteria='$_GET[id]'");
	echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=rekomendasikriteria'>";
}
?>