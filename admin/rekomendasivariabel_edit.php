<h2>Ubah Rekomendasi Variabel</h2>

<?php
$kriteria = $koneksi->query("SELECT * FROM tb_rekomendasi_kriteria");
$ambil=$koneksi->query("SELECT * FROM tb_rekomendasi_variabel as rv JOIN tb_rekomendasi_kriteria as rk ON rv.id_kriteria=rk.id_kriteria WHERE id_variabel=".$_GET['id']);
$var=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kriteria</label>
		<select class="form-control" name="id_kriteria">
			<?php while($pecah = $kriteria->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_kriteria']; ?>" <?php echo ($pecah['id_kriteria']==$var['id_kriteria'])? 'selected':''; ?>><?php echo $pecah['kriteria']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Variabel</label>
		<input type="text" class="form-control" name="variabel" value="<?php echo $var['variabel']; ?>"></input>
	</div>
	<div class="form-group">
		<label>Nilai</label>
		<input type="number" class="form-control" name="nilai" value="<?php echo $var['nilai']; ?>">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$koneksi->query("UPDATE tb_rekomendasi_variabel set variabel='$_POST[variabel]',nilai='$_POST[nilai]' WHERE id_variabel='$_GET[id]'");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=rekomendasivariabel'>";
}
?>