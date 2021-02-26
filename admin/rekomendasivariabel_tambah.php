<h2>Tambah Rekomendasi Variabel</h2>

<?php
$ambil=$koneksi->query("SELECT * FROM tb_rekomendasi_kriteria");
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kriteria</label>
		<select class="form-control" name="id_kriteria">
			<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_kriteria']; ?>"><?php echo $pecah['kriteria']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Variabel</label>
		<input type="text" class="form-control" name="variabel"></input>
	</div>
	<div class="form-group">
		<label>Nilai</label>
		<input type="number" class="form-control" name="nilai">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$koneksi->query("INSERT INTO tb_rekomendasi_variabel (id_kriteria, variabel, nilai) VALUES('$_POST[id_kriteria]','$_POST[variabel]','$_POST[nilai]')");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=rekomendasivariabel'>";
}
?>