-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 05:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(6) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `foto_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_kategori`, `nama_barang`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `foto_barang`) VALUES
('IND001', 1, 'Indomie Goreng Original', 'Dus', 20, 79000, 82500, NULL),
('MIS001', 1, 'Mie Sedap Kari Spesial', 'Dus', 10, 90000, 95000, NULL),
('NUT001', 2, 'Nutrisari Jeruk', 'Pack', 15, 9800, 9000, NULL),
('NUT002', 2, 'Nutrisari Jambu Biji', 'Pack', 20, 9500, 10000, NULL),
('NUT003', 2, 'Nutrisari Mangga', 'Pack', 12, 20000, 25000, NULL),
('SAR001', 8, 'Sari Roti Keju', 'Pcs', 2, 6000, 7500, NULL),
('SAR002', 8, 'Sari Roti Coklat', 'Pcs', 2, 6000, 7500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_tr` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan_barang` varchar(100) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_tr`, `tanggal`, `kode_barang`, `nama_barang`, `satuan_barang`, `jml_barang`, `harga_jual`, `total`) VALUES
('tr20190625.0945100610', '2019-06-25', 'MIS001', 'Mie Sedap Kari Spesial', 'Dus', 2, 95000, 190000),
('tr20190625.0946280628', '2019-06-25', 'IND001', 'Indomie Goreng Original', 'Dus', 2, 82500, 165000),
('tr20190625.1007390639', '2019-06-25', 'NUT001', 'Nutrisari Jeruk', 'Pack', 1, 9000, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
(1, 'Manager'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(8, 'Roti');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(6) NOT NULL,
  `kode_jabatan` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` char(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `tgl_rekrut` date NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `m_barang` int(11) NOT NULL,
  `m_pegawai` int(11) NOT NULL,
  `m_supplier` int(11) NOT NULL,
  `t1` int(11) NOT NULL,
  `t2` int(11) NOT NULL,
  `l` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `kode_jabatan`, `nama_depan`, `nama_belakang`, `alamat`, `no_tlp`, `email`, `tgl_lahir`, `jk`, `pendidikan`, `tgl_rekrut`, `username`, `password`, `m_barang`, `m_pegawai`, `m_supplier`, `t1`, `t2`, `l`) VALUES
('190101', 1, 'Sebastianus', 'Sembara', 'Jl. Bangkingan VII, Surabaya', '089616645409', 'sembara9090@gmail.com', '1999-01-20', 'L', 'SMA', '2019-06-18', 'bastian', '123456', 1, 1, 1, 1, 1, 1),
('190201', 2, 'Atika', 'Wardhani', 'Sidoarjo', '089876456234', 'atika@gmail.com', '1999-06-21', 'P', 'SMA', '2019-06-20', 'atika', '123456', 1, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_tr` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` char(13) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `ppn` float NOT NULL,
  `diskon` float NOT NULL,
  `grandtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `no_tlp` char(13) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `nama_perusahaan`, `alamat`, `kota`, `no_tlp`, `no_hp`, `email`, `keterangan`) VALUES
('SUP001', 'Salma Maghfira', 'PT. Indofood, tbk', 'Jl. Sepanjang IV', 'Sidoarjo', '0317525782', '089616645409', 'indofood@indo.com', 'Supplier Mie Instan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_tr`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_tr`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
