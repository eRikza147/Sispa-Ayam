-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2024 pada 14.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sispaayam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `login_id` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`login_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(6) NOT NULL,
  `nm_gejala` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nm_gejala`) VALUES
('G001', 'Ngorok Basah'),
('G002', 'Leleran hidung lengket'),
('G003', 'Terdapat eskudat berbuih pada mata'),
('G004', 'Menggeleng-gelengkan kepala'),
('G005', 'Mengeluarkan nanah dari hidung'),
('G006', 'Mengengap-engap'),
('G007', 'Batuk'),
('G008', 'Bersin'),
('G009', 'Ayam tampak lesu dan mengantuk'),
('G010', 'Nafsu makan menurun'),
('G011', 'Mencret'),
('G012', 'Jengger dan kepala kebiruan'),
('G013', 'Kornea menjadi keruh'),
('G014', 'Sayap turun'),
('G015', 'Otot tubuh gemetar'),
('G016', 'Kejang-kejang'),
('G017', 'Bulu tampak kusam'),
('G018', 'Diare berlendir mengotori bulu pantat'),
('G019', 'Peradangan disekitar dubur dan kloaka'),
('G020', 'Mematok dubur sendiri'),
('G021', 'Paruh menempel dilantai ketika tidur'),
('G022', 'Kotoran berwarna putih'),
('G023', 'Kotoran menepel disekitar dubur'),
('G024', 'Kloaka tampak putih'),
('G025', 'Jengger berwarna keabuan'),
('G026', 'Mata menutup'),
('G027', 'Luka bergerombol'),
('G028', 'Lumpuh'),
('G029', 'Pendarahan Gusi'),
('G030', 'Pendarahan hidung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(6) NOT NULL,
  `id_penyakit` varchar(6) NOT NULL,
  `id_gejala` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `id_penyakit`, `id_gejala`) VALUES
(9, 'P001', 'G018'),
(10, 'P005', 'G001'),
(11, 'P005', 'G002'),
(12, 'P005', 'G003'),
(13, 'P005', 'G004'),
(14, 'P001', 'G028'),
(15, 'P001', 'G029'),
(16, 'P001', 'G030'),
(17, 'P001', 'G012'),
(18, 'P001', 'G019'),
(19, 'P005', 'G005'),
(20, 'P005', 'G009'),
(22, 'P002', 'G006'),
(23, 'P002', 'G007'),
(24, 'P002', 'G008'),
(25, 'P002', 'G009'),
(26, 'P002', 'G010'),
(27, 'P002', 'G011'),
(28, 'P002', 'G012'),
(29, 'P002', 'G013'),
(30, 'P002', 'G014'),
(31, 'P002', 'G015'),
(32, 'P002', 'G016'),
(33, 'P003', 'G009'),
(34, 'P003', 'G010'),
(36, 'P003', 'G017'),
(37, 'P003', 'G018'),
(38, 'P003', 'G019'),
(39, 'P003', 'G020'),
(40, 'P003', 'G021'),
(41, 'P003', 'G022'),
(42, 'P004', 'G009'),
(43, 'P004', 'G010'),
(44, 'P004', 'G014'),
(45, 'P004', 'G017'),
(46, 'P004', 'G022'),
(47, 'P004', 'G023'),
(48, 'P004', 'G024'),
(49, 'P004', 'G025'),
(50, 'P004', 'G026'),
(51, 'P004', 'G027');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(6) NOT NULL,
  `nm_penyakit` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `pengendalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nm_penyakit`, `keterangan`, `pengendalian`) VALUES
('P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.'),
('P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.'),
('P003', 'Gumboro', 'Infectious Bursal Disease (IBD),\r\nPenyakit ini juga disebut Gumboro, karena pertama kalali diketemukan didaerah Gumboro, Deleware Amerika Serikat pada tahu 1926. Penyakit ini disebabkan oleh virus RNA yang diklasifikasikan dalm dipornavirus, menyerang bursa. Diketemukan pertama kali didaerah Gumboro, Delaware, USA. Sehingga disebut penyakit Gumboro, sinonim dengan IBD sampai saat ini. Ayam merupakan satu-satunya spesies yang dapat terinfeksi, penyakit ini sangat menular, masa inkubasinya 24 jam dan gejala klinis akan terlihat 2-3 hari setelah terinfeksi. Virus gumboro sulit dideteksi sehingga mampu hidup di luar tubuh ayam selama berbulan-bulan. Kandang yang kotor serta tempat pakan dan peralatan yang tidak bersih menjadi sumber utama penyebaran penyakit ini.', 'Immunisasi breeder farm, Karena induk yang kebal akan diturunkan kepada DOC, hal ini akan melindungi inveks awal IBD. Sehingga mencegah immuno suppression. Karena penyakit IBD menyebabkan timbulnya/terjadinya penurunan kekebalan. Vaksinasi ayam muda pada daerah yang tercemar, dikakukan pada umur 2 minggu. Tidak ada obat khusus, hanya kasus produksiadam urat yang berlebihan pada ginjal danusus besar dapat diobati dengan moase 6 % dalam air minum, diberikanair minum sebanyakbanyaknya.'),
('P004', 'Berak Kapur', 'Pullorum sering juga disebut berak kapur “bacillary white diarchea”.Pullorum adalah penyakit ayam yang disebabkan oleh sejenis bakteri yang disebut dengan ”salmonella pullorum” dan salmonella gallinarum. Kedua organisme tersebut menimbulkan penyakit yang sama dan respon terhadap tindakan-tindakan yang sama. Kedua salmonella tersebut dapat menimbulkan kematian tinggi pada anak ayam, tetapi hanya salmonella gallinarum yang secara normal dapat menimbulkan kematian pada ayam dewasa. Kalau yang diserang ayam petelur dewasa produksinya turun, bentuk telur abnormal dan daya tetas rendah. ', 'Membersihkan secara total organisme tersebut dengan jalan mengosongkan kandang selama tiga bulan, mensucihamakan dengan desinfektan (lihat Bab.II). Pengawasan terus menerus terhadap induk-induk ayam (breeder farm), bilamana diduga ada penyakit ini, dengan uji/tes agglutinasi dengan memakai darah atau serum. Apabila ayam di Import dari negara lain harus yang memakai sertifikat bebas pollorum. Dmikian juga ayam yang dibeli dari breeder farm, harus yang bebas pollorum. untuk pengobatan dapat digunakan obat-obat sulfa, seperti sulfa quinozalin nitrofura zolidone, dan lain-lain.'),
('P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `noriwayat` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_penyakit` varchar(6) NOT NULL,
  `nm_penyakit` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `pengendalian` text NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`noriwayat`, `username`, `id_penyakit`, `nm_penyakit`, `keterangan`, `pengendalian`, `tanggal_input`, `waktu_input`) VALUES
