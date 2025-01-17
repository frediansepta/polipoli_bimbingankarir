-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2025 at 04:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int UNSIGNED NOT NULL,
  `id_pasien` int UNSIGNED NOT NULL,
  `id_jadwal` int UNSIGNED NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_antrian` int UNSIGNED NOT NULL,
  `status_periksa` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `status_periksa`) VALUES
(1, 1, 3, 'Gigi sakit buat ngunyah', 1, '1'),
(2, 4, 5, 'Mata sakit susah dibuka dan merah', 1, '1'),
(3, 5, 7, 'Gigi sensitif dengan suhu dingin', 1, '1'),
(4, 1, 7, 'Gigi bengkak', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int NOT NULL,
  `id_periksa` int NOT NULL,
  `id_obat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(1, 1, 3),
(2, 2, 8),
(3, 3, 3),
(4, 4, 1),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_poli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `password`, `alamat`, `no_hp`, `id_poli`) VALUES
(1, 'Fredian', 'ae62850e1b16588b2dbfee8727b5a8f4', 'Jl. Gatot Subroto, Kota Semarang, Jawa Tengah', '085728409680', 1),
(2, 'Zidan', 'a2ac5b34a3c62d8eff80d642cb7ad372', 'Jl. Kesana Kemari, Semarang', '09898767', 1),
(3, 'Alex', 'a08372b70196c21a9229cf04db6b7ceb', 'Jl. Buntu II, Pati Bumi Mina Tani', '089877786555', 4),
(4, 'Dedy', 'adb5b61ee5d7a2493572843f091c87f3', 'Jl. Nusa bangsa, Semarang', '087965794231', 1),
(5, 'Marsel', '16e33da965fc503ad5c1449741d1924b', 'Jl. Muncak 1, Semarang', '08987987', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int UNSIGNED NOT NULL,
  `id_dokter` int NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(1, 1, 'Jumat', '07:30:00', '10:00:00', 'N'),
(2, 1, 'Sabtu', '08:00:00', '12:00:00', 'N'),
(3, 1, 'Kamis', '18:30:00', '20:30:00', 'N'),
(4, 4, 'Senin', '12:00:00', '15:00:00', 'Y'),
(5, 5, 'Rabu', '12:00:00', '15:00:00', 'Y'),
(6, 5, 'Jumat', '07:00:00', '09:00:00', 'N'),
(7, 1, 'Rabu', '12:00:00', '14:00:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int NOT NULL,
  `nama_obat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kemasan` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(1, 'Vitacimin', 'Kaplet', 5000),
(2, 'Sangobion', 'Tablet', 10000),
(3, 'Hexadol', 'Botol', 20000),
(4, 'Amoxicillin', 'Tablet', 15000),
(6, 'Loperamide', 'Tablet', 5000),
(7, 'Paracetamol', 'Tablet', 15000),
(8, 'Insto', 'Botol', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `password`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(1, 'Yogi', '938e14c074c45c62eb15cc05a6f36d79', 'Sukolilo', '331811111', '0898989000', '202412-001'),
(2, 'Iwer', '1d7da710a4565dfbe1a9d5149bae965b', 'Ngaliyan', '3318111117770', '082223766881', '202412-002'),
(3, 'Karina', 'b0e8a3d7b0f5004fcb918eafbdaeb741', 'Pati', '3311133331113331', '0871289064', '202412-003'),
(4, 'Agus', 'b42935f6ae1e4c4190b6457f11496645', 'Jl. Gembong, Seamarang', '331811117654321', '0897654321', '202412-004'),
(5, 'Karin', '97468f1980416a4376b44e701d25f24b', 'JL kenangan', '123456', '09876876', '202501-005');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int NOT NULL,
  `id_daftar_poli` int UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `biaya_periksa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`) VALUES
(1, 1, '2024-12-12 08:30:00', 'jangan begadang dan minum es batu', 170000),
(2, 2, '2024-12-18 08:00:00', 'Jangan berkendara tidak menggunakan kaca helm, mata jangan di gosok dan tidur tepat waktu', 158000),
(3, 3, '2025-01-02 20:50:00', 'Jangan mengkonsumsi es dan istirahat cukup', 170000),
(4, 4, '2025-01-17 22:51:00', 'Jangan makan coklat', 165000);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int NOT NULL,
  `nama_poli` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Poli Gigi', 'Poliklinik untuk penanganan pasien penderita penyakit gigi\r\n'),
(2, 'Poli Anak', 'Poliklinik khusus penderita dibawah 10 Tahun\r\n'),
(3, 'Poli Gizi', 'Poliklinik untuk kesehatan gizi agar membaik'),
(4, 'Poli Umum', 'Poliklinik untuk menangani semuanya\r\n'),
(5, 'Poli Mata', 'Poliklinik khusus untuk mata\r\n'),
(6, 'Poli IGD', 'Poliklinik kusus untuk pasien gawat darurat dan butuh banget pertolongan\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftarPoli_jadwal` (`id_jadwal`),
  ADD KEY `fk_daftarPoli_pasien` (`id_pasien`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailPeriksa_periksa` (`id_periksa`),
  ADD KEY `fk_detailPeriksa_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_poli` (`id_poli`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_daftarPoli` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftarPoli_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftarPoli_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detailPeriksa_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_detailPeriksa_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_dokter_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_daftarPoli` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
