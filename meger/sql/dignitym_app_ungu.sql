-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2012 at 10:51 AM
-- Server version: 5.0.95
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dignitym_app_ungu`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL auto_increment,
  `ltime` datetime NOT NULL default '0000-00-00 00:00:00',
  `msg` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `ltime`, `msg`) VALUES
(1, '2011-10-26 07:56:15', 'admin - News telah dihapus'),
(2, '2011-10-26 07:58:30', 'admin - News telah ditambahkan'),
(3, '2011-10-26 07:59:38', 'admin - News telah diupdate'),
(4, '2011-10-26 08:36:11', 'admin - Vote Category telah diupdate'),
(5, '2011-10-26 08:36:41', 'admin - Vote Category telah diupdate'),
(6, '2011-10-26 08:36:46', 'admin - Vote Category telah diupdate'),
(7, '2011-10-26 08:36:54', 'admin - Info telah diupdate'),
(8, '2011-10-26 08:37:04', 'admin - News telah diupdate'),
(9, '2011-10-26 08:53:22', 'admin - Vote Item telah diupdate'),
(10, '2011-10-26 08:53:46', 'admin - Vote Item telah diupdate'),
(11, '2011-10-26 08:56:43', 'admin - Vote Item telah diupdate'),
(12, '2011-10-26 08:57:12', 'admin - Vote Item telah diupdate'),
(13, '2011-10-26 09:05:18', 'admin - News telah dihapus'),
(14, '2011-10-26 09:05:20', 'admin - News telah dihapus'),
(15, '2011-10-26 09:05:45', 'admin - News telah diupdate'),
(16, '2011-10-26 09:06:16', 'admin - News telah diupdate'),
(17, '2011-10-26 09:06:29', 'admin - News telah diupdate'),
(18, '2011-10-27 16:01:47', 'admin - Foto telah dihapus'),
(19, '2011-10-27 16:01:49', 'admin - Foto telah dihapus'),
(20, '2011-10-27 16:02:37', 'admin - Wall telah dihapus'),
(21, '2011-10-27 17:42:18', 'admin - Foto telah dihapus'),
(22, '2011-10-27 17:42:19', 'admin - Foto telah dihapus'),
(23, '2011-10-27 17:42:21', 'admin - Foto telah dihapus'),
(24, '2011-10-27 17:42:22', 'admin - Foto telah dihapus'),
(25, '2011-10-27 17:54:24', 'admin - News telah ditambahkan'),
(26, '2011-10-27 17:58:09', 'admin - News telah ditambahkan'),
(27, '2011-10-27 18:05:59', 'admin - News telah ditambahkan'),
(28, '2011-10-27 18:08:36', 'admin - News telah diupdate'),
(29, '2011-10-27 18:09:31', 'admin - News telah diupdate'),
(30, '2011-10-27 18:09:40', 'admin - News telah diupdate'),
(31, '2011-10-27 18:10:03', 'admin - News telah diupdate'),
(32, '2011-10-27 18:10:15', 'admin - News telah diupdate'),
(33, '2011-10-27 18:11:06', 'admin - News telah diupdate'),
(34, '2011-10-27 18:12:38', 'admin - News telah diupdate'),
(35, '2011-10-27 18:12:57', 'admin - News telah diupdate'),
(36, '2011-10-27 18:13:07', 'admin - News telah diupdate'),
(37, '2011-10-27 18:13:17', 'admin - News telah diupdate'),
(38, '2011-10-27 18:13:28', 'admin - News telah diupdate'),
(39, '2011-10-27 18:13:39', 'admin - News telah diupdate'),
(40, '2011-10-27 18:14:04', 'admin - News telah diupdate'),
(41, '2011-11-03 09:55:42', 'admin - Vote Item telah ditambahkan'),
(42, '2011-11-03 09:56:32', 'admin - Vote Item telah ditambahkan'),
(43, '2011-11-03 09:56:36', 'admin - Vote Item telah dihapus'),
(44, '2011-11-03 10:00:51', 'admin - Vote Item telah ditambahkan'),
(45, '2011-11-03 10:03:32', 'admin - Vote Category telah diupdate'),
(46, '2011-11-03 10:04:08', 'admin - Vote Item telah dihapus'),
(47, '2011-11-03 10:04:09', 'admin - Vote Item telah dihapus'),
(48, '2011-11-03 10:08:05', 'admin - Vote Item telah diupdate'),
(49, '2011-11-03 10:10:13', 'admin - Vote Item telah diupdate'),
(50, '2011-11-03 10:10:56', 'admin - Vote Item telah ditambahkan'),
(51, '2011-11-03 10:12:07', 'admin - Vote Item telah diupdate'),
(52, '2011-11-03 10:13:13', 'admin - Vote Item telah ditambahkan'),
(53, '2011-11-03 10:14:15', 'admin - Vote Item telah diupdate'),
(54, '2011-11-03 10:14:21', 'admin - Vote Item telah diupdate'),
(55, '2011-11-03 10:21:05', 'admin - Vote Item telah ditambahkan'),
(56, '2011-11-03 10:24:37', 'admin - Vote Item telah diupdate'),
(57, '2011-11-03 10:29:41', 'admin - Vote Item telah ditambahkan'),
(58, '2011-11-03 10:31:58', 'admin - Vote Item telah ditambahkan'),
(59, '2011-11-03 10:36:43', 'admin - Vote Item telah ditambahkan'),
(60, '2011-11-03 11:02:14', 'admin - Vote Item telah ditambahkan'),
(61, '2011-11-03 11:02:33', 'admin - Vote Item telah ditambahkan'),
(62, '2011-11-03 11:11:46', 'admin - Vote Item telah ditambahkan'),
(63, '2011-11-03 11:12:04', 'admin - Vote Item telah ditambahkan'),
(64, '2011-11-03 11:12:58', 'admin - Vote Item telah ditambahkan'),
(65, '2011-11-03 11:13:01', 'admin - Vote Item telah dihapus'),
(66, '2011-11-03 11:13:16', 'admin - Vote Item telah ditambahkan'),
(67, '2011-11-03 11:22:07', 'admin - Vote Item telah ditambahkan'),
(68, '2011-11-03 11:22:23', 'admin - Vote Item telah ditambahkan'),
(69, '2011-11-03 11:22:35', 'admin - Vote Item telah ditambahkan'),
(70, '2011-11-03 11:22:52', 'admin - Vote Item telah ditambahkan'),
(71, '2011-11-03 11:23:16', 'admin - Vote Item telah ditambahkan'),
(72, '2011-11-03 11:32:12', 'admin - Vote Item telah ditambahkan'),
(73, '2011-11-03 11:33:42', 'admin - Vote Item telah ditambahkan'),
(74, '2011-11-03 11:34:00', 'admin - Vote Item telah ditambahkan'),
(75, '2011-11-03 11:34:37', 'admin - Vote Item telah ditambahkan'),
(76, '2011-11-03 11:34:52', 'admin - Vote Item telah ditambahkan'),
(77, '2011-11-03 14:09:43', 'admin - Vote Item telah ditambahkan'),
(78, '2011-11-03 14:10:08', 'admin - Vote Item telah ditambahkan'),
(79, '2011-11-03 14:10:22', 'admin - Vote Item telah ditambahkan'),
(80, '2011-11-03 14:10:42', 'admin - Vote Item telah ditambahkan'),
(81, '2011-11-03 14:11:00', 'admin - Vote Item telah ditambahkan'),
(82, '2011-11-03 14:18:01', 'admin - Vote Item telah ditambahkan'),
(83, '2011-11-03 14:18:21', 'admin - Vote Item telah ditambahkan'),
(84, '2011-11-03 14:18:39', 'admin - Vote Item telah ditambahkan'),
(85, '2011-11-03 14:19:12', 'admin - Vote Item telah ditambahkan'),
(86, '2011-11-03 14:19:32', 'admin - Vote Item telah ditambahkan'),
(87, '2011-11-03 14:27:25', 'admin - Vote Item telah ditambahkan'),
(88, '2011-11-03 14:27:56', 'admin - Vote Item telah ditambahkan'),
(89, '2011-11-03 14:28:09', 'admin - Vote Item telah ditambahkan'),
(90, '2011-11-03 14:28:36', 'admin - Vote Item telah ditambahkan'),
(91, '2011-11-03 14:28:50', 'admin - Vote Item telah ditambahkan'),
(92, '2011-11-03 14:29:19', 'admin - Vote Item telah diupdate'),
(93, '2011-11-03 14:57:50', 'admin - Vote Item telah ditambahkan'),
(94, '2011-11-03 14:58:04', 'admin - Vote Item telah ditambahkan'),
(95, '2011-11-03 14:58:37', 'admin - Vote Item telah ditambahkan'),
(96, '2011-11-03 14:59:00', 'admin - Vote Item telah ditambahkan'),
(97, '2011-11-03 14:59:22', 'admin - Vote Item telah ditambahkan'),
(98, '2011-11-03 15:07:42', 'admin - Vote Item telah ditambahkan'),
(99, '2011-11-03 15:08:05', 'admin - Vote Item telah ditambahkan'),
(100, '2011-11-03 15:08:21', 'admin - Vote Item telah ditambahkan'),
(101, '2011-11-03 15:08:41', 'admin - Vote Item telah ditambahkan'),
(102, '2011-11-03 15:09:35', 'admin - Vote Item telah ditambahkan'),
(103, '2011-11-03 15:18:59', 'admin - Vote Category telah diupdate'),
(104, '2011-11-03 15:19:59', 'admin - Vote Category telah diupdate'),
(105, '2011-11-03 15:20:32', 'admin - Vote Item telah ditambahkan'),
(106, '2011-11-03 15:21:03', 'admin - Vote Item telah ditambahkan'),
(107, '2011-11-03 15:21:27', 'admin - Vote Item telah ditambahkan'),
(108, '2011-11-03 15:21:58', 'admin - Vote Item telah ditambahkan'),
(109, '2011-11-03 15:22:27', 'admin - Vote Item telah ditambahkan'),
(110, '2011-11-03 15:27:39', 'admin - Vote Item telah ditambahkan'),
(111, '2011-11-03 15:28:01', 'admin - Vote Item telah ditambahkan'),
(112, '2011-11-03 15:28:17', 'admin - Vote Item telah ditambahkan'),
(113, '2011-11-03 15:28:42', 'admin - Vote Item telah ditambahkan'),
(114, '2011-11-03 15:29:00', 'admin - Vote Item telah ditambahkan'),
(115, '2011-11-03 15:43:34', 'admin - Vote Item telah ditambahkan'),
(116, '2011-11-03 15:43:56', 'admin - Vote Item telah ditambahkan'),
(117, '2011-11-03 15:44:25', 'admin - Vote Item telah ditambahkan'),
(118, '2011-11-03 15:45:53', 'admin - Vote Item telah ditambahkan'),
(119, '2011-11-03 15:46:10', 'admin - Vote Item telah ditambahkan'),
(120, '2012-05-02 11:24:44', 'admin - News telah dihapus'),
(121, '2012-05-02 11:24:45', 'admin - News telah dihapus'),
(122, '2012-05-02 11:24:46', 'admin - News telah dihapus'),
(123, '2012-05-02 11:25:24', 'admin - News telah dihapus'),
(124, '2012-05-02 11:36:18', 'admin - News telah ditambahkan'),
(125, '2012-05-02 11:36:29', 'admin - Shows telah ditambahkan'),
(126, '2012-05-02 12:13:34', 'admin - Your password has changed'),
(127, '2012-05-02 13:08:10', 'admin - Shows telah diupdate'),
(128, '2012-05-02 13:46:31', 'admin - News telah ditambahkan'),
(129, '2012-05-21 15:10:51', 'admin - News telah dihapus'),
(130, '2012-05-21 15:24:25', 'admin - News telah ditambahkan'),
(131, '2012-05-21 15:25:05', 'admin - News telah ditambahkan'),
(132, '2012-05-21 15:25:42', 'admin - News telah diupdate'),
(133, '2012-05-21 15:28:28', 'admin - News telah ditambahkan'),
(134, '2012-05-21 15:30:52', 'admin - Shows telah dihapus'),
(135, '2012-05-21 15:37:22', 'admin - Shows telah ditambahkan'),
(136, '2012-06-18 17:20:23', 'admin - News telah ditambahkan'),
(137, '2012-06-18 17:25:03', 'admin - Shows telah ditambahkan'),
(138, '2012-06-18 17:25:14', 'admin - News telah dihapus'),
(139, '2012-07-03 10:51:50', 'admin - News telah ditambahkan'),
(140, '2012-07-17 16:04:01', 'admin - News telah ditambahkan'),
(141, '2012-07-17 16:04:19', 'admin - News telah diupdate'),
(142, '2012-07-17 16:08:28', 'admin - News telah ditambahkan'),
(143, '2012-07-17 16:38:57', 'admin - News telah ditambahkan'),
(144, '2012-07-17 16:40:28', 'admin - News telah diupdate');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `judul` varchar(64) NOT NULL default '',
  `description` text NOT NULL,
  `tgl` datetime NOT NULL default '0000-00-00 00:00:00',
  `oleh` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `description`, `tgl`, `oleh`) VALUES
(10, 'Siaran Langsung Launching Album UNGU', '<p>\r\n	Dalam rangka meluncurkan album perdananya &lsquo;TIMELESS&rsquo;, Ungu menggelar konferensi pers pada hari Rabu (9/5) lalu di KFC Kemang, Jakarta Selatan.&nbsp;&nbsp; Bahkan acara peluncuran ini tak hanya bisa disaksikan oleh para pengunjung KFC Kemang, namun seluruh fans Ungu bisa menyaksikannya siaran langsungnya lewat detik forum.</p>\r\n<p>\r\n	Demi memanjakan cliquers sebutan untuk fans Ungu, Ungu bekerjasama dengan Detik forum.&nbsp; Lewat kerjasama ini seluruh detikers dan fans Ungu dimana pun berada bisa mengirimkan pertanyaannya ke detik forum.&nbsp; Nah pertanyaan ini akan di jawab oleh Pasha, Onci, Enda, Makki dan Rowman saat acara Press Conference nanti.</p>\r\n<p>\r\n	Selain akan menceritakan tentang album barunya ini, Ungu juga akan membwakan beberapa lagu dari album terbarunya ini &lsquo;TIMELESS&rsquo;.</p>\r\n<p>\r\n	Buat kamu yang ingin nonton sekaligus ingin mengirimkan pertanyaan untuk UNGU silhkan klik di <a href="http://bit.ly/IYTXju">http://bit.ly/IYTXju</a> .</p>\r\n', '2012-05-21 00:00:00', 'admin'),
(9, 'Single Baru Ungu Segera di putar di Radio!', '<p>\r\n	Lagu berjudul Sayang&hellip; &hellip; &hellip; yang bercerita tentang kegalauan hati seorang pria ini lah yang dipilih UNGU menjadi single pertamanya dari album terbaru Ungu berjudul <em>Timeless. </em>Musik yang disuguhkan Ungu kali ini agak berbeda dengan hits single yang sebelumnya.</p>\r\n<p>\r\n	Musik bernuansa era 80-an yang terasa di lagu Sayang&hellip; &hellip; &hellip; lewat alunan gitar elektrik yang berbaur dengan alunan gitar akustik.&nbsp; Meski terdengar sedikit oldis tapi lagu ciptaan Pasha ini memiliki makna yang begitu dalam.&nbsp; Sebagian besar orang pasti pernah merasakan saat tak menemukan kata &ndash; kata yang tepat untuk menyudahi hubungannya dengan sang kekasih.&nbsp; Itulah yang digambarkan dalam lagu andalan Ungu ini.</p>\r\n<p>\r\n	Makin penasaran sama lagu ciptaan aa pasha ini?&nbsp; Tenang aja dalam waktu dekat album berjudul Timeless ini akan segera launching dan kamu bisa mendapatkannnya di KFC &ndash; KFC terdekat.&nbsp; Buat kamu yang berada di Medan, Palangkarya, Jawa tengah, Jawa Barat, Jawa Timur, dan Banten bisa dengar lebih dulu nih di radio &ndash; radio kesayanganmu MALAM INI!!</p>\r\n', '2012-05-02 13:46:31', 'admin'),
(11, 'Konser Istimewa Ungu TIMELESS Megah Dan Meriah', '<p>\r\n	Kemeriahan Konser Istimewa Ungu TIMELESS yang berlangsung di Pamulang Square pada hari Jumat (11/5) lalu mampu membuat para cliquers yang hadir terbawa suasana yang megah nan meriah.&nbsp; Malam kemarin Ungu tak hanya sendiri tapi juga menggandeng beberapa artis papan atas lainnya seperti Rossa, Afgan, dan Vidi Aldiano.</p>\r\n<p>\r\n	Ungu membawakan lagu &ndash; lagu andalannya seperti Demi Waktu, Kau Anggap Apa, Puing Kenangan dan masih banyak lagi.&nbsp; Lagu Sayang&hellip; &hellip; &hellip; yang menjadi single pertama dalam Album TIMELESS ini pun tak ketinggalan dinyanyikannya.&nbsp; Tapi jangan salah, meski lagu baru, namun semua cliquers pun Nampak hafal dan ikut bernyanyi.</p>\r\n<p>\r\n	Hal yang menggembirakan dalam konser ini adalah ketika Ungu memberikan gitar kepada salah satu cliquers. Pastinya ini akan membuat iri cliquers lainnya.&nbsp; Tapi, semua cliquers yang hadir Nampak tak ada penyesalan sedikit pun bahkan mereka terlihat puas dengan penampilan idolanya.&nbsp;</p>\r\n<p>\r\n	Ungu sempat menampilkan hal yang tak biasa dengan mengganti formasi dalam salah satu lagunya, posisi vokalis pun diisi oleh Onci.&nbsp; Tentunya hal ini nggak mengurangi kualitas mereka dalam bermusik, terbukti dengan antusias yang luar biasa dari para penonton.</p>\r\n', '2012-05-21 00:00:00', 'admin'),
(12, 'Puaskan Penonton Ungu Konser 2 Kali Di Hongkong', '<p>\r\n	Antusias para penikmat Konser tunggal Ungu pada hari minggu, 6 Mei 2012 lalu di <em><strong>Queen Elizabeth Stadium,</strong></em> Hongkong benar &ndash; benar begitu luar biasa.&nbsp; Stadion yang menampung sekitar 3500 orang pun tak mampu menampung semuanya hingga Ungu harus konser 2 kali dalam hari yang sama.</p>\r\n<p>\r\n	Ungu membawakan lagu &ndash; lagu andalannya yang sempat menjadi hits seperti Dirimu Satu, Demi Waktu, Hampa Hatiku, dan masih banyak lagi. Total Ungu memanjakan telinga para fansnya di Hongkong dengan membawakan 12 lagu.&nbsp; Tentunya juga beberapa lagu baru yang terdapat di album terbarunya &lsquo;TIMELESS&rsquo;.&nbsp; Bahkan saat menampilkan lagu &lsquo;Hampa Hatiku&rsquo; Ungu menggandeng Gading Marten untuk berduet.</p>\r\n<p>\r\n	Konser Ungu semakin meriah dengan penampilan dancer pembuka yang mampu membuat para penonton sangat terhibur dengan penampilannya.&nbsp; Meski tempat tak mencakup keseluruhan, namun Ungu berhasil memuaskan seluruh fansnya dengan tampil dua kali.&nbsp; Semua yang dilakukan semata &ndash; mata demi fansnya loh.</p>\r\n', '2012-05-21 00:00:00', 'admin'),
(14, 'Ungu Ajak Kamu Bikin Lagu!!', '<p>\r\n	<strong>&ldquo;Kebayang nggak sih rasanya kata-kata dari kamu dibikinin jadi sebuah lagu &lsquo;hits&rsquo; sama Ungu???&ldquo;</strong></p>\r\n<p>\r\n	Buat kamu yang penasaran nih, jangan lupa ya.. Dateng di acara Ungu Festival pada hari Minggu, 8 Juli 2012 di PTC Pulo Gadung. Di acara ini bakal ada workshop &ldquo;How to Make Hits&rdquo; bareng Pasha, Oncy &amp; Rowman dari Pukul 13:00 &ndash; 14.30 WIB.</p>\r\n<p>\r\n	Kamu semua pasti udah nggak asing lagi dong sama lagu &ndash; lagu Ungu yang selalu jadi &ldquo;Hits&rdquo; di masanya, seperti Melayang, Demi Waktu, Bayang Semu, Andai Ku Tahu, Percaya Padaku dan masih banyak lagi deh.. Nah, di workshop ini, Ungu bakal bercerita segala proses dan pembuatan lagu-lagu tersebut hingga menjadi hits sampai sekarang..</p>\r\n<p>\r\n	Yang paling seru, nanti kamu semua bakal bisa menyumbangkan kata-kata lewat twitter dengan mention @Ungu_Tweet. Tapi durasinya terbatas lho.. cuma dari jam 1 sampe 2 siang aja.. Makanya, buat yang belum punya twitter mending bikin dulu deh dari sekarang, biar nanti bisa ikutan.</p>\r\n<p>\r\n	Kamu nggak bakalan nyesel deh ikutan karena Ungu akan langsung bikin lagu dari kata-kata yang terkumpul itu, ON THE SPOT! Alias langsung saat itu juga. So Jangan ketinggalan buat ikutan ya</p>\r\n<p>\r\n	Yuk.. kosongin jadwal di tanggal 8 Juli 2012.</p>\r\n<p>\r\n	Terakhir, ada salam nih dari Ungu buat kamu klik deh <a href="http://bit.ly/UnguFestival">http://bit.ly/UnguFestival</a></p>\r\n', '2012-07-03 00:00:00', 'admin'),
(15, 'Cliquers Penuhi UNGU Festival', '<p>\r\n	Seperti sudah tak terbendung lagi, semakin malam cliquers semakin memenuhi lokasi UNGU Festival, Pulogadung Trade Centre.&nbsp; Ungu Festival yang disingkat menjadi UnguFest dimulai sejak pukul 07.00 WIB dengan digelarnya inbox.</p>\r\n<p>\r\n	Sebagian penonton yang terdiri dari cliquers mengenakan baju serba ungu dan memegang balon berrwarna &nbsp;ungu dan putih.&nbsp; Saat MC memberi aba &ndash; aba dibukanya UnguFest, semua cliquers yang memegang balon langsung melepaskan secara bersamaan.&nbsp; Seketika langit pagi itu pun dipenuhi dengan balon berwarna Ungu &ndash; Putih.</p>\r\n<p>\r\n	Kemudian acara UNGUFest pun dibuka dan seluruh cliquers langsung menyerbu gerbang UnguFest yang berbentuk lambang Ungu &lsquo;g&rsquo;.&nbsp; Yang paling ramai adalah booth Trinity bagian merchandise Ungu.&nbsp; Sepertinya semua cliquers tak mau menyia &ndash; nyiakan &nbsp;kesempatan untuk bisa mendapatkan diskon merchandise di UnguFest.&nbsp; Di booth digital Trinity ada Kompetisi games Superstar Manager yang nggak kalah penuhnya nih karena banyak hadiah menarik.</p>\r\n<p>\r\n	Hadiah bukan Cuma di booth Trinity digital aja, tapi juga di booth &ndash; booth sponsor seperti EsiaMyRing, Sarimi, Kuku Bima Kopi Ginseng, dan KFC!! Meski tak ada booth Canon yang menjadi sponsor acara ini pun turut bagi &ndash; bagi hadiah di acara UnguFest ini. Seru!</p>\r\n', '2012-07-17 00:00:00', 'admin'),
(16, '#UNGUFest Jadi Trending Topic Dunia ', '<p>\r\n	Untuk pertama kalinya Ungu menggelar festival besar &ndash; besaran di ulang tahunnya yang ke-16.&nbsp; Pada tanggal 8 Juli 2012 lalu di Pulogadung Trade Centre (PTC) &nbsp;acara bertajuk UNGUFest ini pun dihadiri oleh ribuan cliquers dan berhasil menjadi Trending Topic Dunia di situs micro bloging, Twitter.</p>\r\n<p>\r\n	Sepanjang hari PTC dipenuhi oleh anak &ndash; anak muda berbaju Ungu dan tentunya bertabur hadiah dari mulai HP, Blackberry, Voucher KFC, Kamera Canon, Paket Esia, Paket Sidomuncul, Paket Sarimi dan Uang Tunai Jutaan rupiah.&nbsp; Jelas saja, jika hashtag #UNGUFest pun sepanjang hari mewarnai timeline twitter dan akhirnya berhasil menduduki peringkat kedua di Trending Topic Worlwide (Dunia) dan kerennya lagi dalam waktu berjam-jam masih saja tak tergeser.</p>\r\n<p>\r\n	Bukan hanya itu aja, saking kompaknya para cliquers pun turut membuat hashtag #16thUNGU dan beriringan dengan hashtag #UNGUFest, hashtag yang dibuat cliquers pun menduduki posisi ketiga di Trending Topic Worldwide (Dunia).</p>\r\n<p>\r\n	Buat kalian yang yang nggak dateng yuukk subscribe Youtube Ungu band dan Ikutin video &ndash; video selama Ungu Festival!! Klik <a href="http://bit.ly/UNGUFest1">http://bit.ly/UNGUFest1</a></p>\r\n', '2012-07-16 00:00:00', 'admin'),
(17, 'Ungu Bagi Ilmu Lewat Workshop ', '<p>\r\n	Semua cliquers yang dapat kesempatan untuk bergabung di workshop musik dan fotografi pasti beruntung banget deh.&nbsp; Mereka semua dapat pengalaman yang seru banget loh, gimana nggak?&nbsp; Para peserta workshop ini dapat ilmu langsung dari Pasha, Enda, Onci, Makki dan Rowman.</p>\r\n<p>\r\n	Workshop musik dan fotografi berlangsung di tempat yang berbeda.&nbsp; Workshop musik bertempat di lantai 2 Pulogadung Trade Centre.&nbsp; Sebagai pembuka para peserta langsung disuguhi oleh penampilan dari Andante Youth Orkestra.&nbsp; Kemudian dilanjutkan oleh persembahan dari anak tuna netra bernama Dennis. Pasha, Onci, dan Rowman pun takjub melihat sosok Dennis yang sangat piawai memainkan keyboard lagu &ndash; lagu Ungu.</p>\r\n<p>\r\n	Sedangkan workshop fotografi bertempat di lokasi UnguFest.&nbsp; Nah, pengalaman para cliquers tak kalah berkesannya nih di Worskhop yang mengupas soal fotografi. &nbsp;&nbsp;Salah satu narasumber dari pihak Canon berbagi &nbsp;info tentang bagaimana menggunakan kamera pocket secara maksimal dan bahkan hasilnya mampu menyaingi kamera profesional.&nbsp; Selain itu juga ada cerita dari Fani, fotografer pribadi Ungu yang selalu mengikuti kemana pun Ungu pergi. Yang paling serunya adalah beberapa cliquers dapat kesempatan jadi model fotonya Enda nih.</p>\r\n<p>\r\n	Lihat Video serunya workshop : <a href="http://bit.ly/UNGUFest3">http://bit.ly/UNGUFest3</a></p>\r\n', '2012-07-17 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL auto_increment,
  `judul` varchar(64) NOT NULL default '',
  `description` text NOT NULL,
  `tgl` datetime NOT NULL default '0000-00-00 00:00:00',
  `oleh` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `judul`, `description`, `tgl`, `oleh`) VALUES
(2, 'Jadwal Bulan Mei', '<p>\r\n	6 Mei 2012 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Konser Di Hongkong</p>\r\n<p>\r\n	8 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Photo Session</p>\r\n<p>\r\n	9 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Launching Album KFC</p>\r\n<p>\r\n	11 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCTV Launching Album</p>\r\n<p>\r\n	14 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Musik Spesial ANTV</p>\r\n<p>\r\n	16 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dahsyat, RCTI ; Indonesia Movie Awards, RCTI</p>\r\n<p>\r\n	20 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Promo Album Timeless, Bandung</p>\r\n<p>\r\n	21 Mei 2012 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Promo Album Timeless, Bandung</p>\r\n<p>\r\n	23 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanjung Pinang, MTQ</p>\r\n<p>\r\n	26 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Promild, Tangerang</p>\r\n<p>\r\n	29 Mei 2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mega Konser, RCTI</p>\r\n', '2012-05-21 00:00:00', 'admin'),
(3, 'Jadwal Bulan Juni 2012', '<p>\r\n	18 Off Air Bandar Lampung</p>\r\n<p>\r\n	22&nbsp; Press Conference Kemah Pramuka Santri</p>\r\n<p>\r\n	22 HUT DKI, SCTV</p>\r\n<p>\r\n	23 Gathering, Yogyakarta</p>\r\n<p>\r\n	25 Photo Session</p>\r\n<p>\r\n	26 Syuting Video Klip Single Ke-2</p>\r\n', '2012-06-18 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL auto_increment,
  `area` varchar(200) NOT NULL default '',
  `uname` varchar(30) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `level` tinyint(4) NOT NULL default '0',
  `sid` varchar(32) NOT NULL default '',
  `expire` int(11) NOT NULL default '0',
  `ref` int(11) NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `area`, `uname`, `passwd`, `level`, `sid`, `expire`, `ref`) VALUES
(1, '*', 'admin', '4cecca031fe3ddca273e8ef37ffef6c8', 0, '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
