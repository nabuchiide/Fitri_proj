-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mei 2020 pada 13.32
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hph_proj_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `id_jenis_barang` varchar(4) NOT NULL,
  `harga_barang` int(7) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `id_satuan_barang` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_jenis_barang`, `harga_barang`, `jumlah_barang`, `id_satuan_barang`) VALUES
('BRG001', 'Hufagrip Pilek SYR 60 ML', 'JNS3', 16700, 1210, 'STB1'),
('BRG002', 'Sanaflu', 'JNS3', 17000, 900, 'STB0'),
('BRG003', 'Amoxilin', 'JNS3', 125000, 1100, 'STB1'),
('BRG004', 'Xianpi', 'JNS2', 50000, 140, 'STB1'),
('BRG005', 'Promag', 'JNS1', 11000, 270, 'STB1'),
('BRG006', 'Vatigon Spirit', 'JNS1', 17000, 400, 'STB1'),
('BRG007', 'Avigan', 'JNS1', 25000, 100, 'STB1'),
('BRG008', 'Kloroquen', 'JNS1', 70000, 0, 'STB1'),
('BRG009', 'Asam Mefenamat', 'JNS1', 2000, 0, 'STB1'),
('BRG010', 'Antalgin', 'JNS1', 5000, 200, 'STB1'),
('BRG011', 'Nopalgin', 'JNS1', 8000, 780, 'STB1'),
('BRG012', 'NHCL', 'JNS1', 100000, 250, 'STB1'),
('BRG013', 'NaCHL2', 'JNS1', 100000, 0, 'STB1'),
('BRG014', 'Steteskop', 'JNS1', 125000, 300, 'STB1'),
('BRG015', 'Kompresor', 'JNS1', 100000, 300, 'STB1'),
('BRG016', 'OBH Combi', 'JNS1', 14000, 320, 'STB1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE IF NOT EXISTS `detail_order` (
`detil_cart_id` int(20) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_transaksi` int(7) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`detil_cart_id`, `nama_barang`, `harga_transaksi`, `id_order`, `jumlah`) VALUES
(93, 'Kompresor', 100000, 'REQ001', 100),
(94, 'OBH Combi', 14000, 'REQ001', 120),
(95, 'Antalgin', 5000, 'REQ002', 100),
(96, 'Nopalgin', 8000, 'REQ002', 780),
(97, 'NHCL', 100000, 'REQ002', 100),
(98, 'Hufagrip Pilek SYR 60 ML', 16700, 'REQ003', 100),
(99, 'Xianpi', 50000, 'REQ004', 90),
(100, 'Promag', 11000, 'REQ004', 70),
(101, 'Vatigon Spirit', 17000, 'REQ004', 100),
(102, 'Antalgin', 5000, 'REQ005', 100),
(103, 'NHCL', 100000, 'REQ005', 150),
(104, 'Hufagrip Pilek SYR 60 ML', 16700, 'REQ006', 10),
(106, 'Steteskop', 125000, 'REQ007', 300),
(107, 'Kompresor', 100000, 'REQ008', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
`detil_ret_id` int(20) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_transaksi` int(7) NOT NULL,
  `id_retur` varchar(6) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_retur`
--

INSERT INTO `detail_retur` (`detil_ret_id`, `nama_barang`, `harga_transaksi`, `id_retur`, `jumlah`) VALUES
(1, 'Xianpi', 50000, 'RET001', 10),
(2, 'Promag', 11000, 'RET001', 50),
(3, 'Vatigon Spirit', 17000, 'RET001', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
`id` int(5) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `total_hutang` int(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id`, `nama_suplier`, `total_hutang`) VALUES
(1, 'PT Bio Safety', 38000000),
(7, 'PT Gratia Husada Farma', 5177000),
(8, 'PT Raja Wali Nusindo1', 6970000),
(9, 'PT Grand Tech. Inc,', 0),
(10, 'PT Kimia Farma Tech.', 0),
(11, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis_barang` varchar(10) NOT NULL,
  `keterangan_jenis_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `keterangan_jenis_barang`) VALUES
('JNS1', 'Alat Kesehatan'),
('JNS2', ' Obat'),
('JNS3', 'Prekusor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
  `id_barang` varchar(6) NOT NULL,
  `id_suplier` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id_barang`, `id_suplier`) VALUES
('BRG001', 'SPL001'),
('BRG002', 'SPL001'),
('BRG003', 'SPL001'),
('BRG004', 'SPL002'),
('BRG005', 'SPL002'),
('BRG006', 'SPL002'),
('BRG007', 'SPL003'),
('BRG008', 'SPL003'),
('BRG009', 'SPL003'),
('BRG010', 'SPL004'),
('BRG011', 'SPL004'),
('BRG012', 'SPL004'),
('BRG013', 'SPL004'),
('BRG014', 'SPL004'),
('BRG015', 'SPL005'),
('BRG016', 'SPL007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` varchar(6) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(16) NOT NULL,
  `total_transaksi` int(45) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `no_surat_jalan` varchar(25) NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `nomor_faktur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `tanggal`, `status`, `total_transaksi`, `nama_suplier`, `tanggal_penerimaan`, `tanggal_pembelian`, `no_surat_jalan`, `tanggal_pelunasan`, `nomor_faktur`) VALUES
('REQ001', '2020-05-04', 'Lunas', 11680000, 'PT Grand Tech. Inc,', '2020-05-08', '2020-05-13', 'D/001/GT/TR001', '2020-05-13', '2145521'),
('REQ002', '2020-05-05', 'Lunas', 16740000, 'PT Bio Safety', '2020-05-08', '2020-05-07', 'D/001/BIO.SAF/TR001', '2020-05-09', ''),
('REQ003', '2020-05-07', 'Porses Pelunasan', 1670000, 'PT Gratia Husada Farma', '2020-05-11', '2020-05-08', 'ghfdluygtliu', '0000-00-00', ''),
('REQ004', '2020-05-07', 'Lunas', 6970000, 'PT Raja Wali Nusindo1', '2020-05-11', '2020-05-08', 'D/001/RJN/TR002', '2020-05-11', ''),
('REQ005', '2020-05-06', 'Lunas', 15500000, 'PT Bio Safety', '2020-05-11', '2020-05-08', 'D/001/BIO/SRT02', '2020-05-12', ''),
('REQ006', '2020-05-18', 'Porses Pelunasan', 167000, 'PT Gratia Husada Farma', '2020-05-19', '2020-05-19', 'D/005?VSVRT20', '0000-00-00', '2184513'),
('REQ007', '2020-05-08', 'Lunas', 38000000, 'PT Bio Safety', '2020-05-12', '2020-05-11', 'D/005?VSVRT20', '2020-05-12', '2184513'),
('REQ008', '2020-05-20', 'dibeli', 10000000, 'PT Grand Tech. Inc,', '0000-00-00', '2020-05-20', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` varchar(6) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `tempo` int(2) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_order`, `tempo`, `status`) VALUES
('', '', 2, 'Lunas'),
('PEM001', 'REQ001', 8, 'Lunas'),
('PEM002', 'REQ002', 2, 'Lunas'),
('PEM003', 'REQ003', 20, 'Belum Lunas'),
('PEM004', 'REQ004', 9, 'Lunas'),
('PEM005', 'REQ005', 2, 'Lunas'),
('PEM006', 'REQ007', 2, 'Lunas'),
('PEM007', 'REQ006', 7, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(6) NOT NULL,
  `status` varchar(16) NOT NULL,
  `total_transaksi` int(45) NOT NULL,
  `tanggal` date NOT NULL,
  `id_order` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`) VALUES
('RET001', 'Retur', 1900000, '2020-05-11', 'REQ004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE IF NOT EXISTS `satuan_barang` (
  `id_satuan_barang` varchar(4) NOT NULL,
  `keterangan_satuan_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan_barang`, `keterangan_satuan_barang`) VALUES
('STB1', 'Botol'),
('STB2', 'Box'),
('STB3', 'Strip'),
('STB4', 'Tablet'),
('STB5', 'Pack'),
('STB6', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` varchar(6) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `nomor_telepon`, `alamat`) VALUES
('SPL001', 'PT Gratia Husada Farma', ' 21458452484', 'Karawang'),
('SPL002', 'PT Raja Wali Nusindo1', '01248521445', 'Jambi'),
('SPL003', 'PT Kimia Farma Tech.', '1760145620156', 'Jakarta'),
('SPL004', 'PT Bio Safety', ' 00245215', 'Bekasi'),
('SPL005', 'PT Grand Tech. Inc,', '142104505', 'Palembang'),
('SPL006', 'CV. Herbaltum', '122336652458', 'Jakarta'),
('SPL007', 'PT Adhi Farma', '1245751', 'Karawang'),
('SPL008', 'PT Adira Fintacke', '58567', 'Junti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(5) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nomor_telepon`, `password`, `level`) VALUES
('USR01', 'Malik', '085781000211', 'Musa12', 'Master'),
('USR02', 'Musa', '0124520', 'Musa12', 'Admin'),
('USR04', 'Mamluk2', '789462', 'Mamluk1', 'Kepala Gudang'),
('USR05', 'Nida', '5664', 'A', 'Keuangan'),
('USR06', 'PT NANANA', '47846', '1', 'Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
 ADD PRIMARY KEY (`detil_cart_id`);

--
-- Indexes for table `detail_retur`
--
ALTER TABLE `detail_retur`
 ADD PRIMARY KEY (`detil_ret_id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
 ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
 ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
 ADD PRIMARY KEY (`id_satuan_barang`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
 ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
MODIFY `detil_cart_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `detail_retur`
--
ALTER TABLE `detail_retur`
MODIFY `detil_ret_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
