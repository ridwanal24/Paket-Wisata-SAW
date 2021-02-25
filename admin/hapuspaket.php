<?php
$ambil = $koneksi->query("SELECT * FROM tb_paketwisata WHERE id_paketwisata='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM tb_paketwisata WHERE id_paketwisata='$_GET[id]'");

echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?page=paketwisata';</script>";
?>