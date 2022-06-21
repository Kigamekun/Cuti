-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2022 at 02:54 PM
-- Server version: 8.0.27-0ubuntu0.21.04.1
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int NOT NULL,
  `kd_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(30) NOT NULL,
  `geojson_kecamatan` varchar(30) NOT NULL,
  `warna_kecamatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `geojson_kecamatan`, `warna_kecamatan`) VALUES
(35, '64.31.07', 'Mulyaharja', 'Mulyaharja1.geojson', '#00d5ff'),
(36, '67.86.12', 'Sukaharja', 'Sukaharja1.geojson', '#ff0000'),
(37, '32.452', 'Cikaret', 'Cikaret1.geojson', '#00ff04'),
(38, '98.21.23', 'Empang', 'Empang1.geojson', '#5a3030'),
(39, '7.7.23', 'Gudang', 'Gudang1.geojson', '#dae2bb'),
(40, '9.85.12', 'Kotabatu', 'Kotabatu1.geojson', '#4c00ff'),
(42, '', 'Luwiliyang', '', '#000000'),
(44, 'tesreksate', 'sekola1', '', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(150) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`, `level`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `t_hotspot`
--

CREATE TABLE `t_hotspot` (
  `id_hotspot` int NOT NULL,
  `id_kecamatan` int NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `tanggal` date NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hotspot`
--

INSERT INTO `t_hotspot` (`id_hotspot`, `id_kecamatan`, `lokasi`, `keterangan`, `lat`, `lng`, `tanggal`, `marker`) VALUES
(1, 18, 'Jl. Peganggas gas amat', 'Kebakaran Parah sekali, tes', -3.641010, 114.775002, '2019-12-19', ''),
(2, 6, 'Jl. Pegangga', 'Kebakaran Parah sekali', -3.656000, 114.775002, '2019-12-19', ''),
(3, 18, 'Jl. Raya', 'Rusak parah', -3.816298, 114.797401, '2019-12-20', ''),
(4, 18, 'Jl A', 'Rusak parah', -3.817160, 114.800987, '2019-12-20', ''),
(5, 19, 'Jl. Sepeda', '-', -3.641010, 114.675003, '2020-01-20', ''),
(6, 6, 'Rumah Saiful', '-', -3.661010, 114.775002, '2020-01-20', ''),
(7, 21, 'Rmah Jakaria', '-', -3.846298, 114.897400, '2020-01-20', ''),
(8, 22, 'HUtan Rawa Merawa', '-', -3.761010, 114.857399, '2020-01-20', ''),
(9, 18, 'Gang Jambu', 'Rumah Terbakar', -3.817130, 114.801888, '2020-02-11', ''),
(10, 6, 'Gedung Pencakar', 'Lantai 4 terbakars', -3.655300, 114.696503, '2020-02-11', ''),
(11, 6, 'Pasar Kaki Lima', '4 Loket terbakar', -3.655300, 114.686501, '2020-02-11', ''),
(12, 6, 'Jl. Peganggas gas amat', 'tes', -3.655300, 114.775246, '2020-02-24', ''),
(13, 6, 'Jalan baru', 'tes', -3.776559, 114.777824, '2020-03-21', ''),
(14, 18, 'RW. 07, Kel. Angsau, Angsau, South Kalimantan, 708', 'dfdf', -3.802937, 114.775772, '2020-04-03', ''),
(15, 18, 'Mushola Nurul Ibadah, Jalan Samudera, RT 10 Desa P', 'tes', -3.803622, 114.762718, '2020-04-03', ''),
(16, 6, 'RT 07, KEL. SARANG HALANG, Sarang Halang, South Ka', 'dfdf', -3.814585, 114.781960, '2020-04-03', ''),
(17, 6, 'Matah, RT 27 Desa Pelaihari, Karang Taruna, South', 'tes', -3.802595, 114.758598, '2020-04-03', ''),
(18, 0, 'Jalan Trans Kalimantan, RT 04, KEL. SARANG HALANG,', 'orangnya ilang', -3.850579, 114.794571, '2022-05-15', ''),
(19, 0, 'Jalan Tol Lingkar Luar Bogor, Tanah Baru, Cibuluh,', '', -6.568309, 106.815895, '2022-05-15', ''),
(20, 36, 'Sukaharja, West Java, 16610, Indonesia', 'Kerang', -6.626847, 106.742851, '2022-05-16', '912001201139572.png'),
(21, 0, 'Musholla Nurul Huda, Jalan Cimanggu Brata, Kedungb', '', -6.564664, 106.800140, '2022-05-25', ''),
(22, 44, 'Jalan Raya Soleh Iskandar, Curug Mekar, West Java,', 'sekolahnya hilang ditelan bumi', -6.555440, 106.777924, '2022-05-25', 'marker.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  ADD PRIMARY KEY (`id_hotspot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  MODIFY `id_hotspot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
