<?php
$koneksi->query("DELETE FROM tb_rekomendasi_alternatif WHERE id_paketwisata=".$_GET['id']);

echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?page=rekomendasialternatif';</script>";
?>