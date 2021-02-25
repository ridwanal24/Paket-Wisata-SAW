<?php

	session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	//koneksi ke database
  	include '../koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<!-- favicon -->
  <link rel="shortcut icon" href="../images/logo.png" />
	<title>Login - PO Tami Jaya</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- cek pesan notifikasi -->
	<br/>
	<br/>
	<form method="post">
		<h1>Sistem Informasi Pemesanan Paket Wisata <br/> PO Tami Jaya </h1>

		<div class="kotak_login">
		  <p class="tulisan_login">Silahkan login</p>

		  <form method="post">
		    <label>Username</label>
		    <input type="text" name="user" class="form_login" name="user" required>

		    <label>Password</label>
		    <input type="password" name="pass" class="form_login">

		    <input type="submit" name="login" value="Login" class="tombol_login" required>

		    <br/>
		    <br/>
		  </form>
		  <?php
		  if (isset($_POST['login'])) 
		  {
		  	$ambil = $koneksi->query("SELECT * FROM tb_user WHERE username='$_POST[user]' AND password = '$_POST[pass]'");
		  	$yangcocok = $ambil->num_rows;
		  	if ($yangcocok==1) 
		  	{
		  		$_SESSION['admin']=$ambil->fetch_assoc();
		  		echo "<div class='alert alert-info'>Login Sukses</div>";
		  		echo "<meta http-equiv='refresh' content='1;url=index.php'>";
		  	}
		  	else
		  	{
		  		echo "<div class='alert alert-danger'>Login Gagal</div>";
		  		echo "<meta http-equiv='refresh' content='1;url=login.php'>";
		  	}
		  }
		  ?>	
	</form>
</body>
</html>
