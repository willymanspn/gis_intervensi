-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 04:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_ikm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ikm`
--

CREATE TABLE `tb_ikm` (
  `id_ikm` int(11) NOT NULL,
  `nm_ikm` varchar(128) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `produk_ikm` varchar(128) NOT NULL,
  `alamat_ikm` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ikm`
--

INSERT INTO `tb_ikm` (`id_ikm`, `nm_ikm`, `id_produk`, `produk_ikm`, `alamat_ikm`, `no_hp`, `id_kelurahan`, `id_kecamatan`, `latitude`, `longitude`, `id_kategori`, `date_created`) VALUES
(1, 'Kelipik Picang Bogor', 0, 'Keripik Pisang', 'Jl. Dekeng RT 3/3', '089503509775', 7, 1, '-6.630328499477545', '106.81898932102864', 1, '2020-01-01'),
(2, 'Aylani Food', 0, 'Kue Kering', 'Pakuan Hill Cluster Livistona B21 Kel. Genteng', '081283534858', 7, 1, '-6.6373265720632855', '106.81940306122719', 1, '2020-01-24'),
(4, 'Dapur Al-Rasyid', 0, 'Coklat', 'Kp. Babakan Baru RT 02 RW 14  No. 143 Kel. Cipaku', '081219563697', 5, 1, '-6.637752957613373', '106.81634546114176', 1, '2020-05-21'),
(5, 'Depfoods', 0, 'Minuman Serbuk Jahe', 'Kp. Pamoyanan RT 03 RW 02 No. 1 Kel. Ranggamekar', '087700507778', 16, 1, '-6.632488371619328', '106.79637921542647', 1, '2020-01-07'),
(6, 'CV. Alya Madina', 0, 'Cireng', 'Jl. Ama Sandi No. 32 RT 04/08 Kel. Mulyaharja', '085691563333', 12, 1, '-6.619806271117915', '106.79449080632958', 1, '2020-01-06'),
(7, 'Pastry Bogor', 0, 'Kue kering', 'Jl. Mesjid II Blkng No. 4 Kel. Empang', '08180814759', 6, 1, '-6.608605337724962', '106.79593921889618', 1, '2020-01-26'),
(8, 'Warung Sari Rosa', 0, 'Kue Biji Ketapang', 'Jl. Lolongok Timur RT 02 RW 05 No. 36 Kel. Empang', '08111103789', 6, 1, '-6.61107775981457', '106.79614837998304', 1, '2020-04-27'),
(9, 'Dapur Kang Nunu', 0, 'Sambal', 'Ciwaringin Kaum Gg. Asem No. 1 Kel. Ciwaringin', '087800180999', 26, 3, '-6.584060441579811', '106.78973261087404', 1, '2020-01-26'),
(10, 'Kue Pia Dua Apel', 0, 'Kue Pia', 'Jl. Abesin No. 14 RT 01 RW 04 Kel. Pabaton', '02518352109', 29, 3, '-6.5857231158331615', '106.79337475917713', 1, '2020-01-26'),
(11, 'Moreenga Pangan Global', 0, 'Premiks Kue Cepat Saji', 'Jl Taman Kencana No 03 Ruang TBI 1 Kel Babakan', '081297219464', 23, 3, '-6.587694715050256', '106.80148062726352', 1, '2020-01-01'),
(12, 'Berkat Bumi Indonesia', 0, 'Rempah - rempah', 'Jl. Sempur Kaler No. 56 Kel. Sempur', '087770259484', 32, 3, '-6.584561285148322', '106.79935097694398', 1, '2020-01-06'),
(13, 'Dapur Dize', 0, 'Manisan Belimbing Wuluh', 'Mantarena Lebak RT 003/002 No. 41 Kel. Panaragan', '083874032885', 31, 3, '-6.596258431232246', '106.78801058540985', 1, '2022-11-09'),
(14, 'Rima Rachmawati', 0, 'Stik Kulit Kebab', 'Jl. Ardio Gg. V  No. 18 RT 4 RW 05 Kel. Cibogor', '082311402028', 25, 3, '-6.587801363627656', '106.79179789999634', 1, '2020-01-08'),
(15, 'Sri Sumarti', 0, 'Kuliner Mie Ayam Ijo', 'Jl. Kebon Jukut RT.03 RW.01 Kel. Babakan Pasar Boteng', '081282070945', 23, 3, '-6.609244764478119', '106.8065875886853', 1, '2020-01-07'),
(16, 'Qircha', 0, 'Keripik Pisang', 'Jl. A. Yani Gg. Karet I RT 04/01 No. 1 Kel. Tanah Sareal', '085774753040', 68, 6, '-6.578528892093953', '106.79983395185401', 1, '2020-02-26'),
(17, 'Sehat Prima Lestari', 0, 'Minuman Sari Kurma', 'Jl. Cilebut Timur Kp. Sugih No. 4 RT 01/02 Kel. Sukaresmi', '02517533569', 67, 6, '-6.554803121519462', '106.80052042007446', 1, '2020-01-22'),
(18, 'Dapur Sundanese Bogor', 0, 'Keripik Jamur         ', 'Jl. Kol. Enjo Martadisastra RT 4/1 No. 13 Kel. Kedung Badak', '087873754450', 61, 6, '-6.564235944365272', '106.80626043404013', 1, '2020-01-28'),
(19, 'Rumah Kue Mpoeq', 0, 'Bolu', 'Taman Cimanggu Utara Blok X6 No. 8 Kel. Kedung Waringin', '085697053439', 63, 6, '-6.562002991933915', '106.77979228122936', 1, '2020-06-09'),
(20, 'Rachyati', 0, 'Ikan balita goreng (baby fish)', 'Jl. Dadali II No. 15 Kel. Tanah Sareal', '0811111911', 56, 6, '-6.568019732216627', '106.80548796572332', 1, '2020-01-14'),
(21, 'Dapur Hijau', 0, 'Minuman Kunyit Asem', 'Komplek Balitro No. 36 RT 03 RW 20 Kel. Menteng', '087877901190', 43, 4, '-6.579583926487083', '106.77918076515199', 1, '2020-06-17'),
(22, 'Madu Hutan Multiflora', 0, 'Madu', 'Komplek Sindangbarang Grande No 32 Kel. Sindangbarang', '085710963838', 48, 4, '-6.579312257367406', '106.76048045511651', 1, '2020-01-26'),
(23, 'DWS 212', 0, 'Pempek Goreng', 'Jl. Palem  Putri II/29 Taman Yasmin sektor V Kel. Curug ', '081295838668', 38, 4, '-6.559866008312129', '106.76858063572797', 1, '2020-02-29'),
(24, 'Morale Cookies', 0, 'Kue Kering', 'Jl. Mekar Saluyu No. 17 Kel. Cilendek Barat', '085694907879', 36, 4, '-6.57008211795342', '106.7689775869033', 1, '2020-06-15'),
(25, 'Wita Raharja', 0, 'Rempah - rempah', 'Jl. Anggrek No. 1 RT 002/004 Kel. Tegal Gundil', '087872542169', 57, 5, '-6.569836998115003', '106.81706964181694', 1, '2020-02-03'),
(26, 'Umiku', 0, 'Asinan Buah', 'Vila Bogor Indah Blok CC3/9 RT 06 RW 13 Kel. Ciparigi', '08161612366', 54, 5, '-6.542087063941129', '106.81160315801472', 1, '2020-06-09'),
(27, 'Rumah Rendang Gepuk', 0, 'Rendang', 'Vila Citra Bantarjati Blok A8 No. 6 kel. Tegal Gundil', '081210616146', 57, 5, '-6.577660159829801', '106.81539058685304', 1, '2020-06-10'),
(28, 'De\'moe Cakes', 0, 'Kue Kering', 'Vila Bogor Indah 3 Blok BA3 No. 22 Kel. Kedunghalang', '087870870017', 55, 5, '-6.541527581821357', '106.81789035443857', 1, '2020-06-09'),
(29, 'Sila Tea House', 0, 'Teh', 'Baranangsiang Indah Jl. Jatiluhur VII Blok G2/26 Kel. Katulampa', '0811112645', 18, 2, '-6.611717349163447', '106.82464957237245', 1, '2020-01-30'),
(30, 'Kareema Chips', 0, 'Keripik Tempe', 'Kp. Bantar Peuteuy RT 02/04 No. 1 Kel. Tajur', '085717002018', 22, 2, '-6.627905666223225', '106.82574914805782', 1, '2020-03-17'),
(31, 'Harmony', 0, 'Keripik Sayur', 'Jl. Tunjung Biru No. 61 Villa Duta Kel. Baranangsiang', '0817103300', 17, 2, '-6.6071239248695965', '106.81462926498237', 1, '2020-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Makanan & Minuman'),
(2, 'Non Makanan & Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_kecamatan` varchar(128) NOT NULL,
  `nm_kecamatan` varchar(128) NOT NULL,
  `gj_kecamatan` varchar(128) NOT NULL,
  `wr_kecamatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `gj_kecamatan`, `wr_kecamatan`) VALUES
(1, '32.71.01', 'Bogor Selatan', 'bogor_selatan.geojson', '#00a9ea'),
(2, '32.71.02', 'Bogor Timur', 'bogor_timur.geojson', '#f63001'),
(3, '32.71.03', 'Bogor Tengah', 'bogor_tengah.geojson', '#60f834'),
(4, '32.71.04', 'Bogor Barat', 'bogor_barat.geojson', '#f9f503'),
(5, '32.71.05', 'Bogor Utara', 'bogor_utara.geojson', '#f86292'),
(6, '32.71.06', 'Tanah Sareal', 'tanah_sareal.geojson', '#a2238f');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kd_kelurahan` varchar(128) NOT NULL,
  `nm_kelurahan` varchar(128) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kelurahan`, `kd_kelurahan`, `nm_kelurahan`, `id_kecamatan`) VALUES
(1, '32.71.01.1001', 'Batutulis', 1),
(2, '32.71.01.1009', 'Bojong Kerta	', 1),
(3, '32.71.01.1002', 'Bondongan', 1),
(4, '32.71.01.1008', 'Cikaret', 1),
(5, '32.71.01.1016', 'Cipaku', 1),
(6, '32.71.01.1003', 'Empang', 1),
(7, '32.71.01.1014', 'Genteng', 1),
(8, '32.71.01.1012', 'Harjasari', 1),
(9, '32.71.01.1011', 'Kertamaya', 1),
(10, '32.71.01.1004', 'Lawang Gintung	', 1),
(11, '32.71.01.1013', 'Muarasari', 1),
(12, '32.71.01.1007', 'Mulyaharja', 1),
(13, '32.71.01.1015', 'Pakuan', 1),
(14, '32.71.01.1005', 'Pamoyanan', 1),
(15, '32.71.01.1010', 'Rancamaya', 1),
(16, '32.71.01.1006', 'Ranggamekar', 1),
(17, '32.71.02.1002', 'Baranangsiang', 2),
(18, '32.71.02.1003', 'Katulampa', 2),
(19, '32.71.02.1005', 'Sindangrasa', 2),
(20, '32.71.02.1004', 'Sindangsari', 2),
(21, '32.71.02.1001', 'Sukasari', 2),
(22, '32.71.02.1006', 'Tajur', 2),
(23, '32.71.03.1005', 'Babakan', 3),
(24, '32.71.03.1008', 'Babakan Pasar', 3),
(25, '32.71.03.1004', 'Cibogor', 3),
(26, '32.71.03.1010', 'Ciwaringin', 3),
(27, '32.71.03.1001', 'Gudang', 3),
(28, '32.71.03.1011', 'Kebon Kelapa', 3),
(29, '32.71.03.1003', 'Pabaton', 3),
(30, '32.71.03.1002', 'Paledang', 3),
(31, '32.71.03.1009', 'Panaragan', 3),
(32, '32.71.03.1006', 'Sempur', 3),
(33, '32.71.03.1007', 'Tegallega', 3),
(34, '32.71.04.1005', 'Balumbang Jaya', 4),
(35, '32.71.04.1003', 'Bubulak', 4),
(36, '32.71.04.1008', 'Cilendek Barat	', 4),
(37, '32.71.04.1009', 'Cilendek Timur', 4),
(38, '32.71.04.1011', 'Curug', 4),
(39, '32.71.04.1010', 'Curug Mekar	', 4),
(40, '32.71.04.1015', 'Gunung Batu', 4),
(41, '32.71.04.1016', 'Loji', 4),
(42, '32.71.04.1004', 'Margajaya', 4),
(43, '32.71.04.1001', 'Menteng', 4),
(44, '32.71.04.1012', 'Pasir Jaya', 4),
(45, '32.71.04.1013', 'Pasir Kuda', 4),
(46, '32.71.04.1014', 'Pasir Mulya', 4),
(47, '32.71.04.1007', 'Semplak', 4),
(48, '32.71.04.1002', 'Sindangbarang', 4),
(49, '32.71.04.1006', 'Situ Gede', 4),
(50, '32.71.05.1001', 'Bantar Jati', 5),
(51, '32.71.05.1005', 'Cibuluh', 5),
(52, '32.71.05.1006', 'Ciluar', 5),
(53, '32.71.05.1008', 'Cimahpar', 5),
(54, '32.71.05.1004', 'Ciparigi', 5),
(55, '32.71.05.1003', 'Kedung Halang', 5),
(56, '32.71.05.1007', 'Tanah Baru', 5),
(57, '32.71.05.1002', 'Tegal Gundil', 5),
(58, '32.71.06.1011', 'Cibadak', 6),
(59, '32.71.06.1010', 'Kayumanis', 6),
(60, '32.71.06.1002', 'Kebon Pedes', 6),
(61, '32.71.06.1003', 'Kedung Badak', 6),
(62, '32.71.06.1006', 'Kedung Jaya', 6),
(63, '32.71.06.1005', 'Kedung Waringin', 6),
(64, '32.71.06.1009', 'Kencana', 6),
(65, '32.71.06.1008', 'Mekarwangi', 6),
(66, '32.71.06.1007', 'Sukadamai', 6),
(67, '32.71.06.1004', 'Sukaresmi', 6),
(68, '32.71.06.1001', 'Tanah Sareal', 6),
(74, 'demo', 'demo', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nm_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nm_produk`) VALUES
(1, 'Teh'),
(2, 'Keripik Tempe'),
(3, 'Keripik Sayur'),
(4, 'Manisan Kolang Kaling'),
(5, 'Keripik Pisang'),
(6, 'Keripik Kentang'),
(7, 'Minumal Serbuk Bekatul'),
(8, 'Minuman Sayur'),
(9, 'Kue'),
(10, 'Roti'),
(11, 'Sosis'),
(12, 'Jajanan Tradisional');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nm_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nm_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `ft_user` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`, `ft_user`, `id_role`, `is_active`, `date_created`) VALUES
(1, 'Willyman Sopian', 'wmans39', '$2y$10$KilJ1gg7po.kr.zQY2YapO9.Z.oeMYbzDn/.LSXYZIQViZwSzLae2', 'super_admin.png', 1, 1, 1668730573),
(2, 'Galang Hanafi', 'galanghanaf1', '$2y$10$juroXEnzk.rvdi.A97T.XOx9HWVngYDlC0Kgl9hPnmNSx7j/VNAwm', 'super_admin2.png', 1, 1, 1668732313),
(3, 'Adrie Fahriza Tri Andes', 'drie', '$2y$10$YMbgpLErTHs98RrjQycUD./F97cUr8B.gqkORMNp6siBhtsWCQpKm', 'admin.png', 2, 1, 1668732676),
(4, 'Daffa Ksatria Firdaus', 'daffakf', '$2y$10$whYpbOKRsQoFmCrG3PS8WOCyEwh5D9LnHB31oKsQz4bg9AAb.VX8y', 'admin1.png', 2, 1, 1668743841),
(5, 'Achyar', 'achyarm', '$2y$10$5WVVR2Yzp8w9sYsQTkGqjelJLo32aQln97oFXfH4DOGOHF.c6BvrG', 'admin3.png', 2, 1, 1669366021),
(15, 'demo', 'demo', '$2y$10$7A8dCcxix/gQn03LG4IATu6LnnM5V7OnMXEGUwT8X/TCsg4mbSZMC', 'admin4.png', 2, 1, 1669858349);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ikm`
--
ALTER TABLE `tb_ikm`
  ADD PRIMARY KEY (`id_ikm`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ikm`
--
ALTER TABLE `tb_ikm`
  MODIFY `id_ikm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
