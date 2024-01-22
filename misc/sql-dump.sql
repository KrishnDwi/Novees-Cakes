-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 08:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_novee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_telp`, `alamat`, `username`, `password`) VALUES
(1, 'Krishna Dwipayana', '089524655346', 'Jl. Gunung Salak No. 31', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `harga_menu` int(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `image`, `deskripsi`) VALUES
(1, 'Marble Cake', 95000, '65aeb9ded35c7.jpg', 'Marble Cake adalah kue yang memikat dengan kombinasi dua atau lebih warna dan rasa yang berbeda yang terlihat seperti marmer. Kue ini terbuat dari adonan cake vanilla dan cokelat yang dipadukan secara artistik, menciptakan pola marmer unik. Setiap gigitan memberikan pengalaman yang harmonis antara kelembutan cake vanilla dan sentuhan gurih dari cokelat. Marble Cake sering dihiasi dengan lapisan glazur lembut atau ditaburi cokelat serut untuk menambahkan sentuhan istimewa. Kue ini menjadi pilihan'),
(2, 'Ontbijtkoek', 90000, '65aeba87236f1.jpg', 'Ontbijtkoek, yang berasal dari Belanda, adalah kue rempah yang memikat dengan cita rasa yang unik dan kaya akan rempah-rempah. Kue ini terbuat dari campuran tepung, gula, dan bumbu-bumbu tradisional seperti kayu manis, jahe, dan cengkeh. Dengan tekstur yang padat dan kenyal, ontbijtkoek memberikan pengalaman yang memuaskan setiap gigitannya. Rasanya yang manis dengan sentuhan rempah yang hangat membuatnya menjadi pilihan sempurna untuk santapan pagi atau camilan di tengah hari. Ontbijtkoek juga '),
(3, 'Carrot Cake', 95000, '65aebaac60368.jpg', 'Carrot Cake adalah masterpiece dari dunia kue, menghadirkan harmoni lezat antara kelembutan kue wortel yang lembut dan kekayaan rasa rempah. Terbuat dari wortel parut yang memberikan kelembutan dan kelembutan unik, dipadukan dengan tepung, gula, dan bahan-bahan berkualitas tinggi lainnya. Kue ini diperkaya dengan tambahan rempah seperti kayu manis dan pala, menciptakan aroma menggoda yang memenuhi ruangan. Selain itu, tambahan kenari atau walnut memberikan sentuhan renyah dan gurih yang memperka'),
(4, 'Spiku Almond', 90000, '65aebb3cc8450.jpg', '\r\nSpiku Almond adalah perpaduan cita rasa yang memukau antara kelembutan Spiku (Spikoe) dan kelezatan rasa kaya almond. Dengan lapisan cake yang tipis namun begitu lembut, Spiku Almond menghadirkan pengalaman menikmati kue yang elegan dan lezat. Setiap lapisan Spiku ditandai dengan keharuman vanilla yang lembut dan dipadukan dengan rempah pilihan, menciptakan harmoni rasa yang tak terlupakan.'),
(5, 'Klappertaart', 75000, '65aebb8d85eae.jpg', 'Klapertaart adalah kelezatan Indonesia yang memukau dengan cita rasa khas kelapa dan kelembutan yang menyegarkan. Kue ini menggabungkan lapisan lembut dan kenyal dari adonan yang terbuat dari kelapa parut segar, telur, dan susu, memberikan pengalaman kuliner yang unik dan lezat.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `total_harga` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_pelanggan`, `id_menu`, `total_harga`) VALUES
(1, 2, 4, 165000),
(2, 2, 5, 165000),
(3, 1, 1, 370000),
(4, 1, 2, 370000),
(5, 1, 3, 370000),
(6, 1, 4, 370000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telp`, `alamat`, `username`, `password`) VALUES
(1, 'Budiono Siregar', '087654321234', 'Jl. Seruni No. 25', 'budiono', '123'),
(2, 'Kukuh Haryanto', '089876543212', 'Jl. Wonogiri No. 14', 'kukuh', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
