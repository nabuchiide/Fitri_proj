-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2020 pada 13.59
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
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `id_jenis_barang` varchar(10) NOT NULL,
  `harga_barang` varchar(15) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `id_satuan_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_jenis_barang`, `harga_barang`, `jumlah_barang`, `id_satuan_barang`) VALUES
('BRG001', 'Hufagrip Pilek SYR 60 ML', 'JNS002', '16700', 1200, 'STB003'),
('BRG002', 'Sanaflu', 'JNS002', '17000', 900, 'STB003'),
('BRG003', 'Amoxilin', 'JNS002', '125000', 1100, 'STB003'),
('BRG004', 'Xianpi', 'JNS002', '50000', 140, 'STB001'),
('BRG005', 'Promag', 'JNS002', '11000', 270, 'STB005'),
('BRG006', 'Vatigon Spirit', 'JNS002', '17000', 400, 'STB005'),
('BRG007', 'Avigan', 'JNS003', '25000', 100, 'STB005'),
('BRG008', 'Kloroquen', 'JNS003', '70000', 0, 'STB003'),
('BRG009', 'Asam Mefenamat', 'JNS002', '2000', 0, 'STB003'),
('BRG010', 'Antalgin', 'JNS002', '5000', 200, 'STB002'),
('BRG011', 'Nopalgin', 'JNS002', '8000', 780, 'STB002'),
('BRG012', 'NHCL', 'JNS001', '100000', 250, 'STB001'),
('BRG013', 'NaCHL2', 'JNS001', '100000', 0, 'STB001'),
('BRG014', 'Steteskop', 'JNS001', '125000', 0, 'STB002'),
('BRG015', 'Kompresor', 'JNS001', '100000', 300, 'STB002'),
('BRG016', 'OBH Combi', 'JNS002', '14000', 320, 'STB001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
`detil_ret_id` int(20) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_transaksi` varchar(15) NOT NULL,
  `id_retur` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_retur`
--

INSERT INTO `detail_retur` (`detil_ret_id`, `nama_barang`, `harga_transaksi`, `id_retur`, `jumlah`) VALUES
(1, 'Xianpi', '50000', 'RET001', 10),
(2, 'Promag', '11000', 'RET001', 50),
(3, 'Vatigon Spirit', '17000', 'RET001', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE IF NOT EXISTS `detail_order` (
`detil_cart_id` int(20) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_transaksi` varchar(15) NOT NULL,
  `id_order` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`detil_cart_id`, `nama_barang`, `harga_transaksi`, `id_order`, `jumlah`) VALUES
(93, 'Kompresor', '100000', 'REQ001', '100'),
(94, 'OBH Combi', '14000', 'REQ001', '120'),
(95, 'Antalgin', '5000', 'REQ002', '100'),
(96, 'Nopalgin', '8000', 'REQ002', '780'),
(97, 'NHCL', '100000', 'REQ002', '100'),
(98, 'Hufagrip Pilek SYR 60 ML', '16700', 'REQ003', '100'),
(99, 'Xianpi', '50000', 'REQ004', '90'),
(100, 'Promag', '11000', 'REQ004', '70'),
(101, 'Vatigon Spirit', '17000', 'REQ004', '100'),
(102, 'Antalgin', '5000', 'REQ005', '100'),
(103, 'NHCL', '100000', 'REQ005', '150');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
`id` int(11) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `total_hutang` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id`, `nama_suplier`, `total_hutang`) VALUES
(1, 'PT Bio Safety', '15500000'),
(7, 'PT Gratia Husada Farma', '1670000'),
(8, 'PT Raja Wali Nusindo1', '13940000'),
(9, 'PT Grand Tech. Inc,', '0'),
(10, 'PT Kimia Farma Tech.', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis_barang` varchar(10) NOT NULL,
  `keterangan_jenis_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `keterangan_jenis_barang`) VALUES
('JNS001', 'Alat Kesehatan'),
('JNS002', ' Obat'),
('JNS003', 'Prekusor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
  `id_barang` varchar(10) NOT NULL,
  `id_suplier` varchar(10) NOT NULL
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
('BRG016', 'SPL005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_transaksi` varchar(45) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `no_surat_jalan` varchar(45) NOT NULL,
  `tanggal_pelunasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `tanggal`, `status`, `total_transaksi`, `nama_suplier`, `tanggal_penerimaan`, `tanggal_pembelian`, `no_surat_jalan`, `tanggal_pelunasan`) VALUES
('REQ001', '2020-05-04', 'Lunas', '11680000', 'PT Grand Tech. Inc,', '2020-05-08', '2020-05-13', 'D/001/GT/TR001', '2020-05-13'),
('REQ002', '2020-05-05', 'Lunas', '16740000', 'PT Bio Safety', '2020-05-08', '2020-05-07', 'D/001/BIO.SAF/TR001', '2020-05-09'),
('REQ003', '2020-05-07', 'Porses Pelunasan', '1670000', 'PT Gratia Husada Farma', '2020-05-11', '2020-05-08', 'ghfdluygtliu', '0000-00-00'),
('REQ004', '2020-05-07', 'Porses Pelunasan', '6970000', 'PT Raja Wali Nusindo1', '2020-05-11', '2020-05-08', 'D/001/RJN/TR002', '0000-00-00'),
('REQ005', '2020-05-06', 'Porses Pelunasan', '15500000', 'PT Bio Safety', '2020-05-11', '2020-05-08', 'D/001/BIO/SRT02', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_order` varchar(10) NOT NULL,
  `tempo` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_order`, `tempo`, `status`) VALUES
('PEM001', 'REQ001', '8', 'Lunas'),
('PEM002', 'REQ002', '2', 'Lunas'),
('PEM003', 'REQ003', '20', 'Belum Lunas'),
('PEM004', 'REQ004', '9', 'Belum Lunas'),
('PEM005', 'REQ005', '2', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_transaksi` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `id_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`) VALUES
('RET001', 'Retur', '1900000', '2020-05-11', 'REQ004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE IF NOT EXISTS `satuan_barang` (
  `id_satuan_barang` varchar(10) NOT NULL,
  `keterangan_satuan_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan_barang`, `keterangan_satuan_barang`) VALUES
('STB001', 'Botol'),
('STB002', 'Box'),
('STB003', 'Strip'),
('STB004', 'Tablet'),
('STB005', 'Pack'),
('STB006', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` varchar(10) NOT NULL,
  `nama_suplier` varchar(45) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `nomor_telepon`, `alamat`) VALUES
('SPL001', 'PT Gratia Husada Farma', ' 2145845248', 'Karawang'),
('SPL002', 'PT Raja Wali Nusindo1', '01248521445', 'Jambi'),
('SPL003', 'PT Kimia Farma Tech.', '1760145620156', 'Jakarta'),
('SPL004', 'PT Bio Safety', ' 00245215', 'Bekasi'),
('SPL005', 'PT Grand Tech. Inc,', '142104505', 'Palembang'),
('SPL006', 'CV. Herbaltum', '122336652458', 'Jakarta'),
('SPL007', 'PT Adhi Farma', '1245751', 'Karawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nomor_telepon`, `password`, `level`) VALUES
('USR001', 'Malik', '085781000211', 'Musa12', 'Master'),
('USR002', 'Musa', '0124520', 'Musa12', 'Admin'),
('USR004', 'Mamluk2', '789462', 'Mamluk1', 'Kepala Gudang'),
('USR005', 'Nida', '566', 'A', 'Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_retur`
--
ALTER TABLE `detail_retur`
 ADD PRIMARY KEY (`detil_ret_id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
 ADD PRIMARY KEY (`detil_cart_id`);

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
-- AUTO_INCREMENT for table `detail_retur`
--
ALTER TABLE `detail_retur`
MODIFY `detil_ret_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
MODIFY `detil_cart_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
