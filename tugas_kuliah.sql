-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2023 pada 23.42
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_kuliah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `hargaJual` double NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `hargaJual`, `id_pengguna`, `created_at`, `updated_at`) VALUES
(1, 'Sabun Lifeboy', 'Sabun Mandi', 'pcs', 3000, 'USR001', '2023-07-30 12:35:19', '2023-07-30 12:47:53'),
(2, 'Sabun Giv', 'Sabun Mandi', 'Pcs', 3000, 'USR001', '2023-07-30 12:51:02', '2023-07-30 12:51:02'),
(3, 'Ciptadent', 'Pasta Gigi', 'pcs', 7000, 'USR003', '2023-07-30 12:51:31', '2023-07-30 12:51:31'),
(4, 'Pepsodent', 'Pasta Gigi', 'pcs', 8000, 'USR002', '2023-07-30 12:51:51', '2023-07-30 12:51:51'),
(5, 'Zinc', 'Shampo', 'pcs', 1000, 'USR004', '2023-07-30 12:52:20', '2023-07-30 12:52:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` bigint(20) UNSIGNED NOT NULL,
  `nama_akses` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaJual` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id`, `barang_id`, `jumlah`, `hargaJual`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4000, 12000, '2023-07-30 13:45:03', '2023-07-30 13:45:03'),
(2, 3, 2, 5000, 10000, '2023-07-30 13:56:54', '2023-07-30 13:56:54'),
(3, 4, 3, 10000, 30000, '2023-07-30 14:37:58', '2023-07-30 14:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_30_161048_create_hak_akses', 1),
(3, '2023_07_30_161609_create_pengguna', 1),
(4, '2023_07_30_161903_create_pelanggan', 1),
(5, '2023_07_30_162156_create_barang', 1),
(6, '2023_07_30_162325_create_pembelian', 1),
(7, '2023_07_30_162808_create_penjualan', 1),
(8, '2023_07_30_183352_create_laporan_penjualan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenisKelamin` varchar(255) NOT NULL,
  `id_akses` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pembelian` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_akses` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`, `created_at`, `updated_at`) VALUES
('USR001', 'USR001', '$2y$10$G8ioxPZiiuPauQxbF5/U/.1jzWx9M8GbyP1baMIE0F0ezh/dCCGIO', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR002', 'USR002', '$2y$10$uOhD66MF5pBKi.OJxcmLweegrLDxG6J/mR.oEI73ltn8C.b7b79hC', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR003', 'USR003', '$2y$10$ogQySakHno5FpYkRNtgyFu/NOh52lPIb8sSXEEBOj5X9p8CSqUM06', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR004', 'USR004', '$2y$10$9cHqZCW0f/HbQE3A4WHQ/e33wHFWNeKuQSRI69JLJGRO.QCn8jzq.', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR005', 'USR005', '$2y$10$X8DpVnWZs91.Klvc4orPsOiJCBSLp4SgzQelmqouez8WE/mKmiQxS', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR006', 'USR006', '$2y$10$./Nh57Dr2rFf09.3h7NeeO8LmNtFNSqEBS6scRdi4ie.CPzR0r4X6', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR007', 'USR007', '$2y$10$o8J2BKh/d9gEf/NBNfSCeun9gHQbsqnUdAQBAwYLruaUdhQPL3JPy', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR008', 'USR008', '$2y$10$6QMePWJhM6SGZu0IPIVaHusPrCtPB.pbn0K8OJiN6M39dQ9HAY53m', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR009', 'USR009', '$2y$10$4F1OjEn0fHGsIM2MGwhuoeiJnC3zY6mpTxEPZifa0h9ACAB9HVDie', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR010', 'USR010', '$2y$10$Yq7q4iRghiXF.wUIawQ0SO5A9q0Zi3BEugnUFMNv.xFMrvKw87qsO', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR011', 'USR011', '$2y$10$qlLqnDZZ1d47P8/KIOEt.e6s3R9rfHj71fW1tFgTpzBR4gf1vLTlK', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR012', 'USR012', '$2y$10$ixRnxhVBgI39AWdFUGQkrecLl/dJ7wmTrh0dVoUSSJSSHp7zuKvDi', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR013', 'USR013', '$2y$10$NAjze2H7Eurq5Oc6XAjfnemoG1P2aDeFIAZ8L6Zg/bfnhmKxNkb0K', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR014', 'USR014', '$2y$10$tQP.1uXmQKLu0IPv3AvHau8mCUOcxf2MIOz5T2sQkyqCWHehmV8Qa', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR015', 'USR015', '$2y$10$BXNthLxvs.e.zaB2365UDukN58XxARF..iN6Zp115OYvB3DxeiCYC', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR016', 'USR016', '$2y$10$jrdjXq2AzsmX8i/BxPXcUOYbRG65j/xXl4wMAhL2zedhKJnAdJL7u', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR017', 'USR017', '$2y$10$S5Axyvka4v/eyyPp8gudl.fqpHg6qM.zjMCx/DF/rDMX9nSvW1oCe', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR018', 'USR018', '$2y$10$B4sK7GF0CX4wg7D5W6pSF.ttjVEyv8NV.buRX2LXJzIzC5fH/x7LK', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR019', 'USR019', '$2y$10$AzLj0lYdKzShBdJSMXgcxe2sqVYvPUK4ZsG17Ck81WqDB05K94VEe', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR020', 'USR020', '$2y$10$i1DhP.y9CDIUVmHXoJhb6uL.MeY726lKlpEbE5hWE6LYM0UvDDd.2', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR021', 'USR021', '$2y$10$aaCZI/DtMi0ffWBWFoXc9O/DYrXQepkNDyxJ/KCkuJ0.ZXbbwbhIu', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR022', 'USR022', '$2y$10$UTMAtj43V6NehXwwtXDzxesHTb/AceALfHWwRuP2wMceVXRw1pBwK', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR023', 'USR023', '$2y$10$6W0vQsPDwAtRRWLhlHqLweXod28CgJyilyJX/xRphEwqYrFat.qLm', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR024', 'USR024', '$2y$10$Rzxcd.ghSurjVvBsXr9fbOS7YxLV5kZ.i9q1qmWpvLKv6Lwk1GFLi', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR025', 'USR025', '$2y$10$OW0TF5SZYiqZW9nYWMmk4eji/kS2vo7Q3xR2hsMbKy4jSTQ4X6z4e', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR026', 'USR026', '$2y$10$nOY7/Vy/0VXVhuuUtLRYn.wKQOwR1ezclrRI0R7xh6lfbyHzCWeCS', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR027', 'USR027', '$2y$10$u86ccwNeS1lKmjVQ5m6sPO9/ZSKfukhOddRxIevfabD1bWbFwmbVK', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR028', 'USR028', '$2y$10$NZgOO8lGIsfw2m6B76yhS./JxHV/hiAqwHhm/31N3pZmZRZhVCu7G', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR029', 'USR029', '$2y$10$gnCLQO9I4CfUuCF0xTzKhuaSqFlcJG9vDXI/PXGsEEVPKPZmZslDm', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12'),
('USR030', 'USR030', '$2y$10$b4t/ZNsP.CR4ZiqF.NXfxuFpUvMQ1ujG.gEPDXxNQU/zS/pGvjJta', NULL, NULL, NULL, NULL, 1, '2023-07-30 11:20:12', '2023-07-30 11:20:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `jumlah_penjualan` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` varchar(50) NOT NULL,
  `namaSupplier` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `idBarang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`, `alamat`, `telepon`, `email`, `keterangan`, `idBarang`) VALUES
