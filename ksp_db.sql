-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table ksp_db.features: ~12 rows (approximately)
INSERT INTO `features` (`id`, `title`, `description`, `image`, `updated_at`) VALUES
	(1, 'Buku', 'Buku adalah', 'assets/img/features/1758987473_4fbd5357534983075521d9333e687c70-removebg-preview.png', '2025-09-27 15:37:53'),
	(2, 'Sunt consequatur ad ut est nulla', 'Cupiditate placeat cupiditate placeat est ipsam culpa...', 'assets/img/features/1758988421_WhatsApp Image 2025-09-26 at 12.56.36.jpeg', '2025-09-27 15:53:41'),
	(3, 'Akal', 'Sehat', 'assets/img/features/1758988464_84d5e8d4f4c65b5da4e820b15791002c.png', '2025-09-27 15:54:24'),
	(4, 'Budi', 'Pekerti', 'assets/img/features/1758988598_cu 1.png', '2025-09-27 15:56:38'),
	(5, 'Simpanan Siaga', 'Untuk Masa Depan', 'assets/img/features/1758988628_40ec8071f5bb35ec9e93dc38e8d3bb9b.png', '2025-09-27 15:57:08'),
	(6, 'Simpanan Sidapen', 'Dana Pensiun', 'assets/img/features/1758988892_KEANGGOTAASN.png', '2025-09-27 16:01:32'),
	(7, 'Feature 5', '', '', '2025-09-27 15:33:17'),
	(8, 'Feature 6', '', '', '2025-09-27 15:33:17'),
	(9, 'Feature 7', '', '', '2025-09-27 15:33:17'),
	(10, 'Feature 8', '', '', '2025-09-27 15:33:17'),
	(11, 'Feature 9', '', '', '2025-09-27 15:33:17'),
	(12, 'Feature 10', '', '', '2025-09-27 15:33:17');

-- Dumping data for table ksp_db.stats: ~3 rows (approximately)
INSERT INTO `stats` (`id`, `anggota`, `asset`, `simpanan`, `pinjaman`, `tabungan`, `updated_at`) VALUES
	(1, 1629, 31981409685, 5002986024, 21159303200, 24317228112, '2025-09-27 14:36:35'),
	(2, 1629, 31981409685, 5002986024, 21159303200, 24317228112, '2025-09-27 14:42:33'),
	(3, 1638, 32397992086, 5011586024, 21435574600, 24675634845, '2025-09-27 14:53:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
