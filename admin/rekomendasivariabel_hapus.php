<?php
$koneksi->query("DELETE FROM tb_rekomendasi_variabel WHERE id_variabel='$_GET[id]'");

echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?page=rekomendasivariabel';</script>";
?>