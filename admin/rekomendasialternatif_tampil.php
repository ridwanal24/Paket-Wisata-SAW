<?php
session_start();
  //koneksi ke database
  include '../koneksi.php';
  
  if (!isset($_SESSION['admin'])) 
  {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
  }

if(isset($_GET['id'])){
    $arr = array();
    $a = $koneksi->query("SELECT * FROM tb_paketwisata as pw JOIN tb_rekomendasi_alternatif as ra ON ra.id_paketwisata=pw.id_paketwisata JOIN tb_rekomendasi_variabel as rv ON rv.id_variabel=ra.id_variabel JOIN tb_rekomendasi_kriteria as rk ON rk.id_kriteria=rv.id_kriteria WHERE pw.id_paketwisata=".$_GET['id']);
    while($x = $a->fetch_assoc()){
        $arr[] = array(
            'nama_paketwisata' => $x['nama_paketwisata'],
            'kriteria' => $x['kriteria'],
            'variabel' => $x['variabel']
        );
    }
    echo json_encode($arr);
}