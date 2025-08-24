-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 02:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwep64`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id` int(11) NOT NULL,
  `berita_title` varchar(255) DEFAULT NULL,
  `berita_deskripsi` text DEFAULT NULL,
  `berita_img` varchar(255) DEFAULT NULL,
  `utama_biasa` enum('utama','biasa') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id`, `berita_title`, `berita_deskripsi`, `berita_img`, `utama_biasa`, `created_at`, `updated_at`) VALUES
(1, 'PIAN LOLOS UNTUK MENGIKUTI WORLD SKILS COMPETION DI TOKYO JEPANG', 'PIANN OTW NUS setelah lolos worldskilss, dan ingin melanjutkan karir di Jepang', 'img/berita/tokyo.jpg', 'utama', '2025-07-01 22:51:17', '2025-07-04 01:28:16'),
(2, 'Pian', 'OMG PIAN GET A GOLD MEDAL FROM LKS NATIONAL', 'img/berita/logonasional.png', 'biasa', '2025-07-01 22:51:17', '2025-07-03 22:05:37'),
(10, 'Konatsuuuu My Loveee', 'MYYYYY LOOVVVEEEEEEEE', 'img/berita/konatsu.jpg', 'utama', '2025-07-01 22:51:17', '2025-07-04 15:08:57'),
(11, 'tes gaiss', 'sadksd', 'img/berita/RR.png', 'biasa', '2025-07-02 01:11:43', '2025-07-02 01:35:00'),
(12, 'Web 2 vs Web 3? Apasih perbedannya?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio voluptate, corporis itaque, veniam mollitia suscipit architecto voluptates labore expedita a sed illum explicabo?', 'img/berita/web.png', 'biasa', '2025-07-02 17:18:53', '2025-07-03 21:33:42'),
(15, 'ISTRI PIANNN', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut deserunt iste ducimus quidem molestiae dolores nostrum a ipsa labore?', 'img/berita/mywife.jpg', 'biasa', '2025-07-03 21:25:23', '2025-07-04 15:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eskul`
--

