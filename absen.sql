-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Mar 2020 pada 18.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `lembur_mulai` time DEFAULT NULL,
  `lembur_selesai` time DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `nama_hari`, `nama_lain`, `jam_mulai`, `jam_selesai`, `lembur_mulai`, `lembur_selesai`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 'Monday', '08:00:00', '12:00:00', '14:00:00', '16:00:00', 1, NULL, NULL),
(2, 'Selasa', 'Tuesday', '17:00:00', '22:00:00', '22:00:00', '23:59:59', 1, NULL, NULL),
(3, 'Rabu', 'Wednesday', '01:00:00', '23:59:00', '14:00:00', '16:00:00', 1, NULL, NULL),
(4, 'Kamis', 'Thursday', '08:00:00', '12:00:00', '14:00:00', '16:00:00', 1, NULL, NULL),
(5, 'Jum\'at', 'Friday', '08:00:00', '15:50:00', '16:00:00', '16:00:00', 1, NULL, NULL),
(6, 'Sabtu', 'Saturday', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, 'Minggu', 'Sunday', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_resets_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2020_01_30_062199_create_jadwals_table', 1),
(56, '2020_01_30_062200_create_places_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `places`
--

INSERT INTO `places` (`id`, `image`, `latitude`, `longtitude`, `time`, `lokasi`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(33, '5hK9PpfrDgKdrJEUhLEE1583935801', '-6.7973913', '110.8580859', '2020-03-11 21:10:01', 'Jl. Mayor Kusmanto No.2, Pedawang, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59325, Indonesia', 0, 1, '2020-03-11 14:10:01', '2020-03-11 14:10:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_thl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `tmt_pengangkatan_pertama` date DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tingkat_pendidikan_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_pendidikan_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tenaga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_kerja` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `no_thl`, `name`, `password`, `role`, `tmt_pengangkatan_pertama`, `tempat_lahir`, `tanggal_lahir`, `tingkat_pendidikan_terakhir`, `jurusan_pendidikan_terakhir`, `jabatan`, `status_tenaga`, `unit_kerja`, `keterangan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '99', 'zaenal', '$2y$10$xVrblHJGqOpHoAVE0uYPeutllKXR/U4f/YcxlV/Q2uOUqAO4T8Qs6', 3, '1979-02-11', 'JEPARA', '1979-02-11', 'SLTA', 'MANAGEMENT INFORMATIKA', 'TENAGA KEBERSIHAN', 'THL', 'DLH', '.', NULL, NULL, NULL),
(2, '1979-02-11', 'Excate', '$2y$10$LRQq6y4c.p3qwc9tSkR9EOpx5qhJHh88sPCjgW8kY6PwE2ouB9MGW', 2, '1979-02-11', 'JEPARA', '1979-02-11', 'SLTA', 'MANAGEMENT INFORMATIKA', 'TENAGA KEBERSIHAN', 'THL', 'DLH', '.', NULL, NULL, NULL),
(3, '837', 'Caex', '$2y$10$SOT/FQvtIE4z5qSpJ7qaHeQ8svCysyj3X6EsKtRaWtjb//XFAhdh2', 1, '1979-02-11', 'JEPARA', '1979-02-11', 'SLTA', 'MANAGEMENT INFORMATIKA', 'TENAGA KEBERSIHAN', 'THL', 'DLH', NULL, NULL, NULL, '2020-02-24 09:57:04'),
(4, '6766', '98', '$2y$10$YVIWNem43mmWDR2U7tf/r.8NbQXFr9pWShpKvqGmjLMoYvgH65pLe', 1, NULL, 'jepara', '6655-06-06', 'SMA', '1', '1', '1', '1', '1', NULL, '2020-02-24 10:08:27', '2020-02-26 00:47:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_no_thl_unique` (`no_thl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
