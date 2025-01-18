-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2025 pada 05.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpoliapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(11) UNSIGNED NOT NULL,
  `id_jadwal` int(11) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(10) UNSIGNED NOT NULL,
  `status_periksa` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `status_periksa`) VALUES
(9, 18, 21, 'sakit gigi', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(8, 6, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `password`, `alamat`, `no_hp`, `id_poli`) VALUES
(24, 'Dr. Ardi', '$2y$10$oIaYSjAcZ8ep4JCdGAUnNuk6E7WcAO9egQxHaR3zOjKsNO0x5629a', 'Jl. Merak No. 11', '08123456789', 23),
(26, 'Dr. Dian', '$2y$10$rzp.zaOk9Jd71ZDuUz5mPe2B9TyIY9n2MKWFIvevpap4vZCkU1.K2', 'Jl. Menyang No. 99', '081234567822', 12),
(28, 'Dr. Eka', '$2y$10$4DfB6kyJlNUXRtr.9Yz7CO6WG0iUw7HhJVJPyX1Zise92y10.KGAm', 'Jl. Anggrek No. 5', '081234567894', 19),
(29, 'Dr. Hasan', '$2y$10$fW94YqAm3iDfdwgsMexJ/.JkNQ7Oivgrd5NRuTllNIBiZWVeQmKqe', 'Jl. Pinus No. 8', '081234567897', 17),
(30, 'Dr. Indah', '$2y$10$K1rWTTFz8sjNyi8e9ekIXeYu0HijaWVfyE2aLYhEhZd3e8A.E7itC', 'Jl. Cendana No. 9', '081234567898', 20),
(32, 'Dr. Tompi', '$2y$10$ihChWa7XlQKUYg/eeqT5S.L2j7kwcDLYHr7nxJXSzvsvEI9NHKN3i', 'qwerty', '0987654', 21),
(34, 'Dr. Agus', '$2y$10$QIoPk9vvej22FjWmJth25OzPRvLXf0wH61dJVf9MhN./oLqVZ9hl6', 'Jl. kuningan', '08111111112', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(15, 26, 'Selasa', '08:00:00', '14:00:00', 'N'),
(17, 26, 'Kamis', '08:00:00', '14:00:00', 'N'),
(21, 34, 'Senin', '07:00:00', '09:00:00', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text DEFAULT NULL,
  `tgl_konsultasi` datetime NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `subject`, `pertanyaan`, `jawaban`, `tgl_konsultasi`, `id_pasien`, `id_dokter`) VALUES
(3, 'Gigi Sakit', 'Saya mempunyai lubang di gigi zzzz', 'turu', '2025-01-18 11:52:10', 18, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(11, 'Paracetamol', 'Kapsul', 41000),
(12, 'Ibuprofen', 'Kapsul', 52000),
(13, 'Amoxicillin', 'Tablet', 95500),
(14, 'Amoxicillin', 'Syrup', 50000),
(15, 'Ibuprofen', 'Syrup', 77000),
(16, 'Metronidazole', 'Syrup', 71000),
(17, 'Metronidazole', 'Salep', 28600),
(18, 'Paracetamol', 'Injeksi', 57000),
(19, 'Clindamycin', 'Salep', 88000),
(20, 'Vitamin C ', 'Syrup', 67700),
(22, 'Pregabalin', 'Injeksi', 97500),
(23, 'Aspirin', 'Syrup', 7000),
(24, 'Theophylline', 'Tablet', 60000),
(26, 'Panadol', 'Tablet', 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `password`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(18, 'agus', '202cb962ac59075b964b07152d234b70', 'Jl.kedewasaan No 12', '31213131', '0811111111', '202501-007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_daftar_poli` int(11) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`) VALUES
(6, 9, '2025-01-09 03:26:00', 'jaandpaonsdpanss', 245500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(10, 'Poli Gigi', 'Melayani perawatan gigi dan mulut seperti tambal gigi, cabut gigi, dan konsultasi kesehatan gigi.'),
(11, 'Poli Umum', 'Melayani pemeriksaan kesehatan umum seperti demam, batuk, flu, dan penyakit ringan lainnya.'),
(12, 'Poli Anak', 'Melayani kesehatan anak-anak, termasuk imunisasi, tumbuh kembang, dan penyakit anak.'),
(13, 'Poli Bedah', 'Lorem Ipsum dolor amet Lorem Ipsum dolor amet Lorem Ipsum dolor amet'),
(14, 'Poli Saraf', 'Melayani penyakit yang berhubungan dengan sistem saraf seperti migrain dan gangguan saraf lainnya.'),
(17, 'Poli Jantung', 'Menangani masalah kesehatan jantung seperti hipertensi dan gangguan irama jantung.'),
(18, 'Poli Kulit', 'Menangani masalah kulit seperti alergi, infeksi kulit, dan penyakit kulit lainnya.'),
(19, 'Poli THT', 'Melayani pemeriksaan telinga, hidung, dan tenggorokan, termasuk infeksi dan gangguan pendengaran.'),
(20, 'Poli Paru', 'Melayani penyakit saluran pernapasan seperti asma, bronkitis, dan TBC.'),
(21, 'Poli Mata', 'Menangani pemeriksaan mata, gangguan penglihatan, dan penyakit mata lainnya.'),
(22, 'Poli Penyakit Dalam', 'Menangani penyakit organ dalam seperti diabetes, hipertensi, dan gangguan pencernaan.'),
(23, 'Poli Radang', 'asfd');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `user_messages`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `user_messages` (
`id_pasien` int(10) unsigned
,`namaPasien` varchar(255)
,`id_dokter` int(10) unsigned
,`namaDokter` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `user_messages`
--
DROP TABLE IF EXISTS `user_messages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_messages`  AS SELECT DISTINCT `k`.`id_pasien` AS `id_pasien`, `p`.`nama` AS `namaPasien`, `k`.`id_dokter` AS `id_dokter`, `d`.`nama` AS `namaDokter` FROM ((`konsultasi` `k` left join `pasien` `p` on(`k`.`id_pasien` = `p`.`id`)) left join `dokter` `d` on(`k`.`id_dokter` = `d`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftarPoli_jadwal` (`id_jadwal`),
  ADD KEY `fk_daftarPoli_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailPeriksa_periksa` (`id_periksa`),
  ADD KEY `fk_detailPeriksa_obat` (`id_obat`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_poli` (`id_poli`);

--
-- Indeks untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_daftarPoli` (`id_daftar_poli`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftarPoli_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftarPoli_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detailPeriksa_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_detailPeriksa_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_dokter_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Ketidakleluasaan untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_daftarPoli` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
