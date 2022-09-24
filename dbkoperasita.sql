-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jun 2019 pada 17.40
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbkoperasita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `nomor_telepon` varchar(16) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jk`, `nomor_telepon`, `jabatan`) VALUES
('AGT001', 'Taufiq', 'L', '089631739182', 'It Support'),
('AGT002', 'Tebe', 'L', '089631739182', 'It Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjaman`
--

CREATE TABLE IF NOT EXISTS `detail_pinjaman` (
`id_ktpinjm` int(11) NOT NULL,
  `idpinjm` varchar(15) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjaman`
--

INSERT INTO `detail_pinjaman` (`id_ktpinjm`, `idpinjm`, `jumlah`, `bulan`, `tahun`) VALUES
(1, 'PJM0001', '5000', '06', '2019'),
(2, 'PJM0001', '5000', '07', '2019'),
(3, 'PJM0002', '5000', '08', '2019'),
(4, 'PJM0002', '5000', '09', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_simpanan_wajib`
--

CREATE TABLE IF NOT EXISTS `master_simpanan_wajib` (
  `id_mst_swjib` varchar(15) NOT NULL,
  `tahun` varchar(6) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_simpanan_wajib`
--

INSERT INTO `master_simpanan_wajib` (`id_mst_swjib`, `tahun`, `jumlah`) VALUES
('SW001', '2019', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_pinjaman`
--

CREATE TABLE IF NOT EXISTS `pembayaran_pinjaman` (
  `id_byr` varchar(15) NOT NULL,
  `id_ktpinjm` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_byr` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_pinjaman`
--

INSERT INTO `pembayaran_pinjaman` (`id_byr`, `id_ktpinjm`, `status`, `tanggal_byr`) VALUES
('BYR0001', '1', 'Lunas', '2019-05-22'),
('BYR0002', '2', 'Lunas', '2019-05-22'),
('BYR0003', '3', 'Lunas', '2019-05-22'),
('BYR0004', '4', 'Lunas', '2019-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjm` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjm`, `id_anggota`, `jumlah`, `tanggal`, `ket`, `alasan`) VALUES
('PJM0001', 'AGT001', '10000', '2019-05-22', 'lunas', 'apa aja'),
('PJM0002', 'AGT002', '10000', '2019-05-22', 'lunas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_pokok`
--

CREATE TABLE IF NOT EXISTS `simpanan_pokok` (
  `id_spokok` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan_pokok`
--

INSERT INTO `simpanan_pokok` (`id_spokok`, `id_anggota`, `jumlah`, `tanggal`) VALUES
('SP001', 'AGT001', '100000', '2019-05-08'),
('SP002', 'AGT002', '100000', '2019-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_wajib`
--

CREATE TABLE IF NOT EXISTS `simpanan_wajib` (
  `id_swajib` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `id_mst_swjib` varchar(15) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan_wajib`
--

INSERT INTO `simpanan_wajib` (`id_swajib`, `id_anggota`, `id_mst_swjib`, `tanggal`, `bulan`, `tahun`) VALUES
('SWA0001', 'AGT001', 'SW001', '2019-05-22', '05', '2019'),
('SWA0002', 'AGT002', 'SW001', '2019-05-22', '05', '2019'),
('SWA0003', 'AGT001', 'SW001', '2019-05-22', '06', '2019'),
('SWA0004', 'AGT002', 'SW001', '2019-05-22', '06', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `keterangan`, `id_user`) VALUES
('admin', 'admin', 'admin', 'admin'),
('topik', 'topik', 'keuangan', 'keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
 ADD PRIMARY KEY (`id_ktpinjm`);

--
-- Indexes for table `master_simpanan_wajib`
--
ALTER TABLE `master_simpanan_wajib`
 ADD PRIMARY KEY (`id_mst_swjib`);

--
-- Indexes for table `pembayaran_pinjaman`
--
ALTER TABLE `pembayaran_pinjaman`
 ADD PRIMARY KEY (`id_byr`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`id_pinjm`);

--
-- Indexes for table `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
 ADD PRIMARY KEY (`id_spokok`);

--
-- Indexes for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
 ADD PRIMARY KEY (`id_swajib`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
MODIFY `id_ktpinjm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
