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
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/logo.png" />
  <title> Admin  - Dashboard</title>


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
         <i class="fas fa-users"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Home Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
         <a class="nav-link active text-white" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Daftar Paket Wisata Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link active text-white" href="index.php?page=paketwisata"><i class="fas fa-folder mr-2"></i>Daftar Paket Wisata</a>
      </li>

      <!-- Nav Item - Daftar Wisata Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link active text-white" href="index.php?page=wisata"><i class="fas fa-folder mr-2"></i>Daftar Wisata</a>
      </li>

      <!-- Nav Item - Daftar Pelanggan Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link active text-white" href="index.php?page=pelanggan"><i class="fas fa-folder mr-2"></i>Daftar Pelanggan</a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-money-check-alt mr-2"></i>Transaksi</a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=pemesanan">Pemesanan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
       <hr class="sidebar-divider my-0">
      <li class="nav-item">
          <a class="nav-link active text-white" href="index.php?page=laporan_pemesanan"> <i class="fas fa-fw fa-file mr-2"></i>Laporan</a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, Selamat Datang</span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?page=logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>

          <!-- Content Row -->
          <div class="row"></div>
          <section>
          <div class="content">
          <div class="block-header">
              <?php
              if (isset($_GET['page'])) 
              {
                if ($_GET['page']=="paketwisata") 
                {
                  include 'paket.php';
                }
                elseif ($_GET['page']=="wisata") 
                {
                  include 'wisata.php';
                }
                elseif ($_GET['page']=="pelanggan") 
                {
                  include 'pelanggan.php';
                }
                elseif ($_GET['page']=="pemesanan") 
                {
                  include 'pemesanan.php';
                }
                elseif ($_GET['page']=="pembayaran") 
                {
                  include 'pembayaran.php';
                }
                elseif ($_GET['page']=="detail") 
                {
                  include 'detail.php';
                }
                elseif ($_GET['page']=="tambahpaket") 
                {
                  include 'tambahpaket.php';
                }
                elseif ($_GET['page']=="tambahwisata") 
                {
                  include 'tambahwisata.php';
                }
                elseif ($_GET['page']=="hapuspaket") 
                {
                  include 'hapuspaket.php';
                }
                elseif ($_GET['page']=="hapuswisata") 
                {
                  include 'hapuswisata.php';
                }
                elseif ($_GET['page']=="ubahpaket") 
                {
                  include 'ubahpaket.php';
                }
                elseif ($_GET['page']=="ubahwisata") 
                {
                  include 'ubahwisata.php';
                }
                 elseif ($_GET['page']=="logout") 
                {
                  include 'logout.php';
                }
                elseif ($_GET['page']=="pembayaran") 
                {
                  include 'pembayaran.php';
                }
                elseif ($_GET['page']=="laporan_pemesanan") 
                {
                  include 'laporan_pemesanan.php';
                }
                elseif ($_GET['page']=="pembatalan") 
                {
                  include 'pembatalan.php';
                }
              }
              else
              {
                include 'dashboard.php';
              }
                
              ?>
          </div>
        </div>
        </section>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>