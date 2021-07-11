-- --------------------------------------------------------
-- Host:                         192.168.0.2
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for penggajian
CREATE DATABASE IF NOT EXISTS `penggajian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `penggajian`;

-- Dumping structure for table penggajian.tbl_gaji
CREATE TABLE IF NOT EXISTS `tbl_gaji` (
  `gaji_id` int NOT NULL AUTO_INCREMENT,
  `kode_kar` int DEFAULT NULL,
  `jam_lembur` date DEFAULT NULL,
  `uang_lembur` double DEFAULT NULL,
  `total_gaji` double DEFAULT NULL,
  `bulan_transfer` char(15) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `jam_transfer` time DEFAULT NULL,
  PRIMARY KEY (`gaji_id`),
  KEY `kode_kar` (`kode_kar`),
  CONSTRAINT `FK_tbl_gaji_tbl_karyawan` FOREIGN KEY (`kode_kar`) REFERENCES `tbl_karyawan` (`kode_kar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table penggajian.tbl_gaji: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_gaji` DISABLE KEYS */;
INSERT INTO `tbl_gaji` (`gaji_id`, `kode_kar`, `jam_lembur`, `uang_lembur`, `total_gaji`, `bulan_transfer`, `tgl_transfer`, `jam_transfer`) VALUES
	(1, 1, '2021-07-09', 200000, 500000, 'Juli', '2021-07-09', '06:26:58'),
	(6, 1, '2021-07-09', 100000, 500000, 'July', '2021-07-09', '16:54:00'),
	(7, 1, '2021-07-09', 100000, 500000, 'July', '2021-07-09', '17:03:00'),
	(8, 5, '2021-07-10', 350000, 5500000, 'July', '2021-07-10', '00:24:00'),
	(9, 6, NULL, NULL, 3500000, 'Juny', '2021-07-10', '00:53:23');
/*!40000 ALTER TABLE `tbl_gaji` ENABLE KEYS */;

-- Dumping structure for table penggajian.tbl_karyawan
CREATE TABLE IF NOT EXISTS `tbl_karyawan` (
  `kode_kar` int NOT NULL AUTO_INCREMENT,
  `nama_kar` char(30) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  `no_rek` char(30) DEFAULT NULL,
  `posisi_kar` char(50) DEFAULT NULL,
  `gajiBersih` double DEFAULT NULL,
  PRIMARY KEY (`kode_kar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table penggajian.tbl_karyawan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_karyawan` DISABLE KEYS */;
INSERT INTO `tbl_karyawan` (`kode_kar`, `nama_kar`, `alamat`, `no_rek`, `posisi_kar`, `gajiBersih`) VALUES
	(1, 'Yuli', 'Semarang', '232451', 'MANAGER', 1350000),
	(5, 'budi', 'ungaran', '2134143', 'Staff', 1500000),
	(6, 'joni', 'pati', '2134143', 'Staff', 1500000);
/*!40000 ALTER TABLE `tbl_karyawan` ENABLE KEYS */;

-- Dumping structure for table penggajian.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(30) DEFAULT NULL,
  `fullname` char(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table penggajian.tbl_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `fullname`) VALUES
	(1, 'yuli', 'yuli', 'Yuliatin'),
	(2, 'hakko', 'hakko', 'hakko bio richard');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
