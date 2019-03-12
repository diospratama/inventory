-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 11:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `level`) VALUES
('dios', 'since007', 'muhamad dios', 'admin'),
('hades', 'hades007', 'muhamad hades kurniawan', 'admin'),
('lukman', 'user007', 'lukman bayu aji', 'user'),
('real', 'zuu', 'gggt', 'user'),
('ryuma', 'meitoshisui', 'ryuma', 'user'),
('shisui', 'shisui007', 'uciha shisui', 'user'),
('tama', 'since007', 'dios pratama', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `satuan` char(10) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`, `stok_awal`) VALUES
('HDDSAM', 'harddisk_touru_external_1TB', 'pcs', 500000, 600000, 17),
('HDDTRO1TBEX', 'harddisk_touru_external_1TB', 'pcs', 600000, 700000, 0),
('HDDWD1TBEX', 'harddisk_wd_external_1TB', 'pcs', 1000000, 1200000, 0),
('LCDACH16', 'lcd_acer_h163_14', 'pcs', 400000, 600000, 13),
('LPASX452EE1', 'Laptop_asus_X452E_E1', 'Pcs', 3600000, 3800000, 3),
('MB1LG115', 'mb_Gigabyte_lga_115', 'pcs', 10000000, 1400000, 1),
('RMDR3COR1600GM', 'ram_ddr3_corsair_gaming', 'pcs', 500000, 600000, 12),
('VGANVIAS256', 'Vga_nvidia_256bit_asus', 'pcs', 1000000, 1200000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `barang_uas`
--

CREATE TABLE `barang_uas` (
  `id_barang` char(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `jml_brg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_uas`
--

INSERT INTO `barang_uas` (`id_barang`, `nama`, `harga_jual`, `harga_beli`, `jml_brg`) VALUES
('BRG01', 'pensil', 2000, 1000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` char(15) DEFAULT NULL,
  `kode_barang` char(15) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_beli`
--

INSERT INTO `detail_beli` (`id_beli`, `kode_beli`, `kode_barang`, `jml_beli`) VALUES
(1, 'TRM1', 'LPASX452EE1', 12),
(2, 'TRM2', 'HDDSAM', 10),
(3, 'TRM2', 'LCDACH16', 12),
(5, 'TRM4', 'VGANVIAS256', 12),
(6, 'TRM5', 'RMDR3COR1600GM', 2);

--
-- Triggers `detail_beli`
--
DELIMITER $$
CREATE TRIGGER `duplicate_barang` AFTER INSERT ON `detail_beli` FOR EACH ROW BEGIN
 UPDATE duplicate_barang
 SET jml_beli = jml_beli + new.jml_beli
 WHERE
 kode_barang = new.kode_barang;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `record_tr_detail_beli` AFTER DELETE ON `detail_beli` FOR EACH ROW begin
insert into record_tr_detail_beli
( id_beli,
kode_beli,
kode_barang,
jml_beli,
tgl_hapus,
nama_user	
)
Values
( OLD.id_beli,
OLD.kode_beli,
OLD.kode_barang,
OLD.jml_beli,
SYSDATE(),
CURRENT_USER	
);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli_uas`
--

CREATE TABLE `detail_beli_uas` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` char(5) DEFAULT NULL,
  `id_barang` char(5) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `id_jual` char(10) NOT NULL DEFAULT '',
  `kode_jual` char(15) DEFAULT NULL,
  `kode_barang` char(15) DEFAULT NULL,
  `jml_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`id_jual`, `kode_jual`, `kode_barang`, `jml_jual`) VALUES
('1', 'TRK1', 'LPASX452EE1', 9),
('2', 'TRK1', 'HDDSAM', 5);

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_barang`
--

CREATE TABLE `duplicate_barang` (
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `satuan` char(10) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duplicate_barang`
--

