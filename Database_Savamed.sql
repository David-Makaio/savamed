-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.45 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.17.0.7270
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Dumping structure for table laravel.apoteks
CREATE TABLE IF NOT EXISTS `apoteks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_lisensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terverifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apoteks_nomor_lisensi_unique` (`nomor_lisensi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.apoteks: ~1 rows (approximately)
INSERT INTO `apoteks` (`id`, `nama`, `nomor_lisensi`, `terverifikasi`, `created_at`, `updated_at`) VALUES
	(1, 'Global Pharma Care', 'S0B-2025-TEST', 1, '2026-04-26 06:15:15', '2026-04-26 06:15:15');

-- Dumping structure for table laravel.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori` bigint unsigned NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_apotek` bigint unsigned NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int NOT NULL,
  `expired_at` date DEFAULT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barangs_id_kategori_foreign` (`id_kategori`),
  KEY `barangs_id_apotek_foreign` (`id_apotek`),
  CONSTRAINT `barangs_id_apotek_foreign` FOREIGN KEY (`id_apotek`) REFERENCES `apoteks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `barangs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.barangs: ~36 rows (approximately)
INSERT INTO `barangs` (`id`, `id_kategori`, `nama_barang`, `id_apotek`, `deskripsi`, `gambar`, `harga`, `expired_at`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Atorvastatin', 1, 'Used to lower cholesterol and triglyceride levels.', 'https://cdn01.pharmeasy.in/dam/products/J21424/atorvastatin-10-mg-tablet-10-medlife-pure-generics-combo-3-1626532296.jpg', 60000, '2025-01-15', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(2, 2, 'Amoxicillin', 1, 'Antibiotic used to treat bacterial infections.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/332350358/SI/JT/VF/98283251/amoxicillin-drugs3.jpg', 62000, '2024-12-01', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(3, 3, 'Lisinopril', 1, 'Treats high blood pressure and heart failure.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRquzMUwap3aIcmZQhZ4FOztWQorUZSonP4wg&s', 40000, '2025-06-30', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(4, 4, 'Metformin', 1, 'Used to control blood sugar levels in type 2 diabetes.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/332774949/NY/WA/ZJ/6299000/metformin-hydrochloride-tablets.jpeg', 31000, '2025-04-10', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(5, 5, 'Omeprazole', 1, 'Treats gastroesophageal reflux disease (GERD).', 'https://5.imimg.com/data5/JD/FH/VU/SELLER-5478572/omeprazole-capsules-20mg.jpeg', 75000, '2024-09-20', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(6, 3, 'Amlodipine', 1, 'Used to treat high blood pressure and angina.', 'https://5.imimg.com/data5/SELLER/Default/2023/1/CP/LY/QV/88793954/amlodipine-tablets-ip.jpeg', 20000, '2025-08-15', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(7, 6, 'Zolpidem', 1, 'Treats insomnia.', 'https://5.imimg.com/data5/SELLER/Default/2023/9/342848763/LR/GK/WN/197293575/zolpidem-10-mg-tablet.jpg', 70000, '2024-11-30', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(8, 7, 'Clonazepam', 1, 'Used to treat seizure and panic disorders.', 'https://5.imimg.com/data5/SELLER/Default/2021/5/CR/QB/QR/3184985/clonvul0-5.jpg', 350000, '2025-05-10', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(9, 8, 'Montelukast', 1, 'Used to treat allergies and prevent asthma attacks.', 'https://www.glamrisdermacare.com/wp-content/uploads/2021/08/0000s_0006_BILAZIL-M-min.jpg', 150000, '2024-12-05', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(10, 9, 'Gabapentin', 1, 'Used to treat nerve pain and seizures.', 'https://5.imimg.com/data5/SELLER/Default/2023/5/311267943/ZR/MT/QJ/69086821/gabapentin-100mg-tablet-500x500.jpg', 131000, '2025-07-25', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(11, 10, 'Albuterol', 1, 'Used to treat bronchospasm.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/337313153/HK/FV/II/57623134/buy-albuterol-hfa-90-mcg-inhaler-online.jpg', 34000, '2024-10-10', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(12, 11, 'Loratadine', 1, 'Antihistamine used to relieve allergy symptoms.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/332709645/ER/VU/LD/6299000/loratadine-10-mg-tablets.jpeg', 62000, '2025-03-01', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(13, 12, 'Ibuprofen', 1, 'Used to reduce fever and treat pain or inflammation.', 'https://5.imimg.com/data5/SELLER/Default/2023/6/319597573/MH/NE/SR/135658020/ibuprofen-400-mg-bp-tablets.jpg', 70000, '2025-09-15', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(14, 3, 'Warfarin', 1, 'Used to prevent blood clots.', 'https://www.careformulationlabs.com/uploaded_files/warfarin-5.png', 71000, '2025-02-28', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(15, 11, 'Cetirizine', 1, 'Antihistamine used to treat allergy symptoms.', 'https://5.imimg.com/data5/SELLER/Default/2023/5/311971664/FU/KT/PV/11858298/cetirizine-tablet.webp', 26000, '2025-05-15', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(16, 7, 'Sertraline', 1, 'Antidepressant used to treat depression and anxiety.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/337366367/KI/RJ/BA/7034457/sertraline-100-mg-tablets.jpg', 260000, '2025-06-10', 100, '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(17, 13, 'Tramadol', 1, 'Used to treat moderate to severe pain.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/331683629/YW/EW/FV/1359917/tramadol-hydrochloride-paracetamol-tablets.jpg', 17000, '2025-08-20', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(18, 14, 'Tamsulosin', 1, 'Used to treat symptoms of an enlarged prostate.', 'https://5.imimg.com/data5/GLADMIN/Default/2024/1/382027832/MW/YF/DV/37869803/tamsulosin-hydrochloride-tablet.png', 85000, '2025-04-05', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(19, 13, 'Oxycodone', 1, 'Used to treat moderate to severe pain.', 'https://tajgenerics.com/wp-content/uploads/cache/images/Oxycodone_7_5mg__Acetaminophen_375mg_Tablet_Exporters-scaled/Oxycodone_7_5mg__Acetaminophen_375mg_Tablet_Exporters-scaled-3481289551.jpg', 230000, '2025-07-30', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(20, 15, 'Prednisone', 1, 'Corticosteroid used to treat inflammation.', 'https://5.imimg.com/data5/SELLER/Default/2022/12/CE/BE/CW/23808697/prednisone-500x500.JPG', 12000, '2025-09-01', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(21, 7, 'Fluoxetine', 1, 'Antidepressant used to treat depression and OCD.', 'https://5.imimg.com/data5/SELLER/Default/2022/9/GN/LY/IE/154048565/fluoxetine-10mg-tablet.png', 442000, '2025-10-10', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(22, 3, 'Metoprolol', 1, 'Used to treat high blood pressure and angina.', 'https://5.imimg.com/data5/SELLER/Default/2022/11/UO/RS/FG/161638739/metoprolol-tartrate-50-mg.jpg', 48000, '2025-02-15', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(23, 16, 'Furosemide', 1, 'Diuretic used to treat fluid retention and swelling.', 'https://5.imimg.com/data5/SELLER/Default/2023/8/333795220/XM/UX/IJ/6299000/furosemide-tablet.jpeg', 14000, '2025-05-25', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(24, 7, 'Duloxetine', 1, 'Used to treat depression and anxiety.', 'https://5.imimg.com/data5/AL/LG/MY-6299000/duloxetine-30-mg-capsules.jpg', 100000, '2025-11-05', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(25, 17, 'Simvastatin', 1, 'Used to lower cholesterol and triglycerides.', 'https://5.imimg.com/data5/SELLER/Default/2023/10/357085613/HL/RR/GE/50963842/simvastatin-tablet-ups-20-mg.jpg', 100000, '2025-08-10', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(26, 3, 'Losartan', 1, 'Used to treat high blood pressure.', 'https://5.imimg.com/data5/SELLER/Default/2023/12/373066330/IL/GL/IT/180648134/losartan-potassium-tablets-ip-500x500.jpg', 38000, '2025-01-25', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(27, 18, 'Clopidogrel', 1, 'Used to prevent blood clots.', 'https://5.imimg.com/data5/SELLER/Default/2023/3/293106006/NJ/NS/EB/29765627/clopidogrel-75mg-aspirin-75mg-tab-500x500.jpg', 54000, '2025-03-20', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(28, 13, 'Hydrocodone', 1, 'Used to treat severe pain.', 'https://t4.ftcdn.net/jpg/02/93/25/13/360_F_293251390_jBCMpaDN1V1ipxcqpthTt3yikZPAZMr8.jpg', 259000, '2025-07-05', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(29, 7, 'Trazodone', 1, 'Antidepressant used to treat depression and insomnia.', 'https://c8.alamy.com/comp/GJ7J4D/molipaxin-100mg-capsules-antidepresant-trazodone-hydrochloride-GJ7J4D.jpg', 185000, '2025-06-15', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(30, 19, 'Ranitidine', 1, 'Used to reduce stomach acid and treat ulcers.', 'https://wellonapharma.com/admincms/product_img/product_actual_img/Ranitidine%20Tablets_27-01-2017-08:47:41.jpg', 30000, '2024-12-20', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(31, 20, 'Tazarotene', 1, 'This medication is a retinoid, prescribed for psoriasis and acne. It may decrease skin inflammation and skin changes associated with psoriasis.', 'https://tiimg.tistatic.com/fp/1/006/419/tazarotene-cream-0-1--641.jpg', 420000, '2025-02-02', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(32, 20, 'Isotretinoin', 1, 'This medication is a retinoid, prescribed for acne and other skin disorders. It reduces skin oil production, changing the characteristics of the skin oil, and preventing abnormal hardening of the skin.', 'https://i.postimg.cc/D0VJ7Lr1/iso.jpg', 299000, '2025-12-23', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(33, 20, 'Minocycline', 1, 'Minocycline is a broad spectrum tetracycline antibiotic. It acts by inhibiting the growth of bacteria in the body, It may be effective in other infections as well, however several bacteria have developed resistance to the drug, It may be used in patients who are allergic to the penicillin group of drugs as an alternative.', 'https://i.postimg.cc/JhvtQZdS/mino.png', 300000, '2025-02-02', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(34, 20, 'Calamine Lotion', 1, 'This medication is an anti-itch medication that contains mixture of zinc oxide (ZnO) with about 0.5% iron (III) oxide, prescribed for itching skin conditions. This medication in some cases is used as a mild antiseptic to arrest infections caused by scratching the affected area. Calamine is proved to be an effective medication in acne treatment.', 'https://i.postimg.cc/L6x9TjJv/calamine.jpg', 240000, '2025-12-23', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(35, 20, 'Dimethicone', 1, 'This medication is an emollient, prescribed for pediculosis, and other skin conditions.', 'https://i.postimg.cc/K8K2DwSv/dim.jpg', 220000, '2024-12-20', 100, '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(36, 4, 'Paracetamol', 1, '', 'medicines/AAtJQ8fkG153le4PREGId9nLAdbLqucvbbus8e7r.jpg', 18000, '2027-02-03', 100, '2026-04-26 06:16:06', '2026-04-26 06:16:06', NULL);

-- Dumping structure for table laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache: ~4 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('savamed-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1777213023),
	('savamed-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1777213023;', 1777213023),
	('savamed-cache-35a2ab1cb2e0189ac24137798f6e7ed1', 'i:2;', 1777212948),
	('savamed-cache-35a2ab1cb2e0189ac24137798f6e7ed1:timer', 'i:1777212948;', 1777212948);

-- Dumping structure for table laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel.historis
CREATE TABLE IF NOT EXISTS `historis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` bigint unsigned NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perubahan_stok` int NOT NULL,
  `stok_akhir` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_apotek` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historis_barang_id_foreign` (`barang_id`),
  KEY `historis_id_apotek_foreign` (`id_apotek`),
  CONSTRAINT `historis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `historis_id_apotek_foreign` FOREIGN KEY (`id_apotek`) REFERENCES `apoteks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.historis: ~37 rows (approximately)
INSERT INTO `historis` (`id`, `barang_id`, `aksi`, `perubahan_stok`, `stok_akhir`, `user_name`, `created_at`, `updated_at`, `id_apotek`) VALUES
	(1, 1, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(2, 2, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(3, 3, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(4, 4, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(5, 5, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(6, 6, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(7, 7, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(8, 8, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(9, 9, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(10, 10, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(11, 11, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(12, 12, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(13, 13, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(14, 14, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(15, 15, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:16', '2026-04-26 06:15:16', NULL),
	(16, 16, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(17, 17, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(18, 18, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(19, 19, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(20, 20, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(21, 21, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(22, 22, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(23, 23, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(24, 24, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(25, 25, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(26, 26, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(27, 27, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(28, 28, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(29, 29, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(30, 30, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(31, 31, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(32, 32, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(33, 33, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(34, 34, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(35, 35, 'Initial Entry', 100, 100, 'System', '2026-04-26 06:15:17', '2026-04-26 06:15:17', NULL),
	(36, 36, 'Initial Entry', 100, 100, 'Sarah Jenkins', '2026-04-26 06:16:06', '2026-04-26 06:16:06', NULL),
	(37, 36, 'adjustment', 0, 100, 'Sarah Jenkins', '2026-04-26 06:16:06', NULL, 1);

-- Dumping structure for table laravel.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravel.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.jobs: ~0 rows (approximately)

-- Dumping structure for table laravel.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_apotek` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategoris_id_apotek_foreign` (`id_apotek`),
  CONSTRAINT `kategoris_id_apotek_foreign` FOREIGN KEY (`id_apotek`) REFERENCES `apoteks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.kategoris: ~20 rows (approximately)
INSERT INTO `kategoris` (`id`, `nama_kategori`, `id_apotek`, `created_at`, `updated_at`) VALUES
	(1, 'HMG-CoA reductase inhibitors, or statins.', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(2, 'antibiotics', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(3, 'blood pressure', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(4, 'Diabetes', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(5, 'gastroesophageal', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(6, 'Insomnia', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(7, 'depression', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(8, 'allergy', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(9, 'anticonvulsants', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(10, 'Inhaler', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(11, 'Antihistamine', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(12, 'inflammatory', 1, '2026-04-26 06:15:16', '2026-04-26 06:15:16'),
	(13, 'Pain Killer', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(14, 'Gynaecology', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(15, 'corticosteroid', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(16, 'loop diuretics', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(17, 'cholesterol', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(18, 'antiplatelet', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(19, 'H2 blockers', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17'),
	(20, 'Dermatology', 1, '2026-04-26 06:15:17', '2026-04-26 06:15:17');

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_08_14_170933_add_two_factor_columns_to_users_table', 1),
	(5, '2026_04_20_042911_create_apoteks_table', 1),
	(6, '2026_04_21_131105_create_kategoris_table', 1),
	(7, '2026_04_21_131125_create_barangs_table', 1),
	(8, '2026_04_22_055837_create_historis_table', 1),
	(9, '2026_04_22_070155_add_soft_deletes_to_barang_table', 1),
	(10, '2026_04_23_021435_add_role_to_users_table', 1),
	(11, '2026_04_23_043246_add_pharmacy_id_to_users_table', 1),
	(12, '2026_04_26_133620_add_apotek_id_to_historis_table', 1);

-- Dumping structure for table laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('WU4eJQm92BmNwFNL2JYw4xZTBARGEwLRWTVXA9A3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMdXlJTm9kSUVTam82NWZ3YURWWkxCQWVVVm5wZGtMdHh4QmVkWExJIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvc2F2YW1lZC50ZXN0Iiwicm91dGUiOiJob21lIn19', 1777215728);

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `id_apotek` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_apotek_foreign` (`id_apotek`),
  CONSTRAINT `users_id_apotek_foreign` FOREIGN KEY (`id_apotek`) REFERENCES `apoteks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `role`, `id_apotek`) VALUES
	(1, 'Sarah Jenkins', 'admin@globalpharmacare.com', NULL, '$2y$12$zBuE3WW0llsslMa8Mhzqd.S5uhjl3mUUv09RK7lH6ugFCgsDykRLC', NULL, NULL, NULL, NULL, '2026-04-26 06:15:16', '2026-04-26 06:15:16', 'admin', 1),
	(2, 'Test User', 'test@example.com', '2026-04-26 06:15:20', '$2y$12$UNE9H8uf.wWSgN3nVpHgvO8K5Jdnf.MdEaLanUkEqHEKpcLe1w1oC', NULL, NULL, NULL, 'YQHkYXJed0', '2026-04-26 06:15:20', '2026-04-26 06:15:20', 'staff', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
