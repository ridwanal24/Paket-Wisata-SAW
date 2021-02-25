<?php

  //koneksi ke database
  include 'koneksi.php';

  session_start();

  if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
  {
  echo "<script>alert('pemesanan kosong, silahkan pilih paket terlebih dahulu');</script>";
  echo "<script>location='index.php';</script>";
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/logo.png" />
    <title>PO Tami Jaya - Pemesanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <?php include 'menu.php'; ?>

    <section class="site-hero overlay site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/home1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">
            <div class="mb-5 element-animate">
              <h1>Welcome To PO Tami Jaya Website</h1>
              <p>We Love To Trip With You.</p>
              <p><a href="about.php" class="btn btn-primary">About</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section">
    <div class="container">
    <div class="row mb-5"></div>
    <h1>Keranjang Pemesanan</h1>

    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Paket</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor=1; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_paketwisata => $jumlah):  ?>
        <!-- Menampilkan paket yang sedang diperulangkan berdasarkan id_paketwisata -->
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_paketwisata WHERE id_paketwisata='$id_paketwisata'");
        $pecah = $ambil->fetch_assoc();
        $subharga = $pecah["harga"]*$jumlah;
        ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah["nama_paketwisata"]; ?></td>
          <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
          <td><?php echo $jumlah; ?></td>
          <td>Rp. <?php echo number_format($subharga); ?></td>
          <td>
            <a href="hapuspemesanan.php?id=<?php echo $id_paketwisata ?>" class="btn btn-danger btn-xs">hapus</a>
          </td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-default">Tambahkan Pemesanan</a>
    <a href="checkout.php" class="btn btn-primary">Checkout</a>
    <div class="row mb-5"></div>
  </div>
</section>
   
    <?php include 'footer.php'; ?>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>