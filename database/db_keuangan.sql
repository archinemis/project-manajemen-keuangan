-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 07:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`) VALUES
(1, 'Laptop'),
(2, 'Televisi'),
(3, 'Handphone');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_detail`
--

CREATE TABLE `tb_barang_detail` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `thn_keluaran` year(4) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_detail`
--

INSERT INTO `tb_barang_detail` (`id`, `id_barang`, `thn_keluaran`, `harga`) VALUES
(1, 1, 2016, 2500000),
(2, 1, 2017, 3500000),
(3, 1, 2018, 4000000),
(4, 2, 2016, 2000000),
(5, 2, 2017, 3000000),
(6, 2, 2018, 3500000),
(7, 3, 2016, 1000000),
(8, 3, 2017, 2500000),
(9, 3, 2018, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailgadai`
--

CREATE TABLE `tb_detailgadai` (
  `id_detail_gadai` int(11) NOT NULL,
  `kode_gadai` varchar(20) NOT NULL,
  `status_dibayar` tinyint(1) NOT NULL DEFAULT '0',
  `status_konfirmasi` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `bukti` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailgadai`
--

INSERT INTO `tb_detailgadai` (`id_detail_gadai`, `kode_gadai`, `status_dibayar`, `status_konfirmasi`, `bulan`, `bukti`) VALUES
(22, 'dra1547753110', 1, 2, 1, 'dra15477531101adra.png'),
(23, 'dra1547753110', 0, 0, 2, NULL),
(24, 'dra1547753110', 0, 0, 3, NULL),
(25, 'dra1547753110', 0, 0, 4, NULL),
(26, 'mas1547778525', 0, 1, 1, 'mas15477785251dimas.png'),
(27, 'mas1547778525', 0, 0, 2, NULL),
(28, 'mas1547778525', 0, 0, 3, NULL),
(29, 'g1547795197', 1, 2, 1, 'g15477951971g.png'),
(30, 'g1547795197', 0, 0, 2, NULL),
(31, 'ita1547807664', 1, 2, 1, 'ita15478076641gita.png'),
(32, 'ita1547807664', 0, 0, 2, NULL),
(33, 'ita1547807664', 0, 0, 3, NULL),
(34, 'ita1547807664', 0, 0, 4, NULL),
(35, 'ita1547807664', 0, 0, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailuser`
--

CREATE TABLE `tb_detailuser` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomorKTP` char(16) NOT NULL,
  `namaLengkap` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenisKelamin` char(1) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tglLahir` date NOT NULL,
  `provinsiTinggal` varchar(50) NOT NULL,
  `kabKotTinggal` varchar(50) NOT NULL,
  `kecTinggal` varchar(50) NOT NULL,
  `kelurahanTinggal` varchar(50) NOT NULL,
  `statusMenikah` char(1) NOT NULL,
  `namaIbuKandung` varchar(50) NOT NULL,
  `fotoProfile` varchar(255) NOT NULL,
  `ktpPassport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailuser`
--

INSERT INTO `tb_detailuser` (`id`, `id_user`, `nomorKTP`, `namaLengkap`, `email`, `jenisKelamin`, `agama`, `tempatLahir`, `tglLahir`, `provinsiTinggal`, `kabKotTinggal`, `kecTinggal`, `kelurahanTinggal`, `statusMenikah`, `namaIbuKandung`, `fotoProfile`, `ktpPassport`) VALUES
(1, 1, 'Denandra Prasety', 'Denandra Prasetya Laksma Putra', 'denandra16282@gmail.co', 'L', '', 'Denpasar', '0000-00-00', '', '', '', '', '', '', 'denandra.jpeg', ''),
(2, 2, '', 'Dwiky Rachman Hidayat', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', ''),
(3, 2, '', 'Dimas', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', ''),
(10, 10, 'Denandra Prasety', 'adra', 'denandra1628@gmail.com', 'L', 'Islam', 'Denpasar', '2019-01-08', 'Jawa', 'q', 'SS', 'B', 'B', 'B', 'adra.jpeg', ''),
(11, 12, 'Denandra Prasety', 'dims', 'denandra1628@gmail.com', 'L', 'Islam', 'Denpasar', '0000-00-00', 'Jawa', 'B', 'SS', 'B', 'B', 'e', 'dimas.', ''),
(12, 13, '1223444555', 'gita', 'g@gmail.com', 'P', 'Islam', 'Surabaya', '2000-06-06', 'Jawa', 'a', 'a', 'B', 'B', 'a', 'g.png', ''),
(13, 14, 'Denandra Prasety', 'Gita', 'denandra1628@gmail.com', 'L', 'Islam', 'Denpasar', '0000-00-00', 'Jawa', 'B', 'SS', 'B', 'B', 'r', 'gita.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gadai`
--

CREATE TABLE `tb_gadai` (
  `id` int(11) NOT NULL,
  `kode_gadai` varchar(50) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `thn_keluaran` varchar(10) NOT NULL,
  `bunga` float NOT NULL,
  `lama_angsur` int(11) NOT NULL,
  `biaya_angsur` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal_gadai` date NOT NULL,
  `status_lunas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gadai`
--

INSERT INTO `tb_gadai` (`id`, `kode_gadai`, `kode_barang`, `merk`, `tipe`, `kondisi`, `thn_keluaran`, `bunga`, `lama_angsur`, `biaya_angsur`, `username`, `tanggal_gadai`, `status_lunas`) VALUES
(22, 'dra1547753110', 1, 'Samsung', 'J100', 'baru', '2016', 0.08, 4, 641667, 'adra', '2019-01-17', 0),
(23, 'mas1547778525', 3, 'Samsung', 'J100', 'lama', '2016', 0.05, 3, 337500, 'dimas', '2019-01-18', 0),
(24, 'g1547795197', 1, 'lg', 'J100', 'baru', '2016', 0.08, 2, 1266667, 'g', '2019-01-18', 0),
(25, 'ita1547807664', 1, 'Samsung', 'J100', 'baru', '2016', 0.08, 5, 516667, 'gita', '2019-01-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Denandra', '123', 'member'),
(2, 'dwikyaja', 'yoi', 'member'),
(3, 'dims', 'dimas', 'member'),
(10, 'adra', 'SS', 'member'),
(11, 'admin', 'admin', 'admin'),
(12, 'dimas', '123', 'member'),
(13, 'g', '123', 'member'),
(14, 'gita', 'SS', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_detail`
--
ALTER TABLE `tb_barang_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailgadai`
--
ALTER TABLE `tb_detailgadai`
  ADD PRIMARY KEY (`id_detail_gadai`);

--
-- Indexes for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gadai`
--
ALTER TABLE `tb_gadai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang_detail`
--
ALTER TABLE `tb_barang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_detailgadai`
--
ALTER TABLE `tb_detailgadai`
  MODIFY `id_detail_gadai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_gadai`
--
ALTER TABLE `tb_gadai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
