-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Waktu pembuatan: 15 Bulan Mei 2022 pada 00.15
-- Versi server: 8.0.29
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kandidat`
--

CREATE TABLE `data_kandidat` (
  `id_kandidat` int NOT NULL,
  `no_urut` int NOT NULL,
  `nama_kandidat` varchar(255) NOT NULL,
  `visi_misi` varchar(500) NOT NULL,
  `priode` varchar(100) NOT NULL,
  `gambar_kandidat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `data_kandidat`
--

INSERT INTO `data_kandidat` (`id_kandidat`, `no_urut`, `nama_kandidat`, `visi_misi`, `priode`, `gambar_kandidat`, `created_at`, `updated_at`) VALUES
(3, 1, 'Deddy dan indah', '<p><b>Visi misi kami adalah</b></p><ul><li>membangun siswa organisasi yang baik</li><li>mensejahterakan siswa</li></ul>', '2022-03', '1646296006_aad71230754115bd4ad9.jpg', NULL, NULL),
(4, 2, 'AGEH DAN BLIGEH', '<p><b>VISI MISI :</b></p><ul><li><b>test</b></li><li><b>cek</b></li></ul>', '2022-03', '1646474732_f6776f8e08840cf334e1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int NOT NULL,
  `siswa_userid` int NOT NULL,
  `nis_siswa` varchar(50) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `status_memilih` varchar(50) NOT NULL,
  `tahun` date NOT NULL,
  `status_aktif` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `siswa_userid`, `nis_siswa`, `nama_siswa`, `kelas`, `jenis_kelamin`, `status_memilih`, `tahun`, `status_aktif`, `created_at`, `updated_at`) VALUES
(98, 102, '4126', 'FADILATUS AINI', 'XI IPA 3', 'P', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:01', NULL),
(99, 103, '4128', 'INTAN YUNIAR', 'XI IPA 3', 'P', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:02', NULL),
(100, 104, '4129', 'JUITA PURNAMA SARI', 'XI IPA 3', 'P', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:02', NULL),
(101, 105, '4133', 'MOH. FARIS', 'XI IPA 3', 'L', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:02', NULL),
(102, 106, '4137', 'NIA NOR AGUSTIN', 'XI IPA 3', 'P', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:03', NULL),
(103, 107, '4138', 'NISWATUN HASANAH', 'XI IPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:04', NULL),
(104, 108, '4140', 'OKTAFIYA SUCI WULANDARI', 'XI IPA 3', 'P', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:06', NULL),
(105, 109, '4152', 'ACHMAD GUFRON', 'XI IPA 4', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:06', NULL),
(106, 110, '4158', 'DIMAS HANAFI PUTRA', 'XI IPA 4', 'L', 'sudah', '2022-03-03', 'aktif', '2022-03-03 04:06:06', NULL),
(107, 111, '4171', 'PRIMA MAULANA', 'XI IPA 4', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:06', NULL),
(108, 112, '4178', 'ACH. ADI IRAWAN', 'XI IPS 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:07', NULL),
(109, 113, '4182', 'DESTY SALIMAH', 'XI IPS 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:07', NULL),
(110, 114, '4197', 'NOVA FITRIYANTI', 'XI IPS 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:07', NULL),
(111, 115, '4208', 'ALFIANA RISKA DEWI', 'XI IPS 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:08', NULL),
(112, 116, '4219', 'MAULIDINA MELLIYA FITRIYANTI', 'XI IPS 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:08', NULL),
(113, 117, '4225', 'RUMYATI', 'XI IPS 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:08', NULL),
(114, 118, '4226', 'SALSABILA FAID FAIZAH', 'XI IPS 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:09', NULL),
(115, 119, '4233', 'ACH. FATIRUS SHOLIHIN', 'XI IPS 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:09', NULL),
(116, 120, '4235', 'AFRISAL DWI YULIANTO', 'XI IPS 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:09', NULL),
(117, 121, '4242', 'ISMI TRI UTAMI', 'XI IPS 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:10', NULL),
(118, 122, '4251', 'NUR AFNI OKTAVIA PUTRI', 'XI IPS 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:10', NULL),
(119, 123, '4263', 'ALIATRI WULANDARI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:10', NULL),
(120, 124, '4266', 'AMELIA INDAH LINTANG SARI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:10', NULL),
(121, 125, '4268', 'ASRI WAHYUNI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:11', NULL),
(122, 126, '4269', 'CARLA NURLITA VELY UTAMI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:11', NULL),
(123, 127, '4270', 'CICI WASILATUL FITRIYAH', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:12', NULL),
(124, 128, '4273', 'MAULANDIA SARI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:13', NULL),
(125, 129, '4274', 'MERY SARTIKA WULANDARI', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:13', NULL),
(126, 130, '4275', 'MOH RIFQI ARDIANSYAH', 'X MIPA 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:14', NULL),
(127, 131, '4281', 'NURUN ALFIZAH', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:14', NULL),
(128, 132, '4283', 'RIKA DWI JUM\'ASIATUN FITRIYAH', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:15', NULL),
(129, 133, '4286', 'SASTRIO PRIABUDI', 'X MIPA 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(130, 134, '4290', 'ZAHROTUL JANNAH', 'X MIPA 1', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(131, 135, '4291', 'ABU BAKAR', 'X MIPA 2', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(132, 136, '4296', 'ARDIYAN', 'X MIPA 2', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(133, 137, '4297', 'CHAMYLIA SAFITRI SHOLIKHIN', 'X MIPA 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(134, 138, '4302', 'DWI OKTAVIANA RIMADANI S.', 'X MIPA 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:16', NULL),
(135, 139, '4313', 'NURI KOMROATUL SYISWA', 'X MIPA 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:17', NULL),
(136, 140, '4314', 'NURUL AINI', 'X MIPA 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:17', NULL),
(137, 141, '4317', 'SALSABILA HIDAYATI', 'X MIPA 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:17', NULL),
(138, 142, '4318', 'SEPTIAN ANDRIYANTO', 'X MIPA 2', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:17', NULL),
(139, 143, '4328', 'MEGA SAPUTRI', 'X MIPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:18', NULL),
(140, 144, '4332', 'MUSTAFIDATUL AINI', 'X MIPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:19', NULL),
(141, 145, '4335', 'NOVIANTI', 'X MIPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:20', NULL),
(142, 146, '4343', 'SUFIATUN HASANAH', 'X MIPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(143, 147, '4344', 'SUSIANA RISKA', 'X MIPA 3', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(144, 148, '4355', 'MARIDA SABRINA PUTRI', 'X MIPA 4', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(145, 149, '4371', 'SITI USWATUN HASANAH', 'X MIPA 4', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(146, 150, '4398', 'ALIFIA DWITA RAMADHANTI', 'X IPS 2', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(147, 151, '4388', 'MOH. ARIF HIDAYATULLAH', 'X IPS 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:21', NULL),
(148, 152, '4389', 'MOHAMAD RIZALDI', 'X IPS 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(149, 153, '4393', 'SAURI HIDAYATULLAH', 'X IPS 1', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(150, 154, '4394', 'SUHARTONO', 'X IPS 1', 'L ', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(151, 155, '4357', 'MOH. ABDUL KARIM YAKIN', 'X MIPA 4', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(152, 156, '4365', 'NURUL IKHSAN', 'X MIPA 4', 'P', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(153, 157, '4373', 'TEGAR SYUHADA ARIFIN', 'X MIPA 4', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(154, 158, '4319', 'ADI RIYAN HIDAYAT', 'X MIPA 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(155, 159, '4323', 'FADIL BAITUL RAHMAN', 'X MIPA 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:22', NULL),
(156, 160, '4327', 'M. RIEZKY ARYA PRATAMA', 'X MIPA 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(157, 161, '4329', 'MOH RIKI APRIYANTO', 'X MIPA 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(158, 162, '4330', 'MOHAMMAD IQBAL FERDIANSYAH', 'X MIPA 3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(159, 163, '4334', 'NOVAL GUNAWAN JAMIL', 'X MIPA3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(160, 164, '4336', 'RICKY PERMADI', 'X MIPA3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(161, 165, '4337', 'RIZQI RANA ASMAWAN', 'X MIPA3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(162, 166, '4338', 'RUSPANDI', 'X MIPA3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:23', NULL),
(163, 167, '4345', 'SYAMSUL ARIFIN', 'X MIPA3', 'L', 'belum', '2022-03-03', 'aktif', '2022-03-03 04:06:24', NULL),
(164, 168, '3121', 'fina', 'X MIPA 2', 'P', 'belum', '2023-01-05', 'aktif', '2022-03-05 04:19:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_suara`
--

CREATE TABLE `data_suara` (
  `id_suara` int NOT NULL,
  `id_pemilih` int NOT NULL,
  `no_urut` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `data_suara`
--

INSERT INTO `data_suara` (`id_suara`, `id_pemilih`, `no_urut`, `created_at`) VALUES
(6, 98, 1, '2022-03-04 19:37:52'),
(7, 99, 1, '2022-03-04 22:24:11'),
(8, 104, 1, '2022-03-04 22:27:54'),
(9, 102, 2, '2022-03-04 22:38:01'),
(10, 100, 2, '2022-03-05 04:01:14'),
(11, 106, 2, '2022-03-05 04:07:19'),
(12, 101, 1, '2022-03-07 05:19:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X IPA 1'),
(2, 'X IPA 2'),
(3, 'X IPA 3'),
(4, 'X IPA 4'),
(5, 'XI IPA 1'),
(6, 'XI IPA 2'),
(7, 'XI IPA 3'),
(8, 'XI IPA 4'),
(9, 'XII IPA 1'),
(10, 'XII IPA 2'),
(11, 'XII IPA 3'),
(12, 'XII IPA 4'),
(13, 'X MIPA 1'),
(14, 'X MIPA 2'),
(15, 'X MIPA 3'),
(16, 'X MIPA 4'),
(17, 'XI MIPA 1'),
(18, 'XI MIPA 2'),
(19, 'XI MIPA 3'),
(20, 'XI MIPA 4'),
(21, 'XII MIPA 1'),
(22, 'XII MIPA 2'),
(23, 'XII MIPA 3'),
(24, 'XII MIPA 4'),
(25, 'X IPS 1'),
(26, 'X IPS 2'),
(27, 'X IPS 3'),
(28, 'X IPS 4'),
(29, 'XI IPS 1'),
(30, 'XI IPS 2'),
(36, 'XI IPS 3'),
(37, 'XI IPS 4'),
(38, 'XII IPS 1'),
(39, 'XII IPS 2'),
(40, 'XII IPS 3'),
(41, 'XII IPS 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL,
  `judul_p` varchar(100) DEFAULT NULL,
  `deskripsi_p` varchar(100) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_tutup` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_p`, `deskripsi_p`, `tgl_mulai`, `tgl_tutup`, `created_at`, `update_at`) VALUES
(1, 'Kita bukan ya ges ya', '<p>tak usa wat rowat kalak tai santai pokok mareh&nbsp;</p>', '2022-05-15 05:55:00', '2022-05-23 08:56:00', '2022-05-15 05:55:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_vote` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status_vote`, `level`, `created_at`, `updated_at`) VALUES
(93, 'admin', 'admin', '-', '1', '2022-03-03 10:37:25', '2022-03-03 10:37:25'),
(102, '4126', '23239', 'sudah', '2', '2022-03-03 04:06:01', NULL),
(103, '4128', '23240', 'sudah', '2', '2022-03-03 04:06:02', NULL),
(104, '4129', '23241', 'sudah', '2', '2022-03-03 04:06:02', NULL),
(105, '4133', '23242', 'sudah', '2', '2022-03-03 04:06:02', NULL),
(106, '4137', '23243', 'sudah', '2', '2022-03-03 04:06:03', NULL),
(107, '4138', '23244', 'belum', '2', '2022-03-03 04:06:04', NULL),
(108, '4140', '23245', 'sudah', '2', '2022-03-03 04:06:06', NULL),
(109, '4152', '23246', 'belum', '2', '2022-03-03 04:06:06', NULL),
(110, '4158', '23247', 'sudah', '2', '2022-03-03 04:06:06', NULL),
(111, '4171', '23248', 'belum', '2', '2022-03-03 04:06:06', NULL),
(112, '4178', '23249', 'belum', '2', '2022-03-03 04:06:07', NULL),
(113, '4182', '23250', 'belum', '2', '2022-03-03 04:06:07', NULL),
(114, '4197', '23251', 'belum', '2', '2022-03-03 04:06:07', NULL),
(115, '4208', '23252', 'belum', '2', '2022-03-03 04:06:08', NULL),
(116, '4219', '23253', 'belum', '2', '2022-03-03 04:06:08', NULL),
(117, '4225', '23254', 'belum', '2', '2022-03-03 04:06:08', NULL),
(118, '4226', '23255', 'belum', '2', '2022-03-03 04:06:09', NULL),
(119, '4233', '23256', 'belum', '2', '2022-03-03 04:06:09', NULL),
(120, '4235', '23257', 'belum', '2', '2022-03-03 04:06:09', NULL),
(121, '4242', '23258', 'belum', '2', '2022-03-03 04:06:10', NULL),
(122, '4251', '23259', 'belum', '2', '2022-03-03 04:06:10', NULL),
(123, '4263', '23260', 'belum', '2', '2022-03-03 04:06:10', NULL),
(124, '4266', '23261', 'belum', '2', '2022-03-03 04:06:10', NULL),
(125, '4268', '23262', 'belum', '2', '2022-03-03 04:06:11', NULL),
(126, '4269', '23263', 'belum', '2', '2022-03-03 04:06:11', NULL),
(127, '4270', '23264', 'belum', '2', '2022-03-03 04:06:12', NULL),
(128, '4273', '23265', 'belum', '2', '2022-03-03 04:06:13', NULL),
(129, '4274', '23266', 'belum', '2', '2022-03-03 04:06:13', NULL),
(130, '4275', '23267', 'belum', '2', '2022-03-03 04:06:14', NULL),
(131, '4281', '23268', 'belum', '2', '2022-03-03 04:06:14', NULL),
(132, '4283', '23269', 'belum', '2', '2022-03-03 04:06:15', NULL),
(133, '4286', '23270', 'belum', '2', '2022-03-03 04:06:16', NULL),
(134, '4290', '23271', 'belum', '2', '2022-03-03 04:06:16', NULL),
(135, '4291', '23272', 'belum', '2', '2022-03-03 04:06:16', NULL),
(136, '4296', '23273', 'belum', '2', '2022-03-03 04:06:16', NULL),
(137, '4297', '23274', 'belum', '2', '2022-03-03 04:06:16', NULL),
(138, '4302', '23275', 'belum', '2', '2022-03-03 04:06:16', NULL),
(139, '4313', '23276', 'belum', '2', '2022-03-03 04:06:17', NULL),
(140, '4314', '23277', 'belum', '2', '2022-03-03 04:06:17', NULL),
(141, '4317', '23278', 'belum', '2', '2022-03-03 04:06:17', NULL),
(142, '4318', '23279', 'belum', '2', '2022-03-03 04:06:17', NULL),
(143, '4328', '23280', 'belum', '2', '2022-03-03 04:06:18', NULL),
(144, '4332', '23281', 'belum', '2', '2022-03-03 04:06:19', NULL),
(145, '4335', '23282', 'belum', '2', '2022-03-03 04:06:20', NULL),
(146, '4343', '23283', 'belum', '2', '2022-03-03 04:06:21', NULL),
(147, '4344', '23284', 'belum', '2', '2022-03-03 04:06:21', NULL),
(148, '4355', '23285', 'belum', '2', '2022-03-03 04:06:21', NULL),
(149, '4371', '23286', 'belum', '2', '2022-03-03 04:06:21', NULL),
(150, '4398', '23287', 'belum', '2', '2022-03-03 04:06:21', NULL),
(151, '4388', '23288', 'belum', '2', '2022-03-03 04:06:21', NULL),
(152, '4389', '23289', 'belum', '2', '2022-03-03 04:06:22', NULL),
(153, '4393', '23290', 'belum', '2', '2022-03-03 04:06:22', NULL),
(154, '4394', '23291', 'belum', '2', '2022-03-03 04:06:22', NULL),
(155, '4357', '23292', 'belum', '2', '2022-03-03 04:06:22', NULL),
(156, '4365', '23293', 'belum', '2', '2022-03-03 04:06:22', NULL),
(157, '4373', '23294', 'belum', '2', '2022-03-03 04:06:22', NULL),
(158, '4319', '23295', 'belum', '2', '2022-03-03 04:06:22', NULL),
(159, '4323', '23296', 'belum', '2', '2022-03-03 04:06:22', NULL),
(160, '4327', '23297', 'belum', '2', '2022-03-03 04:06:23', NULL),
(161, '4329', '23298', 'belum', '2', '2022-03-03 04:06:23', NULL),
(162, '4330', '23299', 'belum', '2', '2022-03-03 04:06:23', NULL),
(163, '4334', '23300', 'belum', '2', '2022-03-03 04:06:23', NULL),
(164, '4336', '23301', 'belum', '2', '2022-03-03 04:06:23', NULL),
(165, '4337', '23302', 'belum', '2', '2022-03-03 04:06:23', NULL),
(166, '4338', '23303', 'belum', '2', '2022-03-03 04:06:23', NULL),
(167, '4345', '23304', 'belum', '2', '2022-03-03 04:06:24', NULL),
(168, '3121', '12345', 'belum', '2', '2022-03-05 04:19:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kandidat`
--
ALTER TABLE `data_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_userid` (`siswa_userid`);

--
-- Indeks untuk tabel `data_suara`
--
ALTER TABLE `data_suara`
  ADD PRIMARY KEY (`id_suara`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kandidat`
--
ALTER TABLE `data_kandidat`
  MODIFY `id_kandidat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `data_suara`
--
ALTER TABLE `data_suara`
  MODIFY `id_suara` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`siswa_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
