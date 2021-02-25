-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2020 pada 04.17
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `paket_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paketwisata`
--

CREATE TABLE IF NOT EXISTS `tb_paketwisata` (
  `id_paketwisata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paketwisata` varchar(30) DEFAULT NULL,
  `deskripsi` text,
  `harga` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_paketwisata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data untuk tabel `tb_paketwisata`
--

INSERT INTO `tb_paketwisata` (`id_paketwisata`, `nama_paketwisata`, `deskripsi`, `harga`) VALUES
(111, 'Yogyakarta - Jakarta', 'Jakarta juga menjadi pusat pemerintahan, pusat bisnis, dan pusat kebudayaan. Dibalik itu semua, ternyata ada banyak tempat wisata. ', '1251111'),
(112, 'Yogyakarta - Bali', 'Bali merupakan salah satu destinasi kunjungan wisatawan favorit bagi wisatawan, baik wisatawan lokal maupun wisatawan mancanegara. ', '1181111'),
(113, 'Yogyakarta - Bandung', 'Kota Bandung merupakan kota pariwisata di Indonesia karena kota Bandung sudah menjadi tujuan wisata para wisatawan baik itu wisatawan lokal maupun wisatawan mancanegara.', '1155556'),
(114, 'Yogyakarta - Malang', 'Malang merupakan salah satu kabupaten dan kota di Jawa Timur yang terletak di dataran tinggi, berjarak 90 Km dari kota Surabaya.', '1279444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'Desriyan Puspita', 'Cilacap', '082129137330', 'desriyanpuspita@gmail.com', 'desriyan', '12345'),
(3, 'asrinda alwita', 'bandung', '089123456789', 'asrinda123@gmail.com', 'asrinda', '123456'),
(6, 'Rowinda Dwi', 'Bandung', '089765123456', 'rowinda123@gmail.com', 'rowinda', '123412');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembatalan`
--

CREATE TABLE IF NOT EXISTS `tb_pembatalan` (
  `id_pembatalan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pembatalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_bayar` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `bukti_transfer` text,
  PRIMARY KEY (`id_pembayaran`),
  KEY `FK_tb_pembayaran` (`id_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama`, `jumlah_bayar`, `tanggal`, `bukti_transfer`) VALUES
(1, 9, 'Asrinda Alwita', '2435000', '2020-04-12', '20200412095841daun2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paketwisata` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_pemesanan` int(20) NOT NULL,
  `status_pemesanan` varchar(30) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id_pemesanan`),
  KEY `FK_tb_pemesanan` (`id_pelanggan`),
  KEY `FK_tb_pemesanan_2` (`id_paketwisata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_paketwisata`, `tanggal`, `total_pemesanan`, `status_pemesanan`) VALUES
(9, 3, 113, '2020-04-10', 2435000, 'sudah kirim pembayaran'),
(10, 1, 111, '2020-04-11', 1251111, 'pending'),
(11, 6, 113, '2020-04-11', 2406667, 'pending'),
(12, 3, 114, '2020-04-13', 1279444, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan_paket`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan_paket` (
  `id_pemesanan_paket` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_paketwisata` int(11) NOT NULL,
  `jumlah` int(30) NOT NULL,
  PRIMARY KEY (`id_pemesanan_paket`),
  KEY `FK_tb_pemesanan_paket` (`id_paketwisata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_pemesanan_paket`
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE IF NOT EXISTS `tb_wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `id_paketwisata` int(11) DEFAULT NULL,
  `nama` text,
  `foto` text,
  PRIMARY KEY (`id_wisata`),
  KEY `FK_tb_wisata` (`id_paketwisata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `tb_wisata`
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `FK_tb_pembayaran` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `FK_tb_pemesanan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_pemesanan_2` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan_paket`
--
ALTER TABLE `tb_pemesanan_paket`
  ADD CONSTRAINT `FK_tb_pemesanan_paket` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD CONSTRAINT `FK_tb_wisata` FOREIGN KEY (`id_paketwisata`) REFERENCES `tb_paketwisata` (`id_paketwisata`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
