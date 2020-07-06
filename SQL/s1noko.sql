-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Jul 2020 pada 09.41
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s1noko`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_06_08_071159_create_posts_table', 2),
(3, '2020_06_08_074621_create_post_comments_table', 2),
(4, '2020_06_08_075251_create_post_likes_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` blob NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `picture`, `author_id`, `description`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'MAKIF [Minecraft Edition]', 0x7075626c69632f757365725f70696374757265732f322f426b316741343072744778386b796b627767507a4f706172746b7153586a5a48537262394c4a43692e706e67, 2, 'Taking from The Herobrine story.', '', '2020-07-06 08:20:13', '2020-07-06 08:20:13'),
(2, 'Puput Pujianti [Character Design]', 0x7075626c69632f757365725f70696374757265732f332f6f6145583045576d77616154717a7a73413451374a49395042674971674744576f667176415071382e706e67, 3, 'Evolved before and after chapter 1 to 4.', '', '2020-07-06 08:23:29', '2020-07-06 08:23:29'),
(3, 'WELCOME TO S1Noko', 0x7075626c69632f757365725f70696374757265732f312f485a5a56503066534a4f5a6a425572356a356736595858444f6a564c36475a4d64436d636d36784c2e706e67, 1, 'We are happy to announce you our beloved mascot, S1 and Noko.\r\nS1 is a cyborg girl and a creation of Noko, a nerd, punk girl.', '', '2020-07-06 09:17:03', '2020-07-06 09:17:03'),
(4, 'The End', 0x7075626c69632f757365725f70696374757265732f312f4c4763645171324351396738466a5136365259657568447538534f59744568564b6f3646356f55352e6a706567, 1, 'This illustration supposed to be use on EPC : Nightmare Server ending.', '', '2020-07-06 09:21:43', '2020-07-06 09:21:43'),
(5, 'Tauphan', 0x7075626c69632f757365725f70696374757265732f312f384b4f5a79454370675269705371673076546a43486a3571326b7731614b46344470426a50374c362e706e67, 1, 'First announce of the main villain from MABAVENTURE.', '', '2020-07-06 09:23:46', '2020-07-06 09:23:46'),
(6, '3rd Day', 0x7075626c69632f757365725f70696374757265732f312f4861723952517741564242784d6d367a7266427239306245427573467955304c68654938583569502e706e67, 1, 'Played this and I love it!\r\nGame : Night in the woods.', '', '2020-07-06 09:27:09', '2020-07-06 09:27:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_comments`
--

INSERT INTO `post_comments` (`id`, `author_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Test.', '2020-07-06 08:21:07', '2020-07-06 08:21:07'),
(2, 3, 1, 'EnderDeadloc', '2020-07-06 08:25:47', '2020-07-06 08:25:47'),
(3, 4, 3, 'Noko is a SHE?1', '2020-07-06 09:30:11', '2020-07-06 09:30:11'),
(4, 4, 1, 'In the story he look a little fat.', '2020-07-06 09:32:55', '2020-07-06 09:32:55'),
(5, 4, 6, 'Love the game, also the fan community of this game are very friendly.', '2020-07-06 09:34:52', '2020-07-06 09:34:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_likes`
--

CREATE TABLE `post_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liker_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_likes`
--

INSERT INTO `post_likes` (`id`, `liker_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-07-06 08:20:44', '2020-07-06 08:20:44'),
(2, 3, 1, '2020-07-06 08:24:40', '2020-07-06 08:24:40'),
(3, 1, 3, '2020-07-06 09:17:30', '2020-07-06 09:17:30'),
(4, 4, 3, '2020-07-06 09:29:44', '2020-07-06 09:29:44'),
(5, 4, 1, '2020-07-06 09:31:37', '2020-07-06 09:31:37'),
(6, 4, 6, '2020-07-06 09:33:54', '2020-07-06 09:33:54'),
(7, 5, 3, '2020-07-06 09:37:54', '2020-07-06 09:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Frookiez', 'filiasmurty@yahoo.com', 'admin', NULL, '$2y$10$pNl6qmRMls1Hqt2Ed7AM6ORPbBwj6pyjMldYyqt02rvUwbUbhZX7m', 'KOejQfO4ooxzfdaarc78U5r0DaXUPrAvJh5QGR4DqRsW80nbDM6Z9IMb7ROw', '2020-06-10 08:03:52', '2020-06-10 08:03:52'),
(2, 'X33N', 'jardonkingdom@mianitian.org', 'admin', NULL, '$2y$10$ZvOLGeCTUt1YhaOyrHUAn.TN0ddBJdliaGwWTXdf5DUCkzqbxLrvC', 'RBgIRg1waG4zQ2EKyi590Sh4Yv19IjWRzQrh3l0eNd2L8PwhmDYZuv50VgKN', '2020-06-21 09:06:54', '2020-06-21 09:06:54'),
(3, 'Pukis Kukis', 'pukiskukis@yahoo.com', 'user', NULL, '$2y$10$w0CQMcJr99EP.OC2kKTJ6eZjTNBo5JoFq/K1lFiwTHQ3EgYwQZLqi', NULL, '2020-06-22 08:42:00', '2020-06-22 08:42:00'),
(4, 'Jardon', 'catuser@irlcat.com', 'admin', NULL, '$2y$10$w6mEgoA9qTXorI1znThs3eyLJvhiYim8NoaV0PIyx9a/pc2Xl3Psm', NULL, '2020-07-06 09:29:22', '2020-07-06 09:29:22'),
(5, 'Noko', 'Nokonoko@S1Noko.org', 'user', NULL, '$2y$10$0dBw0ZKyP7lSVaiGv1pEUuhYjGLXFwO6eGosHMvgp6uhowB.7yhNi', NULL, '2020-07-06 09:37:25', '2020-07-06 09:37:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indeks untuk tabel `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_author_id_foreign` (`author_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_likes_liker_id_foreign` (`liker_id`),
  ADD KEY `post_likes_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Ketidakleluasaan untuk tabel `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_liker_id_foreign` FOREIGN KEY (`liker_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
