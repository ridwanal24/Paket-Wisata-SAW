<?php 
$datapaketwisata = array();

$ambil = $koneksi->query("SELECT * FROM tb_paketwisata");
while ($tiap = $ambil->fetch_assoc()) 
{
	$datapaketwisata[] = $tiap;
}
echo "<pre>";
print_r($datapaketwisata);
echo "</pre>";
?>
<h2>Tambah Wisata</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Paket</label>
		<select class="form-control" name="id_paketwisata">
			<option value="">--Pilih Paket--</option>
			<?php foreach ($datapaketwisata as $key => $value): ?>
			<option value="<?php echo $value["id_paketwisata"] ?>"><?php echo $value["nama_paketwisata"]; ?></option>
		<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Wisata</label>
		<input type="text" class="form-control" name="nama_wisata">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_wisata/".$nama);
	$koneksi->query("INSERT INTO tb_wisata (id_paketwisata, nama, foto) 
		VALUES('$_POST[id_paketwisata]','$_POST[nama_wisata]','$nama')");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=wisata'>";
}
?>