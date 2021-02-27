-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 05:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paket_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_paketwisata`
--

CREATE TABLE `tb_paketwisata` (
  `id_paketwisata` int(11) NOT NULL,
  `nama_paketwisata` varchar(30) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paketwisata`
--

INSERT INTO `tb_paketwisata` (`id_paketwisata`, `nama_paketwisata`, `deskripsi`, `harga`) VALUES
(111, 'Yogyakarta - Jakarta', 'Jakarta juga menjadi pusat pemerintahan, pusat bisnis, dan pusat kebudayaan. Dibalik itu semua, ternyata ada banyak tempat wisata. ', '1251111'),
(112, 'Yogyakarta - Bali', 'Bali merupakan salah satu destinasi kunjungan wisatawan favorit bagi wisatawan, baik wisatawan lokal maupun wisatawan mancanegara. ', '1181111'),
(113, 'Yogyakarta - Bandung', 'Kota Bandung merupakan kota pariwisata di Indonesia karena kota Bandung sudah menjadi tujuan wisata para wisatawan baik itu wisatawan lokal maupun wisatawan mancanegara.', '1155556'),
(114, 'Yogyakarta - Malang', 'Malang merupakan salah satu kabupaten dan kota di Jawa Timur yang terletak di dataran tinggi, berjarak 90 Km dari kota Surabaya.', '1279444');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'Desriyan Puspita', 'Cilacap', '082129137330', 'desriyanpuspita@gmail.com', 'desriyan', '12345'),
(3, 'asrinda alwita', 'bandung', '089123456789', 'asrinda123@gmail.com', 'asrinda', '123456'),
(6, 'Rowinda Dwi', 'Bandung', '089765123456', 'rowinda123@gmail.com', 'rowinda', '123412');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembatalan`
--

CREATE TABLE `tb_pembatalan` (
  `id_pembatalan` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_bayar` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `bukti_transfer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama`, `jumlah_bayar`, `tanggal`, `bukti_transfer`) VALUES
(1, 9, 'Asrinda Alwita', '2435000', '2020-04-12', '20200412095841daun2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paketwisata` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_pemesanan` int(20) NOT NULL,
  `status_pemesanan` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_paketwisata`, `tanggal`, `total_pemesanan`, `status_pemesanan`) VALUES
(9, 3, 113, '2020-04-10', 2435000, 'sudah kirim pembayaran'),
(10, 1, 111, '2020-04-11', 1251111, 'pending'),
(11, 6, 113, '2020-04-11', 2406667, 'pending'),
(12, 3, 114, '2020-04-13', 1279444, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_paket`
--

CREATE TABLE `tb_pemesanan_paket` (
  `id_pemesanan_paket` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_paketwisata` int(11) NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan_paket`
--

INSERT INTO `tb_pemesanan_paket` (`id_pemesanan_paket`, `id_pemesanan`, `id_paketwisata`, `jumlah`) VALUES
(1, 9, 114, 1),
(2, 9, 113, 1),
(3, 10, 111, 1),
(4, 11, 111, 1),
(5, 11, 113, 1),
(6, 12, 114, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekomendasi_alternatif`
--

CREATE TABLE `tb_rekomendasi_alternatif` (
  `id` int(11) NOT NULL,
  `id_paketwisata` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekomendasi_alternatif`
--

INSERT INTO `tb_rekomendasi_alternatif` (`id`, `id_paketwisata`, `id_variabel`) VALUES
(1, 111, 1),
(2, 111, 4),
(3, 111, 7),
(4, 112, 1),
(5, 112, 4),
(6, 112, 7),
(7, 113, 1),
(8, 113, 4),
(9, 113, 7),
(10, 114, 1),
(11, 114, 4),
(12, 114, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekomendasi_kriteria`
--

CREATE TABLE `tb_rekomendasi_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekomendasi_kriteria`
--

INSERT INTO `tb_rekomendasi_kriteria` (`id_kriteria`, `kriteria`) VALUES
(1, 'C1. Harga Paket'),
(2, 'C2. Jumlah Wisata'),
(3, 'C3. Lama Tour');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekomendasi_variabel`
--

CREATE TABLE `tb_rekomendasi_variabel` (
  `id_variabel` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `variabel` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekomendasi_variabel`
--

INSERT INTO `tb_rekomendasi_variabel` (`id_variabel`, `id_kriteria`, `variabel`, `nilai`) VALUES
(1, 1, 'Harga <= 53000000', 3),
(2, 1, 'Harga 53000000 - 55000000', 3),
(3, 1, 'Harga >= 55000000', 5),
(4, 2, '5-6', 1),
(5, 2, '7-8', 3),
(6, 2, '9-10', 5),
(7, 3, '<=3 hari', 1),
(8, 3, '3-4 hari', 3),
(9, 3, '>=4 hari', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_paketwisata` int(11) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `id_paketwisata`, `nama`, `foto`) VALUES
(11, 111, 'Ancol', 'ancol.jpg'),
(12, 111, 'TMII', 'tmii.jpg'),
(13, 111, 'Masjid Istiqlal', 'masjid.jpg'),
(14, 111, 'Keong Mas', 'keongmas.jpg'),
(15, 111, 'Dunia Fantasi (Dufan)', 'dufan.jpg'),
(16, 111, 'Mangga II', 'mangga2.jpg'),
(17, 111, 'Gereja Katedral', 'katedral.jpg'),
(18, 112, 'Tanah Lot', 'tanahlot.jpg'),
(19, 112, 'Tanjung Benoa', 'tanjung benoa.jpg'),
(20, 112, 'Sangeh', 'sangeh.jpg'),
(21, 112, 'Pantai Kuta', 'kuta.jpg'),
(22, 112, 'Bedugul', 'bedugul.jpg'),
(23, 112, 'Pantai Pandawa', 'pandawa.jpg'),
(24, 112, 'Krisna', 'krisna.jpg'),
(25, 112, 'Joger', 'joger1.jpg'),
(26, 112, 'Puja Mandala', 'puja mandala.jpg'),
(27, 113, 'Tangkupan Perahu', 'tangkupanperahu.jpg'),
(28, 113, 'Ciater', 'ciater.jpg'),
(29, 113, 'Floating Mart', 'floatingmarket.jpeg'),
(30, 113, 'Farm House Susu Lembang', 'farmhouse.jpg'),
(31, 113, 'Trans Studio Bandung', 'trans studio.jpg'),
(32, 113, 'Cibaduyut', 'cibaduyut.jpg'),
(33, 114, 'Jatim Park II', 'jatim park.jpg'),
(34, 114, 'Museum Aangkut', 'museum angkut.jpg'),
(35, 114, 'BNS', 'bns.jpg'),
(36, 114, 'Petik Apel', 'petik apel.jpg'),
(37, 114, 'Taman Safari', 'taman safari.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_paketwisata`
--
ALTER TABLE `tb_paketwisata`
  ADD PRIMARY KEY (`id_paketwisata`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembatalan`
--
ALTER TABLE `tb_pembatalan`
  ADD PRIMARY KEY (`id_pembatalan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `FK_tb_pembayaran` (`id_pemesanan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `FK_tb_pemesanan` (`id_pelanggan`),
  ADD KEY `FK_tb_pemesanan_2` (`id_paketwisata`);

--
-- Indexes for table `tb_pemesanan_paket`
--
ALTER TABLE `tb_pemesanan_paket`
  ADD PRIMARY KEY (`id_pemesanan_paket`),
  ADD KEY `FK_tb_pemesanan_paket` (`id_paketwisata`);

--
-- Indexes for table `tb_rekomendasi_alternatif`
--
ALTER TABLE `tb_rekomendasi_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekomendasi_kriteria`
--
ALTER TABLE `tb_rekomendasi_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_rekomendasi_variabel`
--
ALTER TABLE `tb_rekomendasi_variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `FK_tb_wisata` (`id_paketwisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_paketwisata`
--
ALTER TABLE `tb_paketwisata`
  MODIFY `id_paketwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pembatalan`
--
ALTER TABLE `tb_pembatalan`
  MODIFY `id_pembatalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pemesanan_paket`
--
ALTER TABLE `tb_pemesanan_paket`
  MODIFY `id_pemesanan_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rekomendasi_alternatif`
--
ALTER TABLE `tb_rekomendasi_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_rekomendasi_kriteria`
--
ALTER TABLE `tb_rekomendasi_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rekomendasi_variabel`
--
ALTER TABLE `tb_rekomendasi_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `FK_tb_pembayaran` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `FK_tb_pemesanan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_pemesanan_2` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesanan_paket`
--
ALTER TABLE `tb_pemesanan_paket`
  ADD CONSTRAINT `FK_tb_pemesanan_paket` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD CONSTRAINT `FK_tb_wisata` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