CREATE TABLE `tbl_eskul` (
  `id` int(11) NOT NULL,
  `eskul_title` varchar(255) DEFAULT NULL,
  `eskul_deskripsi` text DEFAULT NULL,
  `eskul_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_eskul`
--

INSERT INTO `tbl_eskul` (`id`, `eskul_title`, `eskul_deskripsi`, `eskul_img`) VALUES
(1, 'SES-CLUB', 'Ketua nya Alvian Njir lah awkoawoakaowk btw rangking 1 coyy GG bats emng Suaminy Konatsu', 'img/eskul/SESC-new.png'),
(2, 'BASKET', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque similique quam vel laudantium eos eligendi aliquid, beatae at sed quaerat.', 'img/eskul/basket.png'),
(3, 'PMR', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut deserunt iste ducimus quidem molestiae dolores nostrum a ipsa labore?', 'img/eskul/pmr.png'),
(7, 'ROHIS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque similique quam vel laudantium eos eligendi aliquid, beatae at sed quaerat.', 'img/eskul/ROHIS.png'),
(14, 'TARI', 'Tari Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut deserunt iste ducimus quidem molestiae dolores nostrum a ipsa labore?', 'img/eskul/tari.png'),
(18, 'JURNALISTIK', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio voluptate, corporis itaque, veniam mollitia suscipit architecto voluptates labore expedita a sed illum explicabo?', 'img/eskul/jurnal.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `deskripsi`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Lomba Catur di SMKN 64 Jakarta', 'gaya serius skill misterius', 'img/gallery/catur.jpg', '2025-07-02 01:58:55', '2025-07-02 02:03:38'),
(3, 'Madios', 'OMAYGAT', 'img/gallery/madison.jpg', '2025-07-02 02:14:38', '2025-07-03 20:04:44'),
(4, 'Lomba Curi Balonn !!!', 'Lorem ipsum dolor consectetur adipisicing elit. Cupiditate tempore alias fugiat ea a. Consectetur, explicabo blanditiis cum laudantium ipsum non laborum possimus illo ab.', 'img/gallery/balon.jpg', '2025-07-02 02:18:51', '2025-07-02 02:18:51'),
(5, 'Lomba Baskett !!', 'Lorem ipsum dolor, consectetur adipisicing elit. Itaque similique quam vel laudantium eos eligendi aliquid, beatae at sed quaerat.', 'img/gallery/basket.jpg', '2025-07-02 02:21:13', '2025-07-02 02:21:13'),
(7, 'Lomba Tenis Meja', 'Lorem ipsum dolor consectetur adipisicing elit. Cupiditate tempore alias fugiat ea a. Consectetur, explicabo blanditiis cum laudantium ipsum non laborum possimus illo ab.', 'img/gallery/tenis.jpg', '2025-07-04 01:26:31', '2025-07-04 01:26:55'),
(8, 'when yh', 'AVVV', 'img/gallery/natsu.png', '2025-07-04 16:42:41', '2025-07-04 16:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru_tu`
--

CREATE TABLE `tbl_guru_tu` (
  `id` int(11) NOT NULL,
  `guru_tu_name` varchar(255) DEFAULT NULL,
  `guru_tu_deskripsi` text DEFAULT NULL,
  `guru_tu_jenkel` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `guru_tu_gtk` varchar(255) DEFAULT NULL,
  `guru_tu_tmpt_lahir` varchar(255) DEFAULT NULL,
  `guru_tu_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guru_tu`
--

INSERT INTO `tbl_guru_tu` (`id`, `guru_tu_name`, `guru_tu_deskripsi`, `guru_tu_jenkel`, `guru_tu_gtk`, `guru_tu_tmpt_lahir`, `guru_tu_img`) VALUES
(1, 'Ichsan Al Nursan S.Pd', 'Lorem ipsum dolor consectetur adipisicing elit. Cupiditate tempore alias fugiat ea a. Consectetur, explicabo blanditiis cum laudantium ipsum non laborum possimus illo ab.', 'Laki - Laki', 'Wakil Kurikulum', 'Jakarta', 'img/guru_tu/ichsan.jpg'),
(2, 'Drs. Hardi Ratna Pajar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque similique quam vel laudantium eos eligendi aliquid, beatae at sed quaerat.', 'Laki - Laki', 'Kasubag TU', 'Cirebon', 'img/guru_tu/hardi.jpg'),
(4, 'Rima Febriani, M.Pd', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio voluptate, corporis itaque, veniam mollitia suscipit architecto voluptates labore expedita a sed illum explicabo?', 'Perempuan', 'Wakil Humas', 'Jakarta', 'img/guru_tu/rima.jpg'),
(9, 'Suroso, S.Pd', 'Bpk Suroso Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque similique quam vel laudantium eos eligendi aliquid, beatae at sed quaerat.', 'Laki - Laki', 'Wakil Sarana Prasarana', 'Bantul', 'img/guru_tu/suroso.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hero`
--

CREATE TABLE `tbl_hero` (
  `id` int(11) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_deskripsi` text DEFAULT NULL,
  `hero_img` varchar(255) DEFAULT NULL,
  `hero_status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hero`
--

INSERT INTO `tbl_hero` (`id`, `hero_title`, `hero_deskripsi`, `hero_img`, `hero_status`) VALUES
(1, 'Selamat Datang di SMKN 64 Jakarta', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut deserunt iste ducimus quidem molestiae dolores nostrum a ipsa labore?', 'img/pack/smkn64.jpg', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id` int(11) NOT NULL,
  `profile_title` varchar(255) DEFAULT NULL,
  `profile_logo` varchar(255) DEFAULT NULL,
  `profile_berdiri` varchar(255) DEFAULT NULL,
  `profile_penghargaan` varchar(255) DEFAULT NULL,
  `profile_guru_tu` varchar(255) DEFAULT NULL,
  `profile_industri` varchar(255) DEFAULT NULL,
  `profile_visi` varchar(255) DEFAULT NULL,
  `profile_misi` varchar(500) DEFAULT NULL,
  `profile_alamat` varchar(500) DEFAULT NULL,
  `profile_email` varchar(255) DEFAULT NULL,
  `profile_npsn` varchar(150) DEFAULT NULL,
  `profile_pengawas` varchar(255) DEFAULT NULL,
  `profile_pengawas_nip` varchar(255) DEFAULT NULL,
  `profile_kepse` varchar(255) DEFAULT NULL,
  `profile_kepse_nip` varchar(255) DEFAULT NULL,
  `profile_identitas` text DEFAULT NULL,
  `profile_ig` varchar(255) DEFAULT NULL,
  `profile_yt` varchar(255) DEFAULT NULL,
  `profile_fb` varchar(255) DEFAULT NULL,
  `profile_x` varchar(255) DEFAULT NULL,
  `profile_deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id`, `profile_title`, `profile_logo`, `profile_berdiri`, `profile_penghargaan`, `profile_guru_tu`, `profile_industri`, `profile_visi`, `profile_misi`, `profile_alamat`, `profile_email`, `profile_npsn`, `profile_pengawas`, `profile_pengawas_nip`, `profile_kepse`, `profile_kepse_nip`, `profile_identitas`, `profile_ig`, `profile_yt`, `profile_fb`, `profile_x`, `profile_deskripsi`) VALUES
(1, 'SMKN 64 JAKARTA', 'img/logo/smkn64.png', '2019', '200+', '40+', '50+', 'Memiliki tamatan yang Berbudi pekerti luhur, Berkarakter, Mandiri, Berprestasi dan Berjiwa Wirausaha', 'Mengimplementasikan 5S (Senyum, Sapa, Salam, Sopan dan Santun). Membangun peserta didik menjadi seseorang yang memiliki sikap profesional. Mengarahkan peserta didik untuk meningkatkan potensi dan keahlian diri melalui pelatihan di dalam maupun di luar lingkungan sekolah Menyiapkan tamatan agar mendapatkan prestasi juara di tingkat nasional dengan pelatihan di setiap kompetensi. Mengarahkan peserta didik mempunyai jiwa wirausaha melalui pelajaran kewirausahaan', 'Jl. Mpo Nori RT 09 RW 03 Kel. Bambu Apus, Kec. Cipayung, Kota Jakarta Timur DKI Jakarta Jakarta Tenggara', 'alviancahyopambudi@gmail.com', '69992315 1212', 'Drs. H. Ismail, M.Pd  HAJI', '196510101990021002 12821', 'Dewi Puspitasari, M.Par 1812', '197102061995022002  182812', ' INII IDENTITAS SMKN 64 Jakarta adalah sekolah kejuruan yang berbasis pada teknologi informasi dengan memiliki 2 (dua) kompetensi unggulan, yaitu : RPL (Rekayasa Perangkat Lunak) Desain Komunikasi Visual Berdiri sejak tahun 2019, SMKN 64 Jakarta merupakan sekolah baru yang ingin menjaring peserta didik lulusan SMP yang memiliki minat dengan kejuruan teknologi dan informasi. Rekayasa Perangkat Lunak (RPL) adalah jurusan yang berfokus pada pengembangan perangkat lunak, mencakup analisis, desain, pembuatan, pengujian, dan pemeliharaan aplikasi atau sistem berbasis teknologi. Jurusan ini sesuai bagi siswa yang tertarik dengan dunia pemrograman, teknologi, dan inovasi digital. Adapun mata pelajaran yang dipelajari dalam jurusan ini berupa Pemograman, Basis Data, Konsentrasi Keahlian RPL, Dasar-dasar PPLG, dan mapel pilihan RPL Perangkat Lunak Desain. Desain Komunikasi Visual (DKV) adalah jurusan yang menggabungkan seni, komunikasi, dan teknologi untuk menciptakan karya visual yang menarik dan bermakna. Jurusan ini sesuai untuk siswa yang memiliki kreativitas tinggi dan minat dalam desain, ilustrasi, fotografi, animasi, serta media digital. Adapun mata pelajaran yang dipelajari dalam jurusan DKV adalah Dasar-dasar DKV, Konsentrasi Keahlian DKV, mapel pilihan DKV Pemograman Web, dan Desain Brief. SMKN 64 Jakarta menyediakan berbagai fasilitas penunjang pendidikan bagi anak didiknya seperti laboratorium komputer, lapangan basket, perpustakaan, mushola, ruang tunggu siswa dan lainnya. SMKN 64 juga didukung oleh kehadiran guru-guru dengan kualitas terbaik di bidangnya. Kegiatan di sekolah ini juga beragam seperti Festival P5, Jumat Literasi, Jumat Sehat, Senin Dialog, Salat Zuhur Berjamaah, dan kegiatan siswa lainnya. Kegiatan ini rutin diselenggarakan secara bergilir setiap minggunya. Proses belajar dibuat senyaman mungkin bagi murid dan guru. Menjadi lembaga Pendidikan kejuruan yang mampu menghasilkan tenaga terampil sesuai standar global. Fokus pada kualitas, kurikulum, dan pembelajaran yang berbasis kompetensi. Mengembangkan profesionalisme dengan penguasaan bahasa asing dan disiplin tinggi. Menjawab tuntutan perusahaan akan tenaga trampil yang memiliki standar profesionalisme yang tinggi.', 'https://www.instagram.com/konatsu_0805/', 'https://www.youtube.com/@smkn64jakarta22', '#', '#', 'INI DESKRIPSI SMKN 64 DIbawah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eskul`
--
ALTER TABLE `tbl_eskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guru_tu`
--
ALTER TABLE `tbl_guru_tu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_eskul`
--
ALTER TABLE `tbl_eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_guru_tu`
--
ALTER TABLE `tbl_guru_tu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