(346, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-16', '10:38:49.000000'),
(347, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-16', '10:39:38.000000'),
(348, 'erik', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-02-16', '10:41:44.000000'),
(349, 'erik', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-02-16', '10:42:58.000000'),
(350, 'erik', 'P003', 'Gumboro', 'Infectious Bursal Disease (IBD),\r\nPenyakit ini juga disebut Gumboro, karena pertama kalali diketemukan didaerah Gumboro, Deleware Amerika Serikat pada tahu 1926. Penyakit ini disebabkan oleh virus RNA yang diklasifikasikan dalm dipornavirus, menyerang bursa. Diketemukan pertama kali didaerah Gumboro, Delaware, USA. Sehingga disebut penyakit Gumboro, sinonim dengan IBD sampai saat ini. Ayam merupakan satu-satunya spesies yang dapat terinfeksi, penyakit ini sangat menular, masa inkubasinya 24 jam dan gejala klinis akan terlihat 2-3 hari setelah terinfeksi. Virus gumboro sulit dideteksi sehingga mampu hidup di luar tubuh ayam selama berbulan-bulan. Kandang yang kotor serta tempat pakan dan peralatan yang tidak bersih menjadi sumber utama penyebaran penyakit ini.', 'Immunisasi breeder farm, Karena induk yang kebal akan diturunkan kepada DOC, hal ini akan melindungi inveks awal IBD. Sehingga mencegah immuno suppression. Karena penyakit IBD menyebabkan timbulnya/terjadinya penurunan kekebalan. Vaksinasi ayam muda pada daerah yang tercemar, dikakukan pada umur 2 minggu. Tidak ada obat khusus, hanya kasus produksiadam urat yang berlebihan pada ginjal danusus besar dapat diobati dengan moase 6 % dalam air minum, diberikanair minum sebanyakbanyaknya.', '2024-02-18', '05:25:04.000000'),
(351, 'erik', 'P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.', '2024-02-18', '05:33:46.000000'),
(352, 'erik', 'P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.', '2024-02-18', '05:35:37.000000'),
(353, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-18', '05:40:56.000000'),
(354, 'erik', 'P004', 'Berak Kapur', 'Pullorum sering juga disebut berak kapur “bacillary white diarchea”.Pullorum adalah penyakit ayam yang disebabkan oleh sejenis bakteri yang disebut dengan ”salmonella pullorum” dan salmonella gallinarum. Kedua organisme tersebut menimbulkan penyakit yang sama dan respon terhadap tindakan-tindakan yang sama. Kedua salmonella tersebut dapat menimbulkan kematian tinggi pada anak ayam, tetapi hanya salmonella gallinarum yang secara normal dapat menimbulkan kematian pada ayam dewasa. Kalau yang diserang ayam petelur dewasa produksinya turun, bentuk telur abnormal dan daya tetas rendah. ', 'Membersihkan secara total organisme tersebut dengan jalan mengosongkan kandang selama tiga bulan, mensuci \r\nhamakan dengan desinfektan (lihat Bab.II). Pengawasan terus menerus terhadap induk-induk ayam \r\n(breeder farm), bilamana diduga ada penyakit ini, dengan uji/tes agglutinasi dengan memakai darah atau serum. Apabila ayam di Import dari negara lain harus yang memakai sertifikat bebas pollorum. Dmikian juga ayam yang dibeli dari breeder farm, harus yang bebas pollorum. untuk pengobatan dapat digunakan obat-obat sulfa, seperti sulfa quinozalin nitrofura zolidone, dan lain-lain.', '2024-02-18', '05:54:10.000000'),
(355, 'erik', 'P004', 'Berak Kapur', 'Pullorum sering juga disebut berak kapur “bacillary white diarchea”.Pullorum adalah penyakit ayam yang disebabkan oleh sejenis bakteri yang disebut dengan ”salmonella pullorum” dan salmonella gallinarum. Kedua organisme tersebut menimbulkan penyakit yang sama dan respon terhadap tindakan-tindakan yang sama. Kedua salmonella tersebut dapat menimbulkan kematian tinggi pada anak ayam, tetapi hanya salmonella gallinarum yang secara normal dapat menimbulkan kematian pada ayam dewasa. Kalau yang diserang ayam petelur dewasa produksinya turun, bentuk telur abnormal dan daya tetas rendah. ', 'Membersihkan secara total organisme tersebut dengan jalan mengosongkan kandang selama tiga bulan, mensucihamakan dengan desinfektan (lihat Bab.II). Pengawasan terus menerus terhadap induk-induk ayam (breeder farm), bilamana diduga ada penyakit ini, dengan uji/tes agglutinasi dengan memakai darah atau serum. Apabila ayam di Import dari negara lain harus yang memakai sertifikat bebas pollorum. Dmikian juga ayam yang dibeli dari breeder farm, harus yang bebas pollorum. untuk pengobatan dapat digunakan obat-obat sulfa, seperti sulfa quinozalin nitrofura zolidone, dan lain-lain.', '2024-02-18', '05:56:14.000000'),
(356, 'erik', 'P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.', '2024-02-18', '06:01:10.000000'),
(357, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-18', '08:02:50.000000'),
(358, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-20', '02:41:15.000000'),
(359, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-02-20', '03:08:20.000000'),
(360, 'habibi', 'P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.', '2024-03-01', '14:21:44.000000'),
(361, 'habibi', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-03-01', '14:22:06.000000'),
(362, 'erik', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-03-04', '03:35:13.000000'),
(363, 'erik', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-03-04', '03:35:33.000000'),
(364, 'erik', 'P001', 'Flu Burung', 'Flu Burung(Avian Influenza (AI))merupakan penyakit pada unggas yang sangat ganas dan berdampak sangat merugikan. Menyerang ayam, itik, kalkun, angsa, puyuh, entok, merpati, perkutut, burung unta, sriti / walet, kakatua dan burung-burung lain termasuk unggas liar. Hewan peka yang terdeteksi positif AI di Indonesia adalah ayam broiler, Layer, puyuh, itik, burung di Kebun Binatang, Babi. Sifat virus flu burung adalah tidak tahan panas, pada daging akan mati pada temperatur 80 °C selama 1 menit, pada telur akan mati pada temperatur 64 °C selama 4,5 menit.', 'Semua ternak yang mati harus dikubur dengan kedalaman ± 1 m dan diberi kapur/ dibakar. Semua ternak tidak sehat (sakit) harus dimusnahkan (stamping out). Peternak diperbolehkan mengisi kandangnya kembali 30 hari setelah pengosongan kandang. Sebelumnya harus sudah dipastikan semua tindakan dekontaminasi(desinfektasi) dan disposal (pembakaran/penguburan) sesuai procedure telah dilaksanakan dengan seksama.', '2024-03-04', '03:35:42.000000'),
(365, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-03-04', '03:36:09.000000'),
(366, 'erik', 'P005', 'Ngorok', 'Chronic respiratory disease atau yang lebih dikenal dengan ngorok adalah penyakit yang menyerang saluran pernapasan ayam dan bersifat kronis. Disebut “kronis” karena penyakit ini berlangsung secara terus menerus dalam jangka waktu lama dan sulit untuk disembuhkan. Chronic respiratory disease adalah penyakit menular menahun pada ayam yang disebabkan oleh Mycoplasma gallisepticum yang ditandai dengan gangguan pernafasan, keluarnya cairan eksudat dari rongga hidung, batuk, bersin dan kemerahan pada selaput lendir (conjunctiva) mata.', 'Ada beberapa macam antibiotika yang biasanya digunakan \r\nuntuk mengobati penyakit ini, antara lain :\r\nTylosin 0,05 % melalui air minum. Doxycyclin atau CTC Soluble 200 PPM dalam air minum. Lincospectin 75 gram per 100 liter air minum. Obat-obat lain sepertoi Terramycin, Streptomycin dicampur dalam makanan, air minum atau melalui injeksi. Kebersihan kandang, peralatan dan lingkungannya. Seluruh breeding farm primer harus bebas dari CRD, karena penyakit ini dapat ditularkan secara vertical. Mencegah terjadinya infeksi sekunder', '2024-03-04', '03:45:23.000000'),
(367, 'erik', 'P002', 'Tetelo', 'New Castle Disease/Tetelo/sampar ayam/Pseudo fowl pest/Pseudo vogel pest/Avian pneumoencephalitis/Cekah. Penyebabnya adalah Paramyzovirus hanya ada satu serotype dengan beberapa strain, yang sangat ganas sampai yang virulent. Diketemukan pertana kali di Jawa pada tahun 1926. Pada tahun itu juga diketemukan di New Cestle Disease Inggris, sehingga penyakit ini juga disebut dengan New Castle Disease. Penyebaran penyakit ini dapat melalui peralatan peternakan yang baru masuk ke kandang yang tidak dicuci terlebih dahulu, selain itu dapat juga disebarkan melalui burung-burung liar yang ada disekitar kandang.', 'Menjaga kebersihan dan melaksanakan program sanitasi yang baik. Apabila memasukkan ayam dari luar harus dikarantina dan dipelihara terpisah. Program vaksinasi yang baik dan pelaksanaannya yang benar. Sampai saat ini belum ada obat yang efektif untuk mengobati penyakit ND.', '2024-03-04', '03:47:20.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `login_id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`login_id`, `nama`, `alamat`, `username`, `password`) VALUES
(1, 'Rikza', 'Bandar Buat', 'erik', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'habibi', 'Bandar Buat', 'habibi', '1e01ba3e07ac48cbdab2d3284d1dd0fa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`noriwayat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `login_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `noriwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `login_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
