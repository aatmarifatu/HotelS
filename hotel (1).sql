-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2022 pada 05.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas_hotel` int(10) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas_hotel`, `nama_fasilitas`, `deskripsi`, `foto`) VALUES
(6, 'Gym Room', 'Pusat kebugaran yang berguna bagi tamu untuk aktivitas fisik maupun berolahraga', 'gymroom.jpg'),
(11, 'Taman', 'Nyaman untuk mencari kesegaran', 'taman.jpg'),
(12, 'Parkiran', 'Memiliki parkiran yang luas', 'parkiran.jpg'),
(13, 'Kolam Renang', 'Kolam renang yang memiliki kedalaman 2,5 m', 'kolamrenang.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1232, 'Aat', '202cb962ac59075b964b07152d234b70', 'Aat Marifatu', 'admin'),
(1233, 'Marifa', '202cb962ac59075b964b07152d234b70', 'Aat Marifatu', 'petugas'),
(1234, 'Resepsionis', '81dc9bdb52d04dc20036dbd8313ed055', 'Febi', 'resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `tipe_kamar` varchar(200) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email_pemesan` varchar(50) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `cek-in` date NOT NULL,
  `cek-out` date NOT NULL,
  `jumlah_kamar` int(10) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `total` bigint(15) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tipe_kamar`, `nik`, `nama_pemesan`, `email_pemesan`, `nama_tamu`, `no_tlp`, `cek-in`, `cek-out`, `jumlah_kamar`, `harga_kamar`, `total`, `status`) VALUES
(5, '', '', 'robi', 'oby@gmail.com', 'Robi', 0, '2022-05-23', '2022-05-24', 1, 0, 0, 'selesai'),
(6, '', '', 'yaya', 'yyy@gmail.com', 'iyaa', 0, '2022-05-23', '2022-05-24', 1, 0, 0, 'selesai'),
(7, '', '', 'yaya', 'yyy@gmail.com', 'iyaa', 0, '2022-05-23', '2022-05-24', 1, 0, 100000, ''),
(8, '', '', 'yaya', 'yyy@gmail.com', 'iyaa', 0, '2022-05-23', '2022-05-24', 1, 0, 0, ''),
(9, '', '', 'yaya', 'yyy@gmail.com', 'iyaa', 0, '2022-05-23', '2022-05-24', 2, 0, 400000, ''),
(10, '', '', 'una', 'yyy@gmail.com', 'nana', 0, '2022-05-23', '2022-05-24', 2, 0, 200000, ''),
(11, '', '', 'jihyu', 'huyi@gmail', 'yuuyu', 0, '2022-05-24', '2022-05-25', 1, 200000, 200000, '');

--
-- Trigger `reservasi`
--
DELIMITER $$
CREATE TRIGGER `triger_hotel` AFTER UPDATE ON `reservasi` FOR EACH ROW BEGIN
if new.status='cek-in' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
if new.status='cek-out' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
if new.status='selesai' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `no_kamar` char(11) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga_kamar` int(100) NOT NULL,
  `jumlahkamar` int(10) NOT NULL,
  `fasilitas_kamar` varchar(50) NOT NULL,
  `status_kamar` enum('tersedia','dipesan','ditempati') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`no_kamar`, `tipe_kamar`, `deskripsi`, `harga_kamar`, `jumlahkamar`, `fasilitas_kamar`, `status_kamar`, `foto`) VALUES
('001', 'Deluxe', 'Memiliki kamar yang cukup luas', 200000, 4, 'AC, Air mineral gratis, Area meja kerja yang luas,', 'tersedia', 'Deluxe Room.jpg'),
('003', 'Single Room', 'Tersedia satu tempat tidur untuk satu orang', 100000, 2, 'AC, Air Mineral Gratis, Area Meja Kerja yang Luas,', 'tersedia', 'Single Room.jpg'),
('022', 'Superior', 'Tidak hanya memiliki kamar yang luas kamar ini menawarkan pemandangan yang indah', 300000, 2, 'AC, Air mineral garatis, Area meja kerja yang luas', 'tersedia', 'GrandMillennium-22_3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_kamar` (`tipe_kamar`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
