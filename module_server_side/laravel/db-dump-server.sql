-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2020 pada 05.41
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-dump-server`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `choices`
--

INSERT INTO `choices` (`id`, `choice`, `poll_id`, `created_at`, `updated_at`) VALUES
(1, 'bumi bulat', 2, '2020-10-20 20:37:46', '2020-10-20 20:37:46'),
(2, 'bumi datar', 2, '2020-10-20 20:37:47', '2020-10-20 20:37:47'),
(3, 'bumi bulat', 3, '2020-10-20 20:38:07', '2020-10-20 20:38:07'),
(4, 'bumi datar', 3, '2020-10-20 20:38:07', '2020-10-20 20:38:07'),
(5, 'bumi bulat', 4, '2020-10-20 20:38:37', '2020-10-20 20:38:37'),
(6, 'bumi datar', 4, '2020-10-20 20:38:37', '2020-10-20 20:38:37'),
(7, 'bumi bulat', 5, '2020-10-20 20:38:55', '2020-10-20 20:38:55'),
(8, 'bumi datar', 5, '2020-10-20 20:38:55', '2020-10-20 20:38:55'),
(9, 'bumi bulat', 6, '2020-10-20 20:39:20', '2020-10-20 20:39:20'),
(10, 'bumi datar', 6, '2020-10-20 20:39:20', '2020-10-20 20:39:20'),
(11, 'bumi bulat', 7, '2020-10-20 20:39:36', '2020-10-20 20:39:36'),
(12, 'bumi datar', 7, '2020-10-20 20:39:36', '2020-10-20 20:39:36'),
(13, 'bumi bulat', 8, '2020-10-20 20:39:58', '2020-10-20 20:39:58'),
(14, 'bumi datar', 8, '2020-10-20 20:39:58', '2020-10-20 20:39:58'),
(15, 'bumi bulat', 9, '2020-10-20 20:40:17', '2020-10-20 20:40:17'),
(16, 'bumi datar', 9, '2020-10-20 20:40:17', '2020-10-20 20:40:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Payment', '2020-10-21 02:13:38', '2020-10-21 02:13:39'),
(2, 'Procurement', '2020-10-21 02:13:46', '2020-10-21 02:13:47'),
(3, 'IT', '2020-10-21 02:13:55', '2020-10-21 02:13:57'),
(4, 'Finance', '2020-10-21 02:14:03', '2020-10-21 02:14:04'),
(5, 'HR', '2020-10-21 02:14:11', '2020-10-21 02:14:12');

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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_10_21_015654_create_failed_jobs_table', 1),
(3, '2020_10_21_015655_create_divisions_table', 1),
(4, '2020_10_21_015656_create_users_table', 1),
(5, '2020_10_21_020041_create_polls_table', 1),
(6, '2020_10_21_020051_create_choices_table', 1),
(7, '2020_10_21_020106_create_votes_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `polls`
--

INSERT INTO `polls` (`id`, `title`, `description`, `deadline`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ad', 'anjsadksaj', '2020-10-21 10:16:34', 17, '2020-10-21 03:16:37', '2020-10-21 03:16:41', '0000-00-00 00:00:00'),
(2, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:37:46', '2020-10-20 20:37:46', NULL),
(3, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:38:07', '2020-10-20 20:38:07', NULL),
(4, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:38:36', '2020-10-20 20:38:36', NULL),
(5, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:38:55', '2020-10-20 20:38:55', NULL),
(6, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:39:20', '2020-10-20 20:39:20', NULL),
(7, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:39:36', '2020-10-20 20:39:36', NULL),
(8, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:39:58', '2020-10-20 20:39:58', NULL),
(9, 'bumi bulat atau bumi datar ?', 'kamu tim mana ?', '2020-12-01 15:00:00', 19, '2020-10-20 20:40:16', '2020-10-20 20:40:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'payment_1', '$2y$10$VsFxh5T2OG3J5BViWhH3TuRDAWBztc/CQuhdP1Y51gvAFHlVBam56', 'user', 1, '2020-10-20 19:14:52', '2020-10-20 19:14:52'),
(2, 'payment_2', '$2y$10$Z6QmcrnnRg5My40n/gBhaO.pVK/GdUUwEcSHwl/X35VF3JK2sb64q', 'user', 1, '2020-10-20 19:14:52', '2020-10-20 19:14:52'),
(3, 'payment_3', '$2y$10$1/cuqAI/P50NS3L8zmwn0OqTsZuhtl54rqMni5garkN7o02zjgWQG', 'user', 1, '2020-10-20 19:14:53', '2020-10-20 19:14:53'),
(4, 'payment_4', '$2y$10$zMOvoSsC4zBUf5QQxvFxQeYTsU6FJ739CEdfHP2OkoLONH5rOnWBu', 'user', 1, '2020-10-20 19:14:53', '2020-10-20 19:14:53'),
(5, 'payment_5', '$2y$10$WAKhbas9VcIjspJ5DZBG7Om/HJ8FZ6Ft3IZB/UY/UySw/cP1gOc9.', 'user', 1, '2020-10-20 19:14:53', '2020-10-20 19:14:53'),
(6, 'procurement_1', '$2y$10$EYpYcLfivZuCxBCmTYkMMuY8wYHUIpBrPmc9MhyGXBFUsxoEpSkWS', 'user', 2, '2020-10-20 19:14:54', '2020-10-20 19:14:54'),
(7, 'procurement_2', '$2y$10$ocVMlfH5Ap.OHDlmWLGfKu6AV4CcpQEF.OaEJKpABOQIKgFpMi5MW', 'user', 2, '2020-10-20 19:14:54', '2020-10-20 19:14:54'),
(8, 'procurement_3', '$2y$10$vu0pA6ORDv.EmdAwbrvCquJ1xHVt57eGHJI72VUKVHDl2Aayb7Jzu', 'user', 2, '2020-10-20 19:14:54', '2020-10-20 19:14:54'),
(9, 'it_1', '$2y$10$h1scJTPl2lOEwtOSAgIviuTjVoDv52xqWZQJ0GQHam74HvkDS5Xc6', 'user', 3, '2020-10-20 19:14:55', '2020-10-20 19:14:55'),
(10, 'it_2', '$2y$10$.9R4HyzuvOXMDxGDReSUIOdtgoWgPNh3m8K2n68aDdrjri7Nc9Dre', 'user', 3, '2020-10-20 19:14:55', '2020-10-20 19:14:55'),
(11, 'it_3', '$2y$10$tjZ25msmtB2Fe.GRufAXAu.Rib1PkjSSmgldU7fluSVjcNB/wrP5C', 'user', 3, '2020-10-20 19:14:55', '2020-10-20 19:14:55'),
(12, 'it_4', '$2y$10$9yIwSpUC4piB6z5TuTZb..qnvVkJQpjfAGdCN4yrl1bcxnrZsyTm6', 'user', 3, '2020-10-20 19:14:55', '2020-10-20 19:14:55'),
(13, 'it_5', '$2y$10$cMaESJYS.O2KJww/.Ay.gOhh5g0htDBjY62keKcFQbWqfHBSc5CGm', 'user', 3, '2020-10-20 19:14:55', '2020-10-20 19:14:55'),
(14, 'it_6', '$2y$10$aur6lir89SGa5SSZDUeiDucPLNtnc3X6DVnwIxCEm6ngChuYxpSZ2', 'user', 3, '2020-10-20 19:14:56', '2020-10-20 19:14:56'),
(15, 'it_7', '$2y$10$ZUuYRdlZCmBtDvaIxbz.NOeiO5/TLmx/Kb9pnjnmFv2EIALfLsVha', 'user', 3, '2020-10-20 19:14:56', '2020-10-20 19:14:56'),
(16, 'finance_1', '$2y$10$4HHeIG0EuF2ggGamin4PZeV6okJwKqksAjTSes.DCwO3CFrhhGG66', 'user', 4, '2020-10-20 19:14:56', '2020-10-20 19:14:56'),
(17, 'finance_2', '$2y$10$ZTX7tMyPhv6EiUToEHjB9O.d1UpEReajoXfXVtkYX8bHU0GFbrAwe', 'user', 4, '2020-10-20 19:14:56', '2020-10-20 19:14:56'),
(18, 'finance_3', '$2y$10$./MoH952PzRhgt67b8jqc.hxtkwewYoFQ/UOzpVGzdfClzGnDuBQe', 'user', 4, '2020-10-20 19:14:57', '2020-10-20 19:14:57'),
(19, 'hr_1', '$2y$10$8OU2By0CQSybIU2regOqXOCVY8TTWoGDIDSayJee/Ulwp5THdBk6i', 'admin', 5, '2020-10-20 19:14:58', '2020-10-20 19:14:58'),
(20, 'hr_2', '$2y$10$2LTmZn5uFuK6Ynpvrp7zgO5JMWbmpXO4XUMFsw6P2wekYg3rahvqC', 'admin', 5, '2020-10-20 19:14:58', '2020-10-20 19:14:58'),
(21, 'hr_3', '$2y$10$mGKh5gSBngfWueRQ13zIBOUjR4mM4gkwmN3pWb95.iJJm5D7e4WoS', 'admin', 5, '2020-10-20 19:14:59', '2020-10-20 19:14:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choice_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choices_poll_id_foreign` (`poll_id`);

--
-- Indeks untuk tabel `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indeks untuk tabel `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polls_created_by_foreign` (`created_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_division_id_foreign` (`division_id`);

--
-- Indeks untuk tabel `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_choice_id_foreign` (`choice_id`),
  ADD KEY `votes_user_id_foreign` (`user_id`),
  ADD KEY `votes_poll_id_foreign` (`poll_id`),
  ADD KEY `votes_division_id_foreign` (`division_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`);

--
-- Ketidakleluasaan untuk tabel `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Ketidakleluasaan untuk tabel `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_choice_id_foreign` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`id`),
  ADD CONSTRAINT `votes_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `votes_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
