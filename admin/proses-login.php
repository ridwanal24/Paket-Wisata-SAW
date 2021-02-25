<html>
	<head><title>proses data dari form</title></head>
<body>
<h1>Proses login</h1>
<?
	///membuat koneksi ke database
	$server="localhost"; ///nama server
	$username="root"; ///nama username mysql
	$password=""; ///password, kosongkan jika tidak ada
	$database="paket_wisata"; ///nama database yang dipilih

	mysql_connect($server, $username, $password) or die ("Koneksinya Gagal"); ///koneksi ke database
	mysql_select_db($database) or die ("Databasenya Tidak Ada"); ///memilih database, dan menampilkan pesan jika gagal
	///mengambil data dari form
	$username=$_POST[username];
	$password=$_POST[password];

	///input dari tb_user
	$cek=mysql_query("SELECT * FROM tb_user (username, password) VALUES ('$username', '$password')";
	///cek sudah terinput atau belum
	if($cek) ///jika sukses
	{
		echo "Selamat Datang Admin";
	}
		else ///jika gagal
	{
		echo "Gagal Login";
	}
?>
| <a href="index.php">OK</a>
</body>
</html>