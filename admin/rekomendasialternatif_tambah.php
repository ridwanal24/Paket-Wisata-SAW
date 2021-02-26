<?php
$alt = $koneksi->query('SELECT * FROM tb_paketwisata');
$c1 = $koneksi->query('SELECT * FROM tb_rekomendasi_variabel WHERE id_kriteria=1');
$c2 = $koneksi->query('SELECT * FROM tb_rekomendasi_variabel WHERE id_kriteria=2');
$c3 = $koneksi->query('SELECT * FROM tb_rekomendasi_variabel WHERE id_kriteria=3');
?>

<h2>Tambah Rekomendasi Alternatif</h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
		<label>Pilih Alternatif</label>
		<select class="form-control" name="id_paketwisata">
			<option value='null'>--Pilih paket wisata</option>
			<?php while($pecah = $alt->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_paketwisata']; ?>"><?php echo $pecah['nama_paketwisata']; ?></option>
			<?php } ?>
		</select>
  	</div>
	<div class="form-group">
		<label>C1. Harga Paket</label>
		<select class="form-control" name="c1">
			<option value='null'>--Pilih variabel</option>
			<?php while($pecah = $c1->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_variabel']; ?>"><?php echo $pecah['variabel']; ?></option>
			<?php } ?>
		</select>
  	</div>
	<div class="form-group">
		<label>C2. Jumlah Wisata</label>
		<select class="form-control" name="c2">
			<option value='null'>--Pilih variabel</option>
			<?php while($pecah = $c2->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_variabel']; ?>"><?php echo $pecah['variabel']; ?></option>
			<?php } ?>
		</select>
  	</div>
	<div class="form-group">
		<label>C3. Lama Tour</label>
		<select class="form-control" name="c3">
			<option value='null'>--Pilih variabel</option>
			<?php while($pecah = $c3->fetch_assoc()){ ?>
			<option value="<?php echo $pecah['id_variabel']; ?>"><?php echo $pecah['variabel']; ?></option>
			<?php } ?>
		</select>
  	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	if($_POST['id_paketwisata'] != 'null' && $_POST['c1'] != 'null' && $_POST['c2'] != 'null' && $_POST['c3'] != 'null'){
		$koneksi->query("INSERT INTO tb_rekomendasi_alternatif (id_paketwisata, id_variabel) VALUES('$_POST[id_paketwisata]','$_POST[c1]')");
		$koneksi->query("INSERT INTO tb_rekomendasi_alternatif (id_paketwisata, id_variabel) VALUES('$_POST[id_paketwisata]','$_POST[c2]')");
		$koneksi->query("INSERT INTO tb_rekomendasi_alternatif (id_paketwisata, id_variabel) VALUES('$_POST[id_paketwisata]','$_POST[c3]')");
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?page=rekomendasialternatif'>";
	} else {
		echo "<script>alert('Kolom Tidak Boleh Kosong')</script>";
	}
}
?>