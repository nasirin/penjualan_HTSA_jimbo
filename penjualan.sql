-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 10:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_depart` int(11) UNSIGNED NOT NULL,
  `nama_department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_depart`, `nama_department`) VALUES
(1, 'ubah Department 1'),
(2, 'Ubah Department 2'),
(4, 'Ubah lagi Department 3'),
(9, 'ubah department 4'),
(10, 'department 5');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_ker` int(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `id_promo` varchar(20) DEFAULT NULL,
  `qty` int(15) NOT NULL,
  `subtotal_keranjang` int(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_ker`, `id_pelanggan`, `id_produk`, `id_promo`, `qty`, `subtotal_keranjang`, `created_at`, `updated_at`) VALUES
(37, 'PEL-0820-001', 'PRO-0720-001', '', 1, 20000, '2020-08-09', '2020-08-09'),
(38, 'PEL-0820-001', 'PRO-0720-002', 'PROM-0820-002', 1, 16200, '2020-08-09', '2020-08-09'),
(39, 'PEL-0820-002', 'PRO-0820-003', 'PROM-0820-001', 1, 324720, '2020-08-09', '2020-08-10'),
(40, 'PEL-0820-002', 'PRO-0820-004', '', 1, 123123, '2020-08-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-07-26-045525', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1595745863, 1),
(2, '2020-07-26-064529', 'App\\Database\\Migrations\\Department', 'default', 'App', 1595746120, 2),
(3, '2020-07-31-064947', 'App\\Database\\Migrations\\Pesanan', 'default', 'App', 1596178919, 3),
(4, '2020-07-31-070944', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1596179702, 4),
(5, '2020-08-02-071643', 'App\\Database\\Migrations\\Keranjang', 'default', 'App', 1596352843, 5),
(6, '2020-08-02-080309', 'App\\Database\\Migrations\\Detail', 'default', 'App', 1596355623, 6),
(7, '2020-08-02-093740', 'App\\Database\\Migrations\\User', 'default', 'App', 1596361313, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `notelp` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama`, `email`, `password`, `notelp`, `alamat`, `created_at`, `updated_at`) VALUES
('PEL-0820-001', 'pelanggan 1', 'pelanggan1@gmail.com', 'a7e641687aff292a9b49a5c37d1da51c', 123, 'alamat 1', '2020-08-02 14:25:15', NULL),
('PEL-0820-002', 'pelanggan 2', 'pelanggan2@gmail.com', 'db9d905c0d8e7f7f608236efda940cd6', 123, 'alamat pelanggan 2', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pes` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) DEFAULT NULL,
  `total_pesanan` int(15) NOT NULL,
  `status_pesanan` varchar(15) DEFAULT NULL,
  `img_pesanan` varchar(100) DEFAULT NULL,
  `keterangan_pesanan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pes`, `id_pelanggan`, `total_pesanan`, `status_pesanan`, `img_pesanan`, `keterangan_pesanan`, `created_at`, `updated_at`) VALUES
('INV0820201', 'PEL-0820-001', 1000000, 'pending', NULL, '', '2020-08-02 14:24:38', NULL),
('INV0820202', 'PEL-0820-002', 2000000, 'pending', NULL, NULL, '2020-08-05 22:30:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_det` int(11) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `qty_pesanan` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_det`, `id_pesanan`, `id_pelanggan`, `id_produk`, `qty_pesanan`, `created_at`) VALUES
(1, 'INV0820201', 'PEL-0820-001', 'PRO-0820-003', 10, '2020-08-05 17:31:29'),
(2, 'INV0820201', 'PEL-0820-001', 'PRO-0720-002', 3, '2020-08-05 17:31:29'),
(3, 'INV0820202', 'PEL-0820-002', 'PRO-0720-001', 2, '2020-08-05 22:31:42'),
(4, 'INV0820202', 'PEL-0820-002', 'PRO-0720-002', 3, '2020-08-05 22:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_prod` varchar(15) NOT NULL,
  `id_department` int(15) UNSIGNED NOT NULL,
  `id_promo` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `varian_produk` varchar(30) NOT NULL,
  `image_produk` varchar(100) DEFAULT NULL,
  `qty_produk` int(15) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `ukuran_produk` int(10) NOT NULL,
  `slug_produk` varchar(50) NOT NULL,
  `keterangan_produk` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_prod`, `id_department`, `id_promo`, `nama_produk`, `varian_produk`, `image_produk`, `qty_produk`, `harga_produk`, `ukuran_produk`, `slug_produk`, `keterangan_produk`, `created_at`, `updated_at`) VALUES
('PRO-0720-001', 1, NULL, 'produk 1', 'varian 1', '1596175803_835404d33f98b40d5268.jpeg', 123, 10000, 123, 'produk-1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-07-31 13:09:48', NULL),
('PRO-0720-002', 1, 'PROM-0820-002', 'produk 2', 'varian 2', '1596175933_6e1d1fdf325b3178e225.jpg', 321, 9000, 321, 'produk-2', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-07-31 13:12:01', NULL),
('PRO-0820-003', 1, 'PROM-0820-001', 'produk 3', 'varian 3', '1596621840_9459d11ddd0f0c79b0ba.jpg', 123, 123000, 123, 'produk-3', '       keterangan 3', '2020-08-05 17:04:00', NULL),
('PRO-0820-004', 10, '', 'produk 4', 'varian 4', '1596963162_f9057d7ad8c88a7fbb3a.jpg', 123, 123123, 321, 'produk-4', ' keterangan 4', '2020-08-09 15:52:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` varchar(15) NOT NULL,
  `nama_promo` varchar(20) NOT NULL,
  `potongan` int(11) NOT NULL,
  `status_promo` enum('aktif','non aktif') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `potongan`, `status_promo`, `created_at`, `updated_at`) VALUES
('PROM-0820-001', 'promo 1', 12, 'aktif', '0000-00-00', NULL),
('PROM-0820-002', 'promo 2', 10, 'aktif', '0000-00-00', NULL),
('PROM-0820-003', 'promo 3', 20, 'non aktif', '0000-00-00', '2020-08-05'),
('PROM-0820-004', 'promo 4', 10, 'aktif', '0000-00-00', '2020-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `notelp_user` int(16) NOT NULL,
  `alamat_user` text NOT NULL,
  `created-at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `level_user`, `nama_user`, `email_user`, `password_user`, `notelp_user`, `alamat_user`, `created-at`) VALUES
('USER-01', 'admin', 'admin', 'admin@gmail.com', 'admin', 123, 'admin', '2020-08-02 17:33:02'),
('USER-02', 'non admin', 'pelanggan', 'pelanggan@gmail.com', 'pelanggan', 123, 'pelanggan', '2020-08-03 23:02:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_depart`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_ker`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pes`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_det`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_depart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_ker` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