INSERT INTO `duplicate_barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`, `jml_beli`) VALUES
('VGANVIAS256', 'vga', 'pcs', 500000, 600000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `h_beli`
--

CREATE TABLE `h_beli` (
  `kode_beli` char(15) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `kode_supp` char(5) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_beli`
--

INSERT INTO `h_beli` (`kode_beli`, `tgl_beli`, `kode_supp`, `username`) VALUES
('TRM1', '2017-05-14', 'SUPP7', 'tama'),
('TRM2', '2017-05-15', 'SUPP3', 'tama'),
('TRM3', '2017-05-19', 'SUPP4', 'tama'),
('TRM4', '2017-06-02', 'SUPP1', 'tama'),
('TRM5', '2017-12-30', 'SUPP1', 'dios');

-- --------------------------------------------------------

--
-- Table structure for table `h_jual`
--

CREATE TABLE `h_jual` (
  `kode_jual` char(15) NOT NULL,
  `tgl_jual` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_jual`
--

INSERT INTO `h_jual` (`kode_jual`, `tgl_jual`, `username`) VALUES
('TRK1', '2017-05-15', 'tama');

-- --------------------------------------------------------

--
-- Table structure for table `record_tr_detail_beli`
--

CREATE TABLE `record_tr_detail_beli` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` char(15) DEFAULT NULL,
  `kode_barang` char(15) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `tgl_hapus` datetime DEFAULT NULL,
  `nama_user` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_tr_detail_beli`
--

INSERT INTO `record_tr_detail_beli` (`id_beli`, `kode_beli`, `kode_barang`, `jml_beli`, `tgl_hapus`, `nama_user`) VALUES
(4, 'TRM3', 'HDDSAM', 12, '2017-06-02 22:06:08', 'root@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supp` char(5) NOT NULL,
  `nama_supp` varchar(50) DEFAULT NULL,
  `alamat_supp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supp`, `nama_supp`, `alamat_supp`) VALUES
('sopp', 'mark', 'salam'),
('SUPP0', 'Pt_mayora_tbk', 'jakarta selatan'),
('SUPP1', 'pt_corsair_jakarta', 'jakarta selatan'),
('SUPP2', 'Pt_philips_tbk', 'cikarang jawa barat'),
('SUPP3', 'Pt_samsung', 'Jakarta Utara'),
('SUPP4', 'Pt_ervo_tech', 'semarang jawa tengah'),
('SUPP5', 'Pt_Western_digital', 'Malaysia'),
('SUPP6', 'alcanet_computer', 'yogyakarta'),
('SUPP7', 'pt_asus_tbk', 'karawang'),
('SUPP8', 'wwdwd', 'wwwd');

-- --------------------------------------------------------

--
-- Table structure for table `temporari`
--

CREATE TABLE `temporari` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` char(15) DEFAULT NULL,
  `kode_brg` char(15) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temporari_copy`
--

CREATE TABLE `temporari_copy` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` char(15) DEFAULT NULL,
  `kode_brg` char(15) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli_uas`
--

CREATE TABLE `transaksi_beli_uas` (
  `kode_beli` char(5) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_uas`
--
ALTER TABLE `barang_uas`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_beli` (`kode_beli`);

--
-- Indexes for table `detail_beli_uas`
--
ALTER TABLE `detail_beli_uas`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `kode_beli` (`kode_beli`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_jual` (`kode_jual`);

--
-- Indexes for table `duplicate_barang`
--
ALTER TABLE `duplicate_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `h_beli`
--
ALTER TABLE `h_beli`
  ADD PRIMARY KEY (`kode_beli`),
  ADD KEY `kode_supp` (`kode_supp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `h_jual`
--
ALTER TABLE `h_jual`
  ADD PRIMARY KEY (`kode_jual`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `record_tr_detail_beli`
--
ALTER TABLE `record_tr_detail_beli`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_beli` (`kode_beli`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supp`);

--
-- Indexes for table `temporari`
--
ALTER TABLE `temporari`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `temporari_copy`
--
ALTER TABLE `temporari_copy`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `transaksi_beli_uas`
--
ALTER TABLE `transaksi_beli_uas`
  ADD PRIMARY KEY (`kode_beli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_beli_uas`
--
ALTER TABLE `detail_beli_uas`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `record_tr_detail_beli`
--
ALTER TABLE `record_tr_detail_beli`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temporari`
--
ALTER TABLE `temporari`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temporari_copy`
--
ALTER TABLE `temporari_copy`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD CONSTRAINT `detail_beli_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_beli_ibfk_3` FOREIGN KEY (`kode_beli`) REFERENCES `h_beli` (`kode_beli`);

--
-- Constraints for table `detail_beli_uas`
--
ALTER TABLE `detail_beli_uas`
  ADD CONSTRAINT `detail_beli_uas_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang_uas` (`id_barang`),
  ADD CONSTRAINT `detail_beli_uas_ibfk_2` FOREIGN KEY (`kode_beli`) REFERENCES `transaksi_beli_uas` (`kode_beli`);

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`kode_jual`) REFERENCES `h_jual` (`kode_jual`);

--
-- Constraints for table `h_beli`
--
ALTER TABLE `h_beli`
  ADD CONSTRAINT `h_beli_ibfk_1` FOREIGN KEY (`kode_supp`) REFERENCES `supplier` (`kode_supp`),
  ADD CONSTRAINT `h_beli_ibfk_2` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

--
-- Constraints for table `h_jual`
--
ALTER TABLE `h_jual`
  ADD CONSTRAINT `h_jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