('SUP001', 'PT Wira Niaga Graha', 'Jl Kemang Tmr Raya 56, Dki Jakarta', '081234567890', 'wiraniagagraha@gmail.com', NULL, '1'),
('SUP002', 'PT Trakindo Utama', 'Kompl Harapan Baru Regensi Bl B3/27 RT 007/23, Dki Jakarta', '081234567891', 'trakindoutama@gmail.com', NULL, '2'),
('SUP003', 'PT Ramoco', 'Jl Mandala Slt 2 RT 015/05, Dki Jakarta', '081234567892', 'ramoco@gmail.com', NULL, '2'),
('SUP004', 'PT Exsa Internasional', 'Jl Kapuk Kamal Bl N-11/40, Dki Jakarta', '081234567881', 'exsainternasional@gmail.com', NULL, '4'),
('SUP005', 'Crystal Anugerah Abadi', 'Jl Jemur Wonosari JG-17, Jawa Timur', '081234567865', 'crystalanugerahabadi@gmail.com', NULL, '1'),
('SUP006', 'PT Trisari Tigaputra', 'Jl Cipinang Indah II 24, Dki Jakarta', '081234567822', 'trisaritigaputra@gmail.com', NULL, '1'),
('SUP007', 'PT Panca Bakti Persada', 'Jl Muradi 33, Jawa Tengah', '081234567811', 'pancabaktipersada@gmail.com', NULL, '2'),
('SUP008', 'PT Bumikharisma', 'Jl Sunter Muara 8, Dki Jakarta', '081234567820', 'bumikharisma@gmail.com', NULL, '3'),
('SUP009', 'PT Pratiwi Putri Sulung', 'Kompl Tmn Pulo Gebang Bl C-1/7, Dki Jakarta', '081234567894', 'pratiwiputrisulung@gmail.com', NULL, '4'),
('SUP010', 'PT Delphi Utama', 'Cideng, Gambir, Jakarta Pusat', '081234567895', 'delphiutama@gmail.com', NULL, '5'),
('SUP011', 'PT Gerbang Surya', 'Jl Sompok Lama 62 C, Jawa Tengah', '081234567844', 'gerbangsurya@gmail.com', NULL, '4'),
('SUP012', 'PT Mandiri Solusindo', 'Jl Cinere Mall 1A, Dki Jakarta', '081234567833', 'mandirisolusindo@gmail.com', NULL, '2'),
('SUP013', 'PT Sumbermitra Perkasa', 'Jl Jangli 9 C, Jawa Tengah', '081234565643', 'sumbermitraperkasa@gmail.com', NULL, '5'),
('SUP014', 'PT Enviro Prima', 'Jl Letjen South Parman Mal Ciputra 8, Dki Jakarta', '081234567898', 'enviroprima@gmail.com', NULL, '2'),
('SUP015', 'PT Sistemindo Kontrolindo', 'Jl Pasuruan 28 A, Dki Jakarta', '081234567860', 'sistemindokontrolindo@gmail.com', NULL, '2'),
('SUP016', 'PT Gree Adhi Kartika', 'Perum Tmn Alfa Indah Bl i/6 Kav 13, Jakarta', '081234567818', 'greeadhikartika@gmail.com', NULL, '3'),
('SUP017', 'PT Saberindo Pacific', 'Jl RS Fatmawati 15 Golden Plaza Bl A/30, Dki Jakarta', '081234567811', 'saberindopacific@gmail.com', NULL, '2'),
('SUP018', 'PT Bumi Cahaya Unggul', 'Jl Setia Budi 90 KL, Sumatera Utara', '081234567849', 'bumicahayaunggul@gmail.com', NULL, '1'),
('SUP019', 'PT Elektra Daya Integra', 'Jl Jajaway 12, Jawa Barat', '081234567877', 'elektradayaintegra@gmail.com', NULL, '3'),
('SUP020', 'PT Abadi Berkat', 'Jl Radio Dlm Raya 9, Dki Jakarta', '081234567896', 'abadiberkat@gmail.com', NULL, '5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_pengguna_foreign` (`id_pengguna`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_penjualan_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `pelanggan_id_akses_foreign` (`id_akses`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `pembelian_id_pengguna_foreign` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `pengguna_id_akses_foreign` (`id_akses`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `penjualan_id_pengguna_foreign` (`id_pengguna`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`),
  ADD KEY `idBarang` (`idBarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD CONSTRAINT `laporan_penjualan_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_id_akses_foreign` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `barang` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_id_akses_foreign` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `barang` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
