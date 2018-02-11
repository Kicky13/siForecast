-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 11:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipurnamajati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `harga_barang` double NOT NULL,
  `waktu_pengiriman` int(3) NOT NULL,
  `id_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_supplier`, `harga_barang`, `waktu_pengiriman`, `id_status`) VALUES
(1, 'Terasi AR Sedang (2oog)', 1, 19000, 1, 1),
(2, 'Abon Tuna', 2, 17000, 2, 1),
(3, 'Ayas', 2, 6000, 1, 1),
(4, 'Balado Ikan', 3, 25000, 2, 1),
(5, 'Pie Crispy Berkah', 4, 17000, 2, 1),
(6, 'Teri Chrispy Kecil Bunda Noeng', 5, 16000, 2, 1),
(7, 'Coklat Jember', 7, 13500, 2, 1),
(8, 'Bagiak Elza Putra', 8, 12500, 1, 1),
(9, 'Keripik Nangka - Firda', 9, 12500, 1, 1),
(10, 'Coklat Fondre Batang', 10, 7000, 2, 1),
(11, 'Makaroni Spat ', 11, 8000, 1, 1),
(12, 'Suwar Suwir 96 Kcl', 11, 12000, 1, 1),
(13, 'Mataari ', 11, 8000, 1, 1),
(14, 'Bola-bola Coklat', 11, 8000, 1, 1),
(15, 'Kopi D''lanang Robusta', 12, 18500, 1, 1),
(16, 'Bagiak Karunia', 13, 12000, 2, 1),
(17, 'Kue Matahari Edamame', 14, 16000, 2, 1),
(18, 'Keripik Ceker', 14, 20000, 2, 1),
(19, 'Krpk. Bayam Yovie ', 14, 10000, 2, 1),
(20, 'Dodol Klobot', 15, 12000, 3, 1),
(21, 'Kerupuk Kuku Macan Kecil', 16, 11000, 1, 1),
(22, 'Edamame Frozen - Ecer', 17, 10000, 2, 1),
(23, 'Edamame Box', 17, 60000, 2, 1),
(24, 'Edamame Kering Besar', 17, 25000, 2, 1),
(25, 'Edamame Kering Kecil', 17, 14000, 2, 1),
(26, 'Cerutu Airlangga Cigarillos', 18, 26500, 1, 1),
(27, 'Cerutu Brawijaya Cigarillos', 18, 23500, 1, 1),
(28, 'Marica Plastik', 19, 15000, 1, 1),
(29, 'Marning  Jen Kecil', 20, 4000, 2, 1),
(30, 'Suwar Suwir Asyik', 22, 15000, 1, 1),
(31, 'Suwar-Suwir 1/2 Kg', 22, 8000, 1, 1),
(32, 'Cireng', 23, 8000, 1, 1),
(33, 'Suwar-Suwir 1 Kg', 23, 14000, 1, 1),
(34, 'Tahu Dinamit', 23, 22000, 1, 1),
(35, 'Per M. Kayu Putih Kecil', 23, 8500, 1, 1),
(36, 'Tahu Dinamit Ayam', 23, 18000, 1, 1),
(37, 'Per M. Kayu Putih Besar', 23, 10000, 1, 1),
(38, 'Rambak Kakap ', 23, 13500, 1, 1),
(39, 'Madu Mongso', 23, 13000, 1, 1),
(40, 'Keripik Singkong Lumba-Lumba', 23, 16000, 1, 1),
(41, 'Stik Keju Mitra', 23, 10000, 1, 1),
(42, 'Krpk Singkong Putih ', 24, 5000, 2, 1),
(43, 'Makaroni Rujak ', 24, 5000, 2, 1),
(44, 'Stick Jagung ', 24, 6500, 2, 1),
(45, 'Keripik Sale Pisang ', 26, 17000, 2, 1),
(46, 'Keripik Siput ', 27, 4000, 1, 1),
(47, 'Kacang Bali', 28, 15000, 1, 1),
(48, 'Krpk Singkong Putih - Sinar Du', 29, 8000, 1, 1),
(49, 'Edamame Goreng  (100gr)', 30, 22000, 2, 1),
(50, 'Keripik Usus', 31, 15500, 2, 1),
(51, 'Keripik Tempe ', 31, 9000, 2, 1),
(52, 'Keripik Gadung ', 31, 8000, 2, 1),
(53, 'Rengginang ', 31, 8000, 2, 1),
(54, 'aa', 12, 12000, 2, 2),
(55, 'roti a', 1, 1200, 1, 1),
(56, 'Roti a', 4, 1300, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barangmasukdetail`
--

CREATE TABLE `tb_barangmasukdetail` (
  `id_barangmasuk` int(100) NOT NULL,
  `tgl_barangmasuk` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `batas_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barangmasukdetail`
--

INSERT INTO `tb_barangmasukdetail` (`id_barangmasuk`, `tgl_barangmasuk`, `id_user`, `id_barang`, `jumlah`, `tgl_kadaluarsa`, `batas_pengembalian`) VALUES
(1, '2017-05-03', 2, 2, 20, '2017-06-30', '2017-06-30'),
(3, '2017-05-03', 2, 3, 30, '2017-06-30', '2017-06-30'),
(13, '2017-05-11', 2, 2, 18, '2017-05-27', '2017-05-31'),
(14, '2017-05-11', 2, 5, 12, '2017-05-27', '2017-05-31'),
(15, '2017-05-11', 2, 22, 13, '2017-05-27', '2017-05-30'),
(16, '2017-05-11', 2, 2, 65, '2017-05-27', '2017-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilramal`
--

CREATE TABLE `tb_hasilramal` (
  `id_ramal` int(10) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `tgl_ramal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nilai_aktual` double NOT NULL,
  `nilai_ramal` double NOT NULL,
  `nilai_mape` double NOT NULL,
  `nama_metode` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasilramal`
--

INSERT INTO `tb_hasilramal` (`id_ramal`, `id_barang`, `tgl_ramal`, `nilai_aktual`, `nilai_ramal`, `nilai_mape`, `nama_metode`) VALUES
(1, 2, '2016-05-27 17:00:00', 43, 66, 0, 'Single Exponential Smoothing'),
(2, 2, '2016-06-27 17:00:00', 46, 76, 0, 'Single Exponential Smoothing'),
(3, 2, '2016-07-27 17:00:00', 48, 45, 0, 'Single Exponential Smoothing'),
(4, 2, '2016-08-27 17:00:00', 47, 48, 0, 'Single Exponential Smoothing'),
(5, 2, '2016-09-27 17:00:00', 46, 0, 0, 'Single Exponential Smoothing'),
(6, 2, '2016-10-27 17:00:00', 46, 0, 0, 'Single Exponential Smoothing'),
(7, 2, '2016-11-27 17:00:00', 49, 0, 0, 'Single Exponential Smoothing'),
(8, 2, '2016-12-27 17:00:00', 51, 0, 65, 'Single Exponential Smoothing'),
(9, 2, '2017-01-27 17:00:00', 52, 0, 48, 'Single Exponential Smoothing'),
(10, 2, '2017-02-27 17:00:00', 55, 0, 0, 'Single Exponential Smoothing'),
(11, 2, '2017-03-27 17:00:00', 51, 0, 55, 'Single Exponential Smoothing'),
(13, 22, '2016-05-27 17:00:00', 94, 0, 0, 'Single Exponential Smoothing'),
(14, 22, '2016-06-27 17:00:00', 101, 0, 0, 'Single Exponential Smoothing'),
(15, 22, '2016-07-27 17:00:00', 99, 0, 0, 'Single Exponential Smoothing'),
(16, 22, '2016-08-27 17:00:00', 105, 0, 0, 'Single Exponential Smoothing'),
(17, 22, '2016-09-27 17:00:00', 107, 0, 0, 'Single Exponential Smoothing'),
(18, 22, '2016-10-27 17:00:00', 111, 0, 0, 'Single Exponential Smoothing'),
(19, 22, '2016-11-27 17:00:00', 110, 0, 0, 'Single Exponential Smoothing'),
(20, 22, '2016-12-27 17:00:00', 112, 0, 0, 'Single Exponential Smoothing'),
(21, 22, '2017-01-27 17:00:00', 118, 0, 0, 'Single Exponential Smoothing'),
(22, 22, '2017-02-27 17:00:00', 121, 0, 0, 'Single Exponential Smoothing'),
(23, 22, '2017-03-27 17:00:00', 123, 0, 0, 'Single Exponential Smoothing'),
(24, 33, '2016-05-27 17:00:00', 121, 0, 0, 'Single Exponential Smoothing'),
(25, 33, '2016-06-27 17:00:00', 160, 0, 0, 'Single Exponential Smoothing'),
(26, 33, '2016-07-27 17:00:00', 148, 0, 0, 'Single Exponential Smoothing'),
(27, 33, '2016-08-27 17:00:00', 120, 0, 0, 'Single Exponential Smoothing'),
(28, 33, '2016-09-27 17:00:00', 152, 0, 0, 'Single Exponential Smoothing'),
(29, 33, '2016-10-27 17:00:00', 168, 0, 0, 'Single Exponential Smoothing'),
(30, 33, '2016-11-27 17:00:00', 134, 0, 0, 'Single Exponential Smoothing'),
(31, 33, '2016-12-27 17:00:00', 152, 0, 0, 'Single Exponential Smoothing'),
(32, 33, '2017-01-27 17:00:00', 166, 0, 0, 'Single Exponential Smoothing'),
(33, 33, '2017-02-27 17:00:00', 190, 0, 0, 'Single Exponential Smoothing'),
(34, 33, '2017-03-27 17:00:00', 145, 0, 0, 'Single Exponential Smoothing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(3) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL,
  `notif` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notif`
--

INSERT INTO `tb_notif` (`id_notif`, `notif`) VALUES
(3, 'roti a , jumlah = 40 harus dikembalikan pada tanggal 2017-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembaliandetail`
--

CREATE TABLE `tb_pengembaliandetail` (
  `id_pengembalian` int(10) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengembaliandetail`
--

INSERT INTO `tb_pengembaliandetail` (`id_pengembalian`, `tgl_pengembalian`, `id_user`, `id_barang`, `jumlah`, `tgl_kadaluarsa`) VALUES
(1, '2017-06-06', 2, 2, 4, '2017-06-30'),
(2, '2017-05-03', 2, 5, 2, '2017-05-31'),
(3, '2017-05-03', 2, 3, 11, '2017-06-30'),
(4, '2017-05-05', 2, 4, 4, '2017-05-27'),
(5, '2017-05-11', 2, 2, 4, '2017-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualandetail`
--

CREATE TABLE `tb_penjualandetail` (
  `id_penjualan` int(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualandetail`
--

INSERT INTO `tb_penjualandetail` (`id_penjualan`, `tgl_penjualan`, `id_user`, `id_barang`, `jumlah`, `tgl_kadaluarsa`) VALUES
(39, '2017-05-11', 2, 2, 48, '2017-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ramalan_double`
--

CREATE TABLE `tb_ramalan_double` (
  `id_ramalan` int(10) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `tgl_ramal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ramal2` double NOT NULL,
  `nilai_ramal` double NOT NULL,
  `nilai_mape` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ramalan_double`
--

INSERT INTO `tb_ramalan_double` (`id_ramalan`, `id_barang`, `tgl_ramal`, `ramal2`, `nilai_ramal`, `nilai_mape`) VALUES
(1, 2, '2016-05-27 17:00:00', 43, 43, 0),
(2, 2, '2016-06-27 17:00:00', 43.48, 45.4, 6.52173913),
(3, 2, '2016-07-27 17:00:00', 44.376, 47.96, 5.416666667),
(4, 2, '2016-08-27 17:00:00', 45.1184, 48.088, 2.042553191),
(5, 2, '2016-09-27 17:00:00', 45.52672, 47.16, 4.539130435),
(6, 2, '2016-10-27 17:00:00', 45.74944, 46.64032, 2.52173913),
(7, 2, '2016-11-27 17:00:00', 46.3497088, 48.750784, 4.815673469),
(8, 2, '2016-12-27 17:00:00', 47.30985216, 51.1504256, 4.410227451),
(9, 2, '2017-01-27 17:00:00', 48.40592742, 52.79022848, 1.633796923),
(10, 2, '2017-02-27 17:00:00', 49.85556613, 55.65412096, 4.0177664),
(11, 2, '2017-03-27 17:00:00', 50.56054548, 53.3804629, 9.125727373),
(13, 22, '2016-05-27 17:00:00', 94, 94, 0),
(14, 22, '2016-06-27 17:00:00', 95.12, 99.6, 6.930693069),
(15, 22, '2016-07-27 17:00:00', 96.144, 100.24, 0.606060606),
(16, 22, '2016-08-27 17:00:00', 97.9296, 105.072, 4.533333333),
(17, 22, '2016-09-27 17:00:00', 100.02368, 108.4, 1.801869159),
(18, 22, '2016-10-27 17:00:00', 102.53376, 112.57408, 2.342342342),
(19, 22, '2016-11-27 17:00:00', 104.6319872, 113.024896, 2.340072727),
(20, 22, '2016-12-27 17:00:00', 106.566231, 114.3032064, 0.915085714),
(21, 22, '2017-01-27 17:00:00', 109.0919619, 119.1948851, 3.132875932),
(22, 22, '2017-02-27 17:00:00', 111.9065111, 123.1647078, 1.491830479),
(23, 22, '2017-03-27 17:00:00', 114.694707, 125.8474908, 0.133908813),
(24, 33, '2016-05-27 17:00:00', 121, 121, 0),
(25, 33, '2016-06-27 17:00:00', 127.24, 152.2, 24.375),
(26, 33, '2016-07-27 17:00:00', 132.808, 155.08, 2.837837838),
(27, 33, '2016-08-27 17:00:00', 132.7632, 132.584, 29.23333333),
(28, 33, '2016-09-27 17:00:00', 135.82496, 148.072, 12.77368421),
(29, 33, '2016-10-27 17:00:00', 142.0752, 167.07616, 11.86190476),
(30, 33, '2016-11-27 17:00:00', 143.0332544, 146.865472, 24.68370149),
(31, 33, '2016-12-27 17:00:00', 144.8128333, 151.9311488, 3.377978947),
(32, 33, '2017-01-27 17:00:00', 148.8434284, 164.9658086, 8.475211566),
(33, 33, '2017-02-27 17:00:00', 156.879494, 189.0237568, 13.17589019),
(34, 33, '2017-03-27 17:00:00', 157.8717586, 161.840817, 30.36121159),
(42, 2, '2017-05-11 03:00:31', 50.5646507728, 50.581071944, 8.9397202040816);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ramalan_single`
--

CREATE TABLE `tb_ramalan_single` (
  `id_ramalan` int(20) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `tgl_ramal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nilai_ramalan` double NOT NULL,
  `nilai_mape` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ramalan_single`
--

INSERT INTO `tb_ramalan_single` (`id_ramalan`, `id_barang`, `tgl_ramal`, `nilai_ramalan`, `nilai_mape`) VALUES
(1, 2, '2016-05-27 17:00:00', 43, 0),
(2, 2, '2016-06-27 17:00:00', 44.2, 6.52173913),
(3, 2, '2016-07-27 17:00:00', 45.72, 7.916666667),
(4, 2, '2016-08-27 17:00:00', 46.232, 2.723404255),
(5, 2, '2016-09-27 17:00:00', 46.1392, 0.504347826),
(6, 2, '2016-10-27 17:00:00', 46.08352, 0.302608696),
(7, 2, '2016-11-27 17:00:00', 47.250112, 5.952),
(8, 2, '2016-12-27 17:00:00', 48.7500672, 7.352721569),
(9, 2, '2017-01-27 17:00:00', 50.05004032, 6.249870769),
(10, 2, '2017-02-27 17:00:00', 52.03002419, 8.999926691),
(11, 2, '2017-03-27 17:00:00', 51.61801452, 2.019655278),
(13, 22, '2016-05-27 17:00:00', 95.2, 2.127659574),
(14, 22, '2016-06-27 17:00:00', 97.52, 5.742574257),
(15, 22, '2016-07-27 17:00:00', 98.112, 1.494949495),
(16, 22, '2016-08-27 17:00:00', 100.8672, 6.56),
(17, 22, '2016-09-27 17:00:00', 103.32032, 5.731588785),
(18, 22, '2016-10-27 17:00:00', 106.392192, 6.918630631),
(19, 22, '2016-11-27 17:00:00', 107.8353152, 3.279825455),
(20, 22, '2016-12-27 17:00:00', 109.5011891, 3.718468571),
(21, 22, '2017-01-27 17:00:00', 112.9007135, 7.202382102),
(22, 22, '2017-02-27 17:00:00', 116.1404281, 6.69362523),
(23, 22, '2017-03-27 17:00:00', 118.8842568, 5.576887737),
(24, 33, '2016-05-27 17:00:00', 121, 0),
(25, 33, '2016-06-27 17:00:00', 136.6, 24.375),
(26, 33, '2016-07-27 17:00:00', 141.16, 7.702702703),
(27, 33, '2016-08-27 17:00:00', 132.696, 17.63333333),
(28, 33, '2016-09-27 17:00:00', 140.4176, 12.7),
(29, 33, '2016-10-27 17:00:00', 151.45056, 16.41809524),
(30, 33, '2016-11-27 17:00:00', 144.470336, 13.02280597),
(31, 33, '2016-12-27 17:00:00', 147.4822016, 4.953726316),
(32, 33, '2017-01-27 17:00:00', 154.889321, 11.15530024),
(33, 33, '2017-02-27 17:00:00', 168.9335926, 18.47930476),
(34, 33, '2017-03-27 17:00:00', 159.3601555, 16.50592591);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ramal_triple`
--

CREATE TABLE `tb_ramal_triple` (
  `id_ramalan` int(10) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `tgl_ramal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ramal3` double NOT NULL,
  `nilai_ramalan` double NOT NULL,
  `nilai_mape` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ramal_triple`
--

INSERT INTO `tb_ramal_triple` (`id_ramalan`, `id_barang`, `tgl_ramal`, `ramal3`, `nilai_ramalan`, `nilai_mape`) VALUES
(1, 2, '2016-05-27 17:00:00', 43, 43.01162791, 0.027041644),
(2, 2, '2016-06-27 17:00:00', 43.192, 45.61988723, 6.496461072),
(3, 2, '2016-07-27 17:00:00', 43.6656, 47.88297405, 4.958568264),
(4, 2, '2016-08-27 17:00:00', 44.24672, 48.05706525, 1.878668186),
(5, 2, '2016-09-27 17:00:00', 44.75872, 45.89246053, 4.471880976),
(6, 2, '2016-10-27 17:00:00', 45.155008, 45.74142265, 0.233781462),
(7, 2, '2016-11-27 17:00:00', 45.63288832, 48.9494889, 6.650157865),
(8, 2, '2016-12-27 17:00:00', 46.30367386, 50.8898503, 4.020609996),
(9, 2, '2017-01-27 17:00:00', 47.14457528, 52.37648668, 2.13490326),
(10, 2, '2017-02-27 17:00:00', 48.22897162, 54.96389365, 4.770024216),
(11, 2, '2017-03-27 17:00:00', 49.16160117, 52.01823646, 7.772340495),
(13, 22, '2016-05-27 17:00:00', 94, 94.00531915, 0.005658669),
(14, 22, '2016-06-27 17:00:00', 94.448, 99.60309082, 6.925426585),
(15, 22, '2016-07-27 17:00:00', 95.1264, 99.95364637, 0.609182647),
(16, 22, '2016-08-27 17:00:00', 96.24768, 104.3990084, 4.806051073),
(17, 22, '2016-09-27 17:00:00', 97.75808, 107.3128556, 2.430833287),
(18, 22, '2016-10-27 17:00:00', 99.668352, 111.0915525, 3.321751698),
(19, 22, '2016-11-27 17:00:00', 101.6538061, 111.7570912, 0.992320478),
(20, 22, '2016-12-27 17:00:00', 103.6187761, 109.9164892, 0.216882838),
(21, 22, '2017-01-27 17:00:00', 105.8080504, 117.3981537, 6.850432866),
(22, 22, '2017-02-27 17:00:00', 108.2474346, 121.1143684, 2.976732449),
(23, 22, '2017-03-27 17:00:00', 110.8263436, 123.7311211, 1.533033851),
(24, 33, '2016-05-27 17:00:00', 121, 121.0041322, 0.003415067),
(25, 33, '2016-06-27 17:00:00', 123.496, 151.5987208, 24.37241736),
(26, 33, '2016-07-27 17:00:00', 127.2208, 152.3200484, 2.431568112),
(27, 33, '2016-08-27 17:00:00', 129.43776, 129.2075511, 26.93337366),
(28, 33, '2016-09-27 17:00:00', 131.99264, 145.9200314, 14.99503214),
(29, 33, '2016-10-27 17:00:00', 136.025664, 164.187975, 13.14283848),
(30, 33, '2016-11-27 17:00:00', 138.8287002, 143.1034473, 22.52833955),
(31, 33, '2016-12-27 17:00:00', 141.2223534, 149.1132036, 5.852995228),
(32, 33, '2017-01-27 17:00:00', 144.2707834, 162.486837, 10.17276894),
(33, 33, '2017-02-27 17:00:00', 149.3142676, 185.5037822, 14.48061213),
(34, 33, '2017-03-27 17:00:00', 152.737264, 157.1753403, 27.9336429);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tifak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_tlp`) VALUES
(1, 'AR', 'Jember', '085736011234'),
(2, 'Ayas Sutang Food', 'Jember', '081327890412'),
(3, 'Balado Ikan', 'Jember', '087654234567'),
(4, 'Berkah Provita Jaya', 'Bondowoso', '089763237651'),
(5, 'Bunda Noeng', 'Jember', '087645387908'),
(6, 'Cahaya', 'Jember', '085675437890'),
(7, 'Coklat Move on', 'Jember', '0812345678945'),
(8, 'Elza Putra', 'Banyuwangi', '083457897676'),
(9, 'Firda', 'Bondowoso', '089765342399'),
(10, 'Fondre', 'Jember', '089997121123'),
(11, 'Hoby Koe', 'Bondowoso', '082134578889'),
(12, 'Jokam Artha Barokah', 'Jember', '0821555676722'),
(13, 'Karunia', 'Banyuwangi', '082331556232'),
(14, 'Kharisma', 'Jember', '089777321255'),
(15, 'Klobot', 'Lumajang', '085723987014'),
(16, 'Kuku Macan', 'Bondowoso', '083707014777'),
(17, 'Maju Jaya Edamame', 'Jember', '089787666544'),
(18, 'Mangli Djaya Raya', 'Jl. Letjen DI Panjaitan No. 99, Petung, Bangsal Sa', '(0331) ?765345'),
(19, 'Marica', 'Jember', '(0331) 9087345'),
(20, 'Marning Jen', 'Jember', '(0331) 4587789'),
(21, 'Prima Rasa', 'Jl. HOS Cokroaminoto No.61, Jember Kidul, Kaliwate', '(0331) 7838485'),
(22, 'Primadona', 'Jl.Trunojoyo No.139', '087645387908'),
(23, 'Purnamajati', 'Jl. Bungur No.9, Gebang, Patrang, Kabupaten Jember', '(0331) 481255'),
(24, 'Raja Bintang', 'Jember', '089756444566'),
(25, 'Raja Madu', 'Bondowoso', '087457788990'),
(26, 'Samawa', 'Jember', '089665420887'),
(27, 'Sari Arum', 'Jember', '083876445524'),
(28, 'Selera Rasa', 'Jember', '081325345640'),
(29, 'Sinar Dunia', 'Banyuwangi', '08572566809'),
(30, 'SIP', 'Jember', '081327890766'),
(31, 'UD Liberty', 'Bondowoso', '089777321255'),
(32, 'aaa', 'daffgf', '090887');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `id_level` int(3) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `id_level`, `no_ktp`, `alamat`, `tgl_lahir`, `no_telp`, `jabatan`, `username`, `password`, `id_status`) VALUES
(1, 'Sugiarti', 1, 31238909, 'Jl Kalimantan X no 117 a', '1995-12-09', '085732987014', 'Manajer', 'admin1', 'admin1', 1),
(2, 'Anindya Palmitraazzah', 2, 30812221, 'Jl Nias No 1', '1995-03-28', '0876536728', 'Pegawai', 'user1', 'user1', 1),
(3, 'Wenny Hardianti Pratiwi', 2, 34555657, 'Sumbersari', '1995-05-26', '087654786555', 'Pegawai', 'user2', 'user2', 1),
(4, 'Helma Daniar', 2, 345466787, 'Jl Halmahera No 1', '1995-02-06', '085732456897', 'Pegawai', 'user3', 'user3', 1),
(6, 'bv', 2, 123454, 'asdfdg', '2017-04-12', '', '1234', 'zxxfgh', 'asa', 2),
(7, 'pipit', 2, 12345, 'mataram', '0000-00-00', '', 'mahasiswa', 'pipit', '123', 2),
(8, 'gtyghgjh', 2, 2345678, 'sjahjahkj', '2017-04-06', '3454678', 'kjakjk', 'j', 'jhah', 2),
(9, 'Safitri F A', 1, 2147483647, 'Jl Halmahera no 1', '1997-02-09', '0821365766', 'Manajer Pendamping', 'admin2', 'admin2', 1),
(10, 'vvb', 2, 23456, 'fcgvhjm;;''', '2017-04-04', '123456789', 'vbnm,', 'cvbnm', 'cvbnm,', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tb_barangmasukdetail`
--
ALTER TABLE `tb_barangmasukdetail`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_hasilramal`
--
ALTER TABLE `tb_hasilramal`
  ADD PRIMARY KEY (`id_ramal`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_pengembaliandetail`
--
ALTER TABLE `tb_pengembaliandetail`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `jumlah` (`jumlah`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_baarang` (`id_user`);

--
-- Indexes for table `tb_ramalan_double`
--
ALTER TABLE `tb_ramalan_double`
  ADD PRIMARY KEY (`id_ramalan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_ramalan_single`
--
ALTER TABLE `tb_ramalan_single`
  ADD PRIMARY KEY (`id_ramalan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_ramal_triple`
--
ALTER TABLE `tb_ramal_triple`
  ADD PRIMARY KEY (`id_ramalan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tb_barangmasukdetail`
--
ALTER TABLE `tb_barangmasukdetail`
  MODIFY `id_barangmasuk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_hasilramal`
--
ALTER TABLE `tb_hasilramal`
  MODIFY `id_ramal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pengembaliandetail`
--
ALTER TABLE `tb_pengembaliandetail`
  MODIFY `id_pengembalian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_ramalan_double`
--
ALTER TABLE `tb_ramalan_double`
  MODIFY `id_ramalan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_ramalan_single`
--
ALTER TABLE `tb_ramalan_single`
  MODIFY `id_ramalan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_ramal_triple`
--
ALTER TABLE `tb_ramal_triple`
  MODIFY `id_ramalan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`),
  ADD CONSTRAINT `tb_barang_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_barangmasukdetail`
--
ALTER TABLE `tb_barangmasukdetail`
  ADD CONSTRAINT `tb_barangmasukdetail_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_barangmasukdetail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_pengembaliandetail`
--
ALTER TABLE `tb_pengembaliandetail`
  ADD CONSTRAINT `tb_pengembaliandetail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_pengembaliandetail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  ADD CONSTRAINT `tb_penjualandetail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_penjualandetail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_ramalan_double`
--
ALTER TABLE `tb_ramalan_double`
  ADD CONSTRAINT `tb_ramalan_double_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_ramalan_single`
--
ALTER TABLE `tb_ramalan_single`
  ADD CONSTRAINT `tb_ramalan_single_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_ramal_triple`
--
ALTER TABLE `tb_ramal_triple`
  ADD CONSTRAINT `tb_ramal_triple_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
