-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2022 pada 09.09
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databases_ahmad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi`
--

CREATE TABLE IF NOT EXISTS `data_absensi` (
  `id_absensi` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `id_guru` varchar(50) DEFAULT NULL,
  `status` enum('hadir','sakit','izin','alfa','cuti') DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absensi`
--

INSERT INTO `data_absensi` (`id_absensi`, `tanggal`, `jam`, `id_guru`, `status`, `latitude`, `longitude`) VALUES
('ABS20221212123719821', '2022-12-12', '12:37:19', 'GUR20221210050141916', 'hadir', '-1.616695', '103.623642'),
('ABS20221212064057185', '2022-12-21', '06:40:57', 'SIS20210512102810533', '', '-1.616695', '103.623642');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE IF NOT EXISTS `data_admin` (
  `id_admin` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `no_telepon` varchar(50) DEFAULT NULL,
  `hak_akses` enum('admin','kepsek') NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama`, `alamat`, `no_telepon`, `hak_akses`, `username`, `password`) VALUES
('ADM20210512101743582', 'admin', 'admin\r\n', '085369237896', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('ADM20221210042504524', 'Suburhanuddin', 'Nusa Tenggara Baarat', '08xx-xxxx-xxxx', 'kepsek', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE IF NOT EXISTS `data_guru` (
  `id_guru` varchar(50) DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `id_jabatan` varchar(50) DEFAULT NULL,
  `id_status_guru` varchar(50) DEFAULT NULL,
  `id_tahun_kerja` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nis`, `nama`, `alamat`, `jenis_kelamin`, `id_jabatan`, `id_status_guru`, `id_tahun_kerja`, `username`, `password`) VALUES
('SIS20210512102810533', '8443958', 'Andi', 'jambi\r\n', 'laki-laki', 'JAB20220519162730168', 'JUR20210610001029924', 'TAH20210512102638950', '', ''),
('SIS20210604092046536', '8443959', 'Ali', 'Jambi', 'laki-laki', 'JAB20220519162730168', 'JUR20210610001029924', 'TAH20210512102638950', '', ''),
('SIS20210604092102151', '8443952', 'Bambang', 'Jambi', 'laki-laki', 'JAB20220519162730168', 'JUR20210610001029924', 'TAH20210512102638950', '', ''),
('SIS20210608174145544', '8443953', 'fajar', 'jambi', 'laki-laki', 'JAB20220519162730168', 'JUR20210610001029924', 'TAH20210512102638950', '', ''),
('GUR20221210050141916', '12345678910', 'ridho', 'jambi', 'laki-laki', 'JAB20220519162730168', 'JUR20210610001029924', 'TAH20210512102638950', 'ridho', '926a161c6419512d711089538c80ac70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE IF NOT EXISTS `data_jabatan` (
  `id_jabatan` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `jabatan`) VALUES
('KEL20210604091706937', 'Admin'),
('JAB20220519162730168', 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal`
--

CREATE TABLE IF NOT EXISTS `data_jadwal` (
  `id_jadwal` varchar(50) DEFAULT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','mingu') DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `id_jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `hari`, `jam`, `id_jabatan`) VALUES
('JAD20210512102730498', 'senin', '08:00', 'JAB20220519162730168'),
('JAD20210604091921706', 'selasa', '08:00', 'JAB20220519162730168'),
('JAD20210604091934813', 'rabu', '08:00', 'JAB20220519162730168'),
('JAD20210604091948341', 'kamis', '08:00', 'KEL20210512102626849'),
('JAD20210604092002900', 'jumat', '08:00', 'KEL20210512102626849'),
('JAD20210604092016761', 'sabtu', '08:00', 'KEL20210512102626849');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_status_guru`
--

CREATE TABLE IF NOT EXISTS `data_status_guru` (
  `id_status_guru` varchar(50) DEFAULT NULL,
  `status_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_status_guru`
--

INSERT INTO `data_status_guru` (`id_status_guru`, `status_guru`) VALUES
('JUR20210610001029924', 'Tetap'),
('JUR20210610001036164', 'Tidak Tetap'),
('JUR20210610001046284', 'Kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tahun_kerja`
--

CREATE TABLE IF NOT EXISTS `data_tahun_kerja` (
  `id_tahun_kerja` varchar(50) DEFAULT NULL,
  `tahun_kerja` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tahun_kerja`
--

INSERT INTO `data_tahun_kerja` (`id_tahun_kerja`, `tahun_kerja`) VALUES
('TAH20210512102638950', '2022');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
