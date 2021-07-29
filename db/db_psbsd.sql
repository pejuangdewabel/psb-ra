-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 29, 2021 at 07:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psbsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'adminpsb', 'Prasetyo Bella', NULL, '$2y$10$7o2bSCvp3TncLcW0arH4RuCJ/MRkNvcJNShsJb/233hpG7pk8.LAO', NULL, '2021-07-25 12:23:05', '2021-07-27 12:18:44', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `no_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_lahir_siswa` date DEFAULT NULL,
  `tmpt_lahir_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_anak_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jml_saudara` int(11) DEFAULT NULL,
  `bahasa_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_siswa` text COLLATE utf8mb4_unicode_ci,
  `kabupaten_kota_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_siswa` int(11) DEFAULT NULL,
  `no_hp_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pekerjaan_ayah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_ayah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pekerjaan_ibu_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_ibu_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ortu` text COLLATE utf8mb4_unicode_ci,
  `nama_wali_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pekerjaan_wali_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_wali_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_wali_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_wali_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_wali` text COLLATE utf8mb4_unicode_ci,
  `akte` longtext COLLATE utf8mb4_unicode_ci,
  `kk` longtext COLLATE utf8mb4_unicode_ci,
  `foto` longtext COLLATE utf8mb4_unicode_ci,
  `status_kelulusan` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`no_pendaftaran`, `user_id`, `tgl_lahir_siswa`, `tmpt_lahir_siswa`, `jk_siswa`, `agama_siswa`, `status_anak_siswa`, `anak_ke`, `jml_saudara`, `bahasa_siswa`, `alamat_siswa`, `kabupaten_kota_siswa`, `provinsi_siswa`, `kode_pos_siswa`, `no_hp_siswa`, `nama_ayah_siswa`, `tgl_lahir_ayah`, `pekerjaan_ayah_siswa`, `nohp_ayah_siswa`, `penghasilan_ayah_siswa`, `pendidikan_ayah_siswa`, `nama_ibu_siswa`, `tgl_lahir_ibu`, `pekerjaan_ibu_siswa`, `nohp_ibu_siswa`, `penghasilan_ibu_siswa`, `pendidikan_ibu_siswa`, `alamat_ortu`, `nama_wali_siswa`, `tgl_lahir_wali`, `pekerjaan_wali_siswa`, `nohp_wali_siswa`, `penghasilan_wali_siswa`, `pendidikan_wali_siswa`, `alamat_wali`, `akte`, `kk`, `foto`, `status_kelulusan`, `deleted_at`, `created_at`, `updated_at`) VALUES
('PBS2021770011840', 5, '2009-07-17', 'Jakarta Timur', 'L', 'Islam', 'Kandung', 1, 3, 'Indonesia', 'Sunter', 'Jakarta Utara', 'Jakarta', 35144, '089291021711', 'Bim', '1997-02-28', 'PNS', '089291021711', '3000000', 'Sarjana 1', 'Yuni', '1998-07-29', 'IRT', '08929120111', '3000000', 'Sarjana 3', 'Sunter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/PBS2021770011840/XTAWQD4lPaNjEw2oxQM3yrJoXjtUCq26bqJcfP65.jpg', 'assets/PBS2021770011840/uBFcUa7F6CgI6IE0bEGyqGfKR7zu9oAyj0btgmuD.jpg', 'assets/PBS2021770011840/mOmFVBA2fKhNRJDkJsjUe5DrQD8TtOfEy03SfgHW.jpg', 1, NULL, '2021-07-29 19:04:02', '2021-07-29 19:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_thn_ajaran` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_awal` date NOT NULL,
  `pendaftaran_akhir` date NOT NULL,
  `pengumuman` date NOT NULL,
  `daftar_ulang_awal` date NOT NULL,
  `daftar_ulang_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `id_thn_ajaran`, `pendaftaran_awal`, `pendaftaran_akhir`, `pengumuman`, `daftar_ulang_awal`, `daftar_ulang_akhir`, `created_at`, `updated_at`) VALUES
(2, 3, '2021-08-01', '2021-08-07', '2021-08-08', '2021-08-09', '2021-08-10', '2021-07-26 07:02:25', '2021-07-26 07:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_kelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kapasitas_kelas`, `created_at`, `updated_at`) VALUES
('1A', 20, '2021-07-26 04:16:02', '2021-07-27 13:06:27'),
('1B', 10, '2021-07-26 05:09:35', '2021-07-26 05:09:35'),
('1C', 20, '2021-07-27 13:06:19', '2021-07-27 13:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan_siswa`
--

CREATE TABLE `kelulusan_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahunajaran` bigint(20) UNSIGNED NOT NULL,
  `nopendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelulusan_siswa`
--

INSERT INTO `kelulusan_siswa` (`id`, `tahunajaran`, `nopendaftaran`, `nama_kelas`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 3, 'PBS2021770011840', '1C', NULL, '2021-07-29 19:05:42', '2021-07-29 19:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_25_165037_create_admin_table', 1),
(5, '2021_07_25_190005_add_level_to_users_table', 2),
(6, '2021_07_25_191318_add_level_to_admin_table', 3),
(9, '2021_07_25_203759_create_kelas_table', 4),
(10, '2021_07_25_204044_create_informasi_table', 4),
(11, '2021_07_25_204152_create_tahun_ajaran_table', 4),
(13, '2021_07_25_214749_create_calon_siswa_table', 5),
(16, '2021_07_25_221656_create_kelulusan_siswa_table', 6),
(17, '2021_07_25_224653_create_kelulusan_siswa_table', 7),
(18, '2021_07_25_224909_add_tambah_foreign_kelulusan_siswa_table', 8),
(19, '2021_07_26_142653_add_foreign_key_to_calon_siswa_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date1` year(4) NOT NULL,
  `date2` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `date1`, `date2`, `created_at`, `updated_at`) VALUES
(2, 2020, 2021, '2021-07-26 05:40:50', '2021-07-26 05:40:50'),
(3, 2021, 2022, '2021-07-26 05:52:42', '2021-07-26 05:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(5, '3203012503770011', 'David', NULL, '$2y$10$rI5WABMwu/MUAil4/kwtIej/L4RyXGp9tUEZfv/ec3qxuDPh6PkKS', NULL, '2021-07-29 18:52:24', '2021-07-29 18:52:24', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `calon_siswa_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_id_thn_ajaran_foreign` (`id_thn_ajaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kelulusan_siswa`
--
ALTER TABLE `kelulusan_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelulusan_siswa_tahunajaran_foreign` (`tahunajaran`),
  ADD KEY `kelulusan_siswa_nama_kelas_foreign` (`nama_kelas`),
  ADD KEY `kelulusan_siswa_nopendaftaran_foreign` (`nopendaftaran`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelulusan_siswa`
--
ALTER TABLE `kelulusan_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD CONSTRAINT `calon_siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_id_thn_ajaran_foreign` FOREIGN KEY (`id_thn_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelulusan_siswa`
--
ALTER TABLE `kelulusan_siswa`
  ADD CONSTRAINT `kelulusan_siswa_nama_kelas_foreign` FOREIGN KEY (`nama_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelulusan_siswa_nopendaftaran_foreign` FOREIGN KEY (`nopendaftaran`) REFERENCES `calon_siswa` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelulusan_siswa_tahunajaran_foreign` FOREIGN KEY (`tahunajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
