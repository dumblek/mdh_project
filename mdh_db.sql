-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: mdh_db
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kategori_agenda` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_agenda` varchar(255) NOT NULL,
  `judul_agenda` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_agenda` varchar(20) NOT NULL,
  `jenis_agenda` varchar(20) NOT NULL,
  `keywords` text,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `tempat` text,
  `google_map` text,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,4,6,'ID','latihan-agenda','Latihan Agenda','<p>Latihan</p>','Publish','Agenda','adad',NULL,'daad',0,NULL,'2020-09-12','2020-09-12','08:00:00','17:00:00','AWS Indonesia','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7930.3386078467065!2d106.82893243028725!3d-6.372131203377098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5d166b756d%3A0x41d8cdc14c819774!2sDepok%20Town%20Square!5e0!3m2!1sen!2sid!4v1579565022446!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','2020-09-12 23:46:53','2020-09-12 23:42:16','2020-09-13 00:09:38');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beras`
--

DROP TABLE IF EXISTS `beras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beras_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beras`
--

LOCK TABLES `beras` WRITE;
/*!40000 ALTER TABLE `beras` DISABLE KEYS */;
INSERT INTO `beras` VALUES (1,'BRS.IN/2108001','in','Pemasukan dari Hamba Allah','2021-08-14',12,4,NULL,NULL),(3,'BRS.IN/2108002','in','Pemasukan dari Pak Rifki','2021-08-13',15,4,NULL,NULL),(5,'BRS.OUT/2108001','out','Refil ATM','2021-08-14',6,4,NULL,NULL),(6,'BRS.OUT/2108002','out','Refil ATM','2021-08-13',8,4,NULL,NULL),(7,'BRS.IN/2108003','in','Pemasukan dari Pak Broto','2021-08-14',5,4,NULL,NULL);
/*!40000 ALTER TABLE `beras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT '0',
  `bahasa` enum('ID','EN') NOT NULL,
  `updater` varchar(32) DEFAULT '-',
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `jenis_berita` varchar(20) DEFAULT 'Berita',
  `keywords` text,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (18,4,0,'ID','-','darul-afiah','Darul Afiah','<h2>Deskripsi ringkas</h2>\r\n\r\n<p>Anda akan belajar membangun website profil perusahaan dengan menggunakan bootstrap, framework JavaScript, PHP framework Codeigniter / Larevel dan database MySQL.</p>\r\n\r\n<hr />\r\n<p>Anda akan belajar membangun website&nbsp;<strong>profil perusahaan</strong>&nbsp;dengan menggunakan bootstrap, framework JavaScript,&nbsp;<strong><em>PHP framework</em></strong><em>&nbsp;<strong>Codeigniter / Laravel</strong></em>&nbsp;dan database MySQL.</p>\r\n\r\n<h2><a name=\"_Toc32320297\"></a>Materi kursus</h2>\r\n\r\n<p>Anda akan mempelajari hal-hal berikut ini:</p>\r\n\r\n<ul>\r\n	<li>Dasar-dasar HTML, CSS dan Bootstrap</li>\r\n	<li>Mengembangkan website profil perusahaan dengan framework Codeigniter / Laraveldan database MySQL</li>\r\n	<li>Integrasi framework JavaScript dengan Codeigniter / Laravel</li>\r\n</ul>\r\n\r\n<h2><a name=\"_Toc32320298\"></a>Tujuan Kursus</h2>\r\n\r\n<p>Setelah Anda belajar&nbsp;di&nbsp;<strong>Kursus Web Development</strong>, Anda akan dapat:</p>\r\n\r\n<ul>\r\n	<li>Membuat website profil perusahaan (<em>company profile</em>) dengan framework Codeigniter / Laravel dan database MySQL</li>\r\n	<li>Aplikasi pendaftaran online sederhana</li>\r\n	<li>Bekerja sebagai&nbsp;<strong>&nbsp;Web Programmer&nbsp;</strong>atau&nbsp;<strong>Web Developer dengan keahlian Bootstrap, HTML, CSS, JavaScript dan framework Codeigniter / Larevel.</strong></li>\r\n</ul>\r\n\r\n<h2><a name=\"_Toc32320299\"></a>Urutan materi</h2>\r\n\r\n<ol>\r\n	<li>Installasi Software pendukung</li>\r\n	<li>Dasar-dasar HTML, CSS dan Bootstrap</li>\r\n	<li>Membuat&nbsp;<em><strong>Brief project ,&nbsp;</strong></em>yaitu merencanakan website yang akan dibuat sehingga nantinya bisa diwujudkan menjadi website sebenarnya</li>\r\n	<li>Merencanakan, membuat dan mengelola database MySQL</li>\r\n	<li>Integrasi template&nbsp;<em>front end&nbsp;</em>dan&nbsp;<em>back end&nbsp;</em>dengan framework Codeigniter / Laravel</li>\r\n	<li>Authentication (Login, Logout &amp; Proteksi Halaman)</li>\r\n	<li>CRUD&nbsp;<em>(Create, Read, Update &amp; Delete)&nbsp;</em>Dasar</li>\r\n	<li>CRUD Kompleks dengan relasi database</li>\r\n	<li>Laporan PDF dengan MPDF</li>\r\n	<li>Security review atas aplikasi yang telah dibuat</li>\r\n	<li>Upload web ke hosting atau meng-onlinekan website</li>\r\n</ol>\r\n\r\n<h2><a name=\"_Toc32320300\"></a>Software yang digunakan</h2>\r\n\r\n<p>XAMPP, Sublime Text/Notepad/Visual Studio, Browser, Aplikasi pengolah gambar, Composer dll.</p>','Publish','Layanan','Program kesehatan masyarakat','2-1600727318.png',NULL,NULL,1,NULL,NULL,'2020-09-15 23:29:49','2020-09-15 23:29:03','2021-08-08 14:15:32'),(22,15,8,'ID','-','darul-husna-peduli-berbagi','Darul Husna Peduli Berbagi','<p>Ramadhan, hari harinya penuh keberkahan, dilipatgandakan siapa saja yg berbuat kebaikan.<br />\r\nSedekah salah satu ibadah yg bisa kita lakukan.<br />\r\n<br />\r\nSedekah anda akan sangat meringankan bagi mereka yg membutuhkan.<br />\r\n<br />\r\nDan Rasulullahu shallallahu &lsquo;alaihi wa sallam adalah teladan yg selayaknya kita ikuti. &ldquo;Rasulullah shallallahu &lsquo;alaihi wa sallam adalah orang yang paling dermawan. Dan beliau lebih dermawan lagi di bulan Ramadhan saat beliau bertemu Jibril. Jibril menemuinya setiap malam untuk mengajarkan Al Qur&rsquo;an. Dan kedermawanan Rasulullah shallallahu &lsquo;alaihi wa sallam melebihi angin yang berhembus.&rdquo;&nbsp;(HR. Bukhari)<br />\r\n<br />\r\nTidakkah engkau ingin mengikuti teladan dibulan mulia ini dari manusia yg paling kita cintai, Rasulullah shallallahu &lsquo;alaihi wa sallam.</p>','Publish','Berita','Ramadhan, hari harinya penuh keberkahan, dilipatgandakan siapa saja yg berbuat kebaikan.\r\nSedekah salah satu ibadah yg bisa kita lakukan.','peduli-sesama-1627443262.jpg',NULL,NULL,NULL,NULL,NULL,'2020-09-16 00:01:35','2020-09-15 23:59:58','2021-07-28 03:34:22'),(23,4,0,'ID','-','layanan-konsultasi-strategis','Layanan Konsultasi Strategis','<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Layanan Konsultasi kami ideal untuk Anda saat membutuhkan dukungan dalam menyelaraskan tujuan strategis keberlanjutan perusahaan Anda dengan penatalayanan air yang baik dan mengembangkan rencana untuk tindakan tingkat wilayah operasional dan daerah tangkapan air. </span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Dari menilai kesiapan wilayah operasional Anda terhadap Standar AWS, hingga penilaian risiko air dalam rantai pasokan dan mengembangkan peta jalan menuju tindakan pengelolaan air yang baik di lokasi, rantai pasokan, dan tingkat daerah tangkapan, kami dapat membantu Anda dalam perjalanan. </span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Kami bekerja sama dengan penyedia layanan terakreditasi, kredensial profesional, dan terlatih AWS, bergantung pada kebutuhan spesifik perusahaan Anda. Ingin tahu lebih banyak? Hubungi kami dan untuk sesi konsultasi terbuka.</span></span></p>','Publish','Terjadi','Layanan Konsultasi Strategis','26-image-section-aws-indonesia-contact-1600218408.jpg',NULL,NULL,1,NULL,NULL,'2020-09-16 01:06:48','2020-09-16 01:06:08','2020-09-16 01:06:48'),(24,4,0,'ID','-','pelatihan-standar-dan-sistem-aws','Pelatihan Standar dan Sistem AWS','<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Program pelatihan Standar dan Sistem AWS interaktif selama 1, 2, dan 3 hari mencakup presentasi, studi kasus, serta latihan individu dan kelompok. </span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Berhasil menyelesaikan program pelatihan Spesialis memungkinkan Anda memenuhi syarat untuk menjadi penyedia layanan AWS yang terakreditasi, sebagai auditor, pelatih, dan konsultan. Ini juga mendukung Anda untuk membangun kapasitas internal untuk mengelola dan mengimplementasikan penatalayanan air dan sertifikasi AWS. Kami memberikan pelatihan dalam Bahasa Indonesia dan Bahasa Inggris.</span></span></p>','Publish','Terjadi','Pelatihan Standar dan Sistem AWS','26-image-section-aws-indonesia-contact-1600218481.jpg',NULL,NULL,NULL,NULL,NULL,'2020-09-16 01:08:01','2020-09-16 01:07:31','2020-09-16 01:08:01'),(25,4,0,'ID','-','studi-kasus','Studi Kasus','<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Jelajahi studi kasus Indonesia dan contoh penerapan penatalayanan air yang baik di seluruh Indonesia dari berbagai sektor.</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Natural Rubber 2019 Hevea |</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Natural Rubber Processing Site Online Survey 2019 Hevea I</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Hospitality Sector Hotel Indigo Seminyak IHG |</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">GAA Hevea Connect<strong>&nbsp;|&nbsp;</strong></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Brantas mapping |&nbsp;</span></span></li>\r\n</ul>','Publish','Materi','Studi Kasus',NULL,NULL,NULL,1,NULL,NULL,'2020-09-16 01:26:05','2020-09-16 01:23:28','2020-09-16 01:26:05'),(26,4,0,'ID','-','platform-e-tools-untuk-anggota-aws','Platform e-Tools untuk Anggota AWS','<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Cari tahu lebih lanjut tentang e-standar AWS, Panduan juga Modul Pembelajaran Online penatalayanan air di <a href=\"https://tools.a4ws.org/my-account/subscriptions/\" style=\"color:#0563c1; text-decoration:underline\">AWS Tool Hub</a>. Akses gratis untuk semua Anggota AWS dan non-anggota dapat membayar biaya untuk membuat akun.</span></span></p>','Publish','Materi','Platform e-Tools untuk Anggota AWS',NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-16 01:28:44','2020-09-16 01:27:50','2020-09-16 01:28:44'),(27,4,0,'ID','-','webinars','Webinars','<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Dapatkan wawasan Anda mengenai Standar dan Sistem AWS melalui webinar AWS dan diskusi penting lainnya tentang topik penatalayanan air di Indonesia.</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">World Water Development Report 2020 Launch by UNESCO &amp; Climate Tracker </span></span><br />\r\n	<span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Lainnya: <a href=\"https://unesdoc.unesco.org/ark:/48223/pf0000372985.locale=en\" style=\"color:#0563c1; text-decoration:underline\">Laporan</a></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">GWPSEA Webinar COVID-19 Belajar dari Krisis untuk Pengelolaan Air Terpadu yang Lebih<br />\r\n	Rekaman: <a href=\"https://www.facebook.com/GlobalWaterPartnershipSoutheastAsia/videos/271658824268924/?_rdc=1&amp;_rdr\" style=\"color:#0563c1; text-decoration:underline\">Tersedia</a></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Air Tanah untuk Tanah Air</span></span><br />\r\n	<span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Rekaman: <a href=\"bit.ly/youtube-airtanah\" style=\"color:#0563c1; text-decoration:underline\">Tersedia</a></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Online Consultation &ndash; the Principles for Addressing Water-related Disaster Risk Reduction and COVID-19 </span></span><br />\r\n	<span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Lainnya: <a href=\"https://www.gwp.org/en/GWP-South-East-Asia/WE-ACT/keep-updated/News-and-Activities/2020/help-gwp-pan-asia-consultation-meeting/\" style=\"color:#0563c1; text-decoration:underline\">Summary</a></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">AWS Member Webinars: Spotlight on Indonesia Brantas River Basin, East Java</span></span><br />\r\n	<span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Rekaman: <a href=\"https://register.gotowebinar.com/recording/4530186227396155147\" style=\"color:#0563c1; text-decoration:underline\">Tersedia</a></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">World Water Week #AtHome 2020 &ndash; Water Stewardship in Agriculture</span></span><br />\r\n	<span style=\"font-size:10pt\"><span style=\"font-family:&quot;Arial Nova Light&quot;,sans-serif\">Rekaman: <a href=\"https://register.gotowebinar.com/recording/8511901561510833158\" style=\"color:#0563c1; text-decoration:underline\">Tersedia</a></span></span></li>\r\n</ul>','Publish','Materi','Webinars',NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-16 01:31:45','2020-09-16 01:30:55','2020-09-16 01:31:45'),(28,15,0,'ID','-','atm-beras','ATM Beras','<p>Program layanan ATM beras adalah blablabla, sehingga membantu masyarakat dalam blabla bla, oke gitu aja dulu cukup.</p>','Publish','Layanan','beras','layanan-1627379095.jpeg',NULL,NULL,4,NULL,NULL,'2021-07-27 09:44:55','2021-07-27 09:43:29','2021-07-27 09:44:55'),(29,15,0,'ID','-','kajian-rutin','Kajian Rutin','<p>Kajian rutin Masjid Darul husna</p>','Publish','Layanan','Kajian rutin Masjid Darul husna','7167553-1bd38396-f19f-48b0-a15b-736bc4e37424-1627394517.jpg',NULL,NULL,5,NULL,NULL,'2021-07-27 14:01:57','2021-07-27 14:01:00','2021-07-27 14:01:57'),(30,15,8,'ID','-','hijrah-nabi-ke-madinah','Hijrah Nabi ke Madinah','<p>Kajian Rutin Malam Ahad<br />\r\nFikih Sirah<br />\r\nHijrah Nabi ke Madinah<br />\r\nAl Ustadz Rosyid Abu Rosyidah ???? ????</p>','Publish','Berita','Kajian Rutin Malam Ahad\r\nFikih Sirah\r\nHijrah Nabi ke Madinah\r\nAl Ustadz Rosyid Abu Rosyidah ???? ????','hijrah-nabi-1627443092.jpg',NULL,NULL,NULL,NULL,NULL,'2021-07-27 16:08:26','2021-07-27 16:08:12','2021-07-28 03:31:33'),(31,15,8,'ID','-','alam-barzakh','Alam Barzakh','<p>Bismillahirrahmanirrahim<br />\r\nKajian malem jumat<br />\r\nBersama ustadz Setiawan Tugiono, BA, MHI hafidzahullahu</p>','Publish','Berita','Bismillahirrahmanirrahim\r\nKajian malem jumat\r\nBersama ustadz Setiawan Tugiono, BA, MHI hafidzahullahu','alam-barkzah-1627443376.jpg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 03:36:16','2021-07-28 03:34:54','2021-07-28 03:36:16'),(32,15,8,'ID','-','ukhuwah-islamiyah','Ukhuwah Islamiyah','<p>Kajian Rutin Malam Jumat<br />\r\nBersama Ustadz Setiawan Tugiono, MHI<br />\r\nTema &quot;Ukhuwah Islamiyah&quot;<br />\r\nBada maghrib - Isya<br />\r\n<br />\r\nBaarakallahu fikum</p>','Publish','Berita','Kajian Rutin Malam Jumat\r\nBersama Ustadz Setiawan Tugiono, MHI\r\nTema \"Ukhuwah Islamiyah\"\r\nBada maghrib - Isya\r\n\r\nBaarakallahu fikum','ukhuwah-islam-1627443445.jpg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 03:37:25','2021-07-28 03:36:37','2021-07-28 03:37:25'),(33,4,8,'ID','-','pastikan-langkahmu','Pastikan Langkahmu','<p>Bismillah<br />\r\nHadirilah *KAJIAN RUTIN BULANAN MASJID DARUL HUSNA WARUNGBOTO*<br />\r\n_*PASTIKAN LANGKAHMU*_<br />\r\n<br />\r\nBersama</p>\r\n\r\n<ul>\r\n	<li>Ustadz Afifi Abdul Wadud</li>\r\n	<li>Hari Senin, 12 Rabiut Tsani 1441 H / 9 Desember 2019 M</li>\r\n	<li>Dari jam 19.30 Wib - 21.00 Wib</li>\r\n	<li>Di Masjid Darul Husna Warungboto</li>\r\n	<li>Jl. Veteran No.148, Warungboto, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta</li>\r\n</ul>\r\n\r\n<p><br />\r\nDisiarkan Langsung di FB Masjid Darul Husna Warungboto ? Disediakan konsumsi setelah kajian<br />\r\n<br />\r\nAjak keluarga, saudara, tetangga.. Kebaikan untuk sesama Keberkahan untuk semua..<br />\r\nMari ke masjid, kita makmurkan dengan ibadah kepada Allah ?????? ?????? ? Berikut Grup WhatsApp info kajian dan kegiatan di Masjid Darul Husna Warungboto, disediakan untuk kaum muslimin agar memperoleh informasi seputar kajian dan kegiatan Masjid Darul Husna</p>','Publish','Berita','Bersama\r\n? Ustadz Afifi Abdul Wadud ???? ????\r\n? Hari Senin, 12 Rabiut Tsani 1441 H / 9 Desember 2019 M\r\n? Dari jam 19.30 Wib - 21.00 Wib\r\n? Di Masjid Darul Husna Warungboto','pastikan-langkahmu-1627443796.jpg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 03:43:16','2021-07-28 03:39:23','2021-08-08 15:32:23'),(34,15,6,'ID','-','idul-adha-1442h','Idul Adha 1442H','<p>Pelaksanaan penyembelihan hewan qurban di Masjid Darul Husna berlangsung pada tanggal 20 Juli 2020 berjalan dengan lancar</p>','Publish','Berita','Pelaksanaan penyembelihan hewan qurban di Masjid Darul Husna berlangsung pada tanggal 20 Juli 2020 berjalan dengan lancar','img-1241-min-1627490552.JPG',NULL,NULL,NULL,NULL,NULL,'2021-07-28 16:36:15','2021-07-28 16:34:59','2021-07-28 16:42:33'),(35,15,6,'ID','-','pembubaran-panitia-idul-adha-1442h','Pembubaran Panitia Idul Adha 1442H','<p>Minggu, 29 Juli 2021 bertempat di rumah bapak Umar Abdul Aziz Pembubaran Panitia Idul Adha 1442H</p>','Publish','Berita','Minggu, 29 Juli 2021 bertempat di rumah bapak Umar Abdul Aziz Pembubaran Panitia Idul Adha 1442H','whatsapp-image-2021-07-25-at-105043-1627490938.jpeg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 16:48:59','2021-07-28 16:43:30','2021-07-28 16:48:59'),(36,15,6,'ID','-','kerja-bakti','Kerja Bakti','<p>Dalam rangka persiapan pelaksanaan hari besar Idul Adha 1442H. Panitia melaksanakan kerja bakti bersih-bersih dan menyiapkan kandang hewan qurban.</p>','Publish','Berita','Dalam rangka persiapan pelaksanaan hari besar Idul Adha 1442H. Panitia melaksanakan kerja bakti bersih-bersih dan menyiapkan kandang hewan qurban.','img-20210718-104315-1627491235.jpg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 16:53:56','2021-07-28 16:51:56','2021-07-28 16:53:56'),(37,15,6,'ID','-','pelatihan-penyembelihan-hewan-qurban','Pelatihan Penyembelihan Hewan Qurban','<p>Panitia Idul Adha 1442H mengadakan pelatihan penyembelihan hewan qurban yang diisi oleh dokter Sony. Dihadiri oleh panitia</p>','Publish','Berita','Panitia Idul Adha 1442H mengadakan pelatihan penyembelihan hewan qurban yang diisi oleh dokter Sony. Dihadiri oleh panitia','whatsapp-image-2021-06-13-at-232224-1627491565.jpeg',NULL,NULL,NULL,NULL,NULL,'2021-07-28 16:59:25','2021-07-28 16:56:28','2021-07-28 16:59:25');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_download` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `judul_download` varchar(200) DEFAULT NULL,
  `jenis_download` varchar(20) NOT NULL,
  `isi` text,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_download`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` VALUES (3,1,4,'ID','The AWS Standard 2.0 Bahasa Indonesia','Download','<p>Versi Bahasa Indonesia dari AWS Standar, Panduan dan Skoring Rubrik sudah tersedia online. <a href=\"https://a4ws.org/download-standard-2/\" style=\"color:#0563c1; text-decoration:underline\">Unduh</a> untuk Anda sekarang dan hubungi tim kami di Indonesia untuk mendukung Anda dalam perjalanan penatalayanan air.</p>','aws-standard-20-2019-bahasa-indonesia-1600653859.pdf',NULL,22,'2020-09-21 02:06:43'),(4,1,4,'ID','The AWS Standard Guidance 2.0 Bahasa Indonesia','Download','<p>The AWS Standard Guidance 2.0 Bahasa Indonesia</p>','aws-standard-20-guidance-final-january-2020-bahasa-indonesia-1600654043.pdf',NULL,2,'2020-09-21 02:08:09'),(5,1,4,'ID','The AWS Standard Scoring 2.0 Bahasa Indonesia','Download','<p>The AWS Standard Scoring 2.0 Bahasa Indonesia</p>','aws-standard-20-scoring-criteria-revised-june-1-2020-bahasa-indonesia-1600654078.pdf',NULL,1,'2021-07-29 03:40:37');
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `jenis_galeri` varchar(20) NOT NULL,
  `isi` text,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `popup_status` enum('Publish','Draft','','') NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `status_text` enum('Ya','Tidak','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (15,4,15,'ID','Kajian Rutin','Homepage','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.','slide1-1627395835.jpg','https://javawebmedia.com/kursus',NULL,'Publish',NULL,'Ya','2021-07-27 16:00:14'),(16,4,15,'ID','ATM Beras','Homepage','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','atm-1627397898.jpg',NULL,2,'Publish',NULL,'Ya','2021-07-28 17:04:11'),(17,4,15,'ID','Darul Afiah','Homepage','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','afiah-1627398225.jpg',NULL,NULL,'Publish',NULL,'Ya','2021-07-27 15:58:03');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `heading`
--

DROP TABLE IF EXISTS `heading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heading` (
  `id_heading` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT '0',
  `judul_heading` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `gambar` varchar(255) DEFAULT NULL,
  `halaman` varchar(255) DEFAULT 'NULL',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_heading`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heading`
--

LOCK TABLES `heading` WRITE;
/*!40000 ALTER TABLE `heading` DISABLE KEYS */;
INSERT INTO `heading` VALUES (1,0,'Berita dan Updates','<p>Berita dan Updates</p>','heading-03-1600256326.jpg','Berita','2020-09-16 11:38:46'),(2,0,'AWS Indonesia','<p>AWS Indonesia</p>','aws-indonesia-1600259780.jpg','AWS','2020-09-16 12:36:20'),(3,0,'Halaman Kontak','<p>Halaman Kontak</p>','kontak-1600257025.jpg','Kontak','2020-09-16 11:50:25'),(4,0,'Struktur Organisasi','<p>Struktur Organisasi</p>','board-and-team-300-1600260175.jpg','Team','2021-08-14 17:12:19'),(5,0,'Layanan','<p>Penatalayanan air memungkinkan pengguna air bekerjasama untuk mengidentifikasi dan mencapai tujuan bersama untuk pengelolaan air yang berkelanjutan dan keamanan air bersama. Penatalayanan air yang baik didefinisikan sebagai penggunaan air yang adil secara sosial dan budaya, berkelanjutan secara lingkungan dan menguntungkan secara ekonomi, dicapai melalui proses inklusif pemangku kepentingan yang mencakup tindakan berbasis wilayah operasional dan daerah tangkapan air (DAS).</p>\r\n<p>AWS Indonesia meripakan promosi dan penerapan penatalayanan air yang baik dan standar penatalayanan air internasional (<a href=\"https://a4ws.org/the-aws-standard-2-0/\">AWS Standard</a>) di Indonesia sebagai mitra negara <a href=\"https://waterstewardship.org.au/\">Alliance for Water Stewardship Asia-Pacific</a> dan <a href=\"https://a4ws.org/about/\">Alliance for Water Stewardship SCIO</a>.</p>\r\n<p>Apakah Anda tertarik untuk mempelajari lebih lanjut mengenai penatalayanan air dan aktivitas kami di Indonesia? Apakah Anda Manajer Sustainability atau Engineer Air yang ingin menerapkan penatalayanan air di wilayah operasional Anda? Hubungi kami dan mari kita mulai penatalayanan air bersama-sama.</p>','layanan-1600315713.jpg','Layanan','2020-09-17 04:08:33'),(6,0,'Dokumen','<p>Dokumen</p>','dokumen-1600317093.jpg','Dokumen','2020-09-17 04:31:33');
/*!40000 ALTER TABLE `heading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`),
  UNIQUE KEY `nama_kategori` (`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (6,4,'ID','berita','Berita',3,0,'2020-09-12 21:36:42'),(8,4,'ID','updates','Updates',2,NULL,'2020-09-12 21:36:35');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_agenda`
--

DROP TABLE IF EXISTS `kategori_agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_agenda` (
  `id_kategori_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_agenda` varchar(255) NOT NULL,
  `nama_kategori_agenda` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_agenda`
--

LOCK TABLES `kategori_agenda` WRITE;
/*!40000 ALTER TABLE `kategori_agenda` DISABLE KEYS */;
INSERT INTO `kategori_agenda` VALUES (4,'ID','kegiatan-eksternal','Kegiatan Eksternal',NULL,2),(6,'ID','kegiatan-internal','Kegiatan Internal',NULL,1);
/*!40000 ALTER TABLE `kategori_agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_download`
--

DROP TABLE IF EXISTS `kategori_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_download`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_download`
--

LOCK TABLES `kategori_download` WRITE;
/*!40000 ALTER TABLE `kategori_download` DISABLE KEYS */;
INSERT INTO `kategori_download` VALUES (1,'ID','dokumen','Dokumen','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',1),(4,'ID','download-pricelist','Download Pricelist','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',0),(5,'ID','studi-kasus','Studi Kasus','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',2),(6,'ID','webinar','Webinar','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',3);
/*!40000 ALTER TABLE `kategori_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_galeri`
--

DROP TABLE IF EXISTS `kategori_galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_galeri`
--

LOCK TABLES `kategori_galeri` WRITE;
/*!40000 ALTER TABLE `kategori_galeri` DISABLE KEYS */;
INSERT INTO `kategori_galeri` VALUES (4,'ID','kegiatan','Kegiatan',2),(6,'ID','kegiatan-kampus','Kegiatan Kampus',1);
/*!40000 ALTER TABLE `kategori_galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_kas`
--

DROP TABLE IF EXISTS `kategori_kas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_kas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kategori_kas_nama_unique` (`nama`),
  UNIQUE KEY `kategori_kas_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_kas`
--

LOCK TABLES `kategori_kas` WRITE;
/*!40000 ALTER TABLE `kategori_kas` DISABLE KEYS */;
INSERT INTO `kategori_kas` VALUES (1,'ATM Beras','ATM',0,NULL,NULL),(2,'Kajian Malam Jum\'at','KMJ',0,NULL,NULL),(3,'Infaq Ramadhan','RMD',0,NULL,NULL);
/*!40000 ALTER TABLE `kategori_kas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_staff`
--

DROP TABLE IF EXISTS `kategori_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_staff` (
  `id_kategori_staff` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_staff` varchar(255) NOT NULL,
  `nama_kategori_staff` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_staff`
--

LOCK TABLES `kategori_staff` WRITE;
/*!40000 ALTER TABLE `kategori_staff` DISABLE KEYS */;
INSERT INTO `kategori_staff` VALUES (4,'ID','koordinator-bidang-dan-staff','Koordinator Bidang dan Staff','Terdiri dari Divisi Kesehatan, Pendidikan, Dakwah, Humas, PHBI, Informasi dan Teknologi',2),(6,'ID','ketua-dan-pengurus-harian','Ketua dan Pengurus Harian','Terdiri dari ketua, sekertaris dan bendahara',1);
/*!40000 ALTER TABLE `kategori_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keuangan`
--

DROP TABLE IF EXISTS `keuangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keuangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `amount` int(11) NOT NULL,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keuangan_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keuangan`
--

LOCK TABLES `keuangan` WRITE;
/*!40000 ALTER TABLE `keuangan` DISABLE KEYS */;
INSERT INTO `keuangan` VALUES (1,'ATM.IN/2107001','in','Dana Masuk','2021-07-13',1000000,1,4,NULL,NULL),(2,'ATM.IN/2107002','in','Dana Masuk','2021-07-14',500000,1,4,NULL,NULL),(3,'KMJ.IN/2107001','in','Infaq Kajian','2021-07-15',200000,2,4,NULL,NULL),(5,'KMJ.IN/2107002','in','Infaq Kajian','2021-07-08',400000,2,4,NULL,NULL),(6,'KMJ.OUT/2107001','out','beli snack','2021-07-08',120000,2,4,NULL,NULL),(7,'ATM.OUT/2107001','out','beli beras','2021-07-13',300000,1,4,NULL,NULL),(8,'RMD.OUT/2107001','out','Takjil','2021-07-13',1200000,3,4,NULL,NULL),(9,'KMJ.OUT/2107002','out','tali asih ustadz','2021-07-08',250000,2,4,NULL,NULL),(10,'ATM.IN/2107003','in','Dana Masuk','2021-07-18',350000,1,4,NULL,NULL),(12,'ATM.OUT/2107002','out','Beli beras','2021-07-18',200000,1,4,NULL,NULL),(13,'RMD.OUT/2107002','out','tali asih ustadz','2021-07-12',200000,3,4,NULL,NULL),(15,'ATM.IN/2107004','in','Dana Masuk','2021-07-21',550000,1,4,NULL,NULL),(16,'RMD.IN/2108001','in','Infaq Subuh','2021-08-13',200000,3,4,NULL,NULL),(17,'RMD.OUT/2108001','out','Takjil','2021-08-14',150000,3,4,NULL,NULL);
/*!40000 ALTER TABLE `keuangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfigurasi`
--

DROP TABLE IF EXISTS `konfigurasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `nama_singkat` varchar(200) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tagline2` varchar(255) DEFAULT NULL,
  `tentang` text,
  `deskripsi` text,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) NOT NULL,
  `nama_twitter` varchar(255) NOT NULL,
  `nama_instagram` varchar(255) NOT NULL,
  `nama_google_plus` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `google_map` text,
  `judul_1` varchar(200) DEFAULT NULL,
  `pesan_1` varchar(200) DEFAULT NULL,
  `judul_2` varchar(200) DEFAULT NULL,
  `pesan_2` varchar(200) DEFAULT NULL,
  `judul_3` varchar(200) DEFAULT NULL,
  `pesan_3` varchar(200) DEFAULT NULL,
  `judul_4` varchar(200) DEFAULT NULL,
  `pesan_4` varchar(200) DEFAULT NULL,
  `judul_5` varchar(200) DEFAULT NULL,
  `pesan_5` varchar(200) NOT NULL,
  `judul_6` varchar(200) DEFAULT NULL,
  `pesan_6` varchar(200) NOT NULL,
  `isi_1` varchar(500) DEFAULT NULL,
  `isi_2` varchar(500) DEFAULT NULL,
  `isi_3` varchar(500) DEFAULT NULL,
  `isi_4` varchar(500) DEFAULT NULL,
  `isi_5` varchar(500) DEFAULT NULL,
  `isi_6` varchar(500) DEFAULT NULL,
  `link_1` varchar(255) DEFAULT NULL,
  `link_2` varchar(255) DEFAULT NULL,
  `link_3` varchar(255) DEFAULT NULL,
  `link_4` varchar(255) DEFAULT NULL,
  `link_5` varchar(255) DEFAULT NULL,
  `link_6` varchar(255) DEFAULT NULL,
  `javawebmedia` text,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `rekening` text,
  `prolog_topik` text,
  `prolog_program` text,
  `prolog_sekretariat` text,
  `prolog_aksi` text,
  `prolog_kolaborasi` text,
  `prolog_sebaran` text,
  `gambar_berita` varchar(255) DEFAULT NULL,
  `prolog_agenda` text,
  `prolog_wawasan` text,
  `protocol` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_timeout` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `judul_pembayaran` varchar(255) DEFAULT NULL,
  `isi_pembayaran` text,
  `gambar_pembayaran` varchar(255) DEFAULT NULL,
  `link_bawah_peta` varchar(255) DEFAULT NULL,
  `text_bawah_peta` varchar(255) DEFAULT NULL,
  `cara_pesan` enum('Keranjang Belanja','Formulir Pemesanan') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfigurasi`
--

LOCK TABLES `konfigurasi` WRITE;
/*!40000 ALTER TABLE `konfigurasi` DISABLE KEYS */;
INSERT INTO `konfigurasi` VALUES (1,'ID','Masjid Darul Husna','Masjid Darul Husna','Melayani umat sejak 1984','Dari masjid untuk masyarakat','<p style=\"text-align:justify\">Masjid Darul Husna Warungboto berdiri sejak tahun 1984 M. Dalam sudut pandang umat Muslim,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Muhammad\" title=\"Muhammad\">Nabi Muhammad</a>&nbsp;diangkat ke Sidratulmuntaha dalam peristiwa&nbsp;<a href=\"https://id.wikipedia.org/wiki/Isra_Mikraj\" title=\"Isra Mikraj\">Isra Mikraj</a>&nbsp;dari tempat ini setelah sebelumnya dibawa dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Masjidil_Haram\" title=\"Masjidil Haram\">Masjidilharam</a>&nbsp;di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Makkah\" title=\"Makkah\">Makkah</a>. Masjidilaqsa juga menjadi kiblat umat Islam generasi awal hingga tujuh belas bulan setelah hijrah sampai kemudian dialihkan ke Ka&rsquo;bah di Masjidilharam.</p>\r\n\r\n<p style=\"text-align:justify\">Sedangkan menurut kepercayaan Yahudi, tempat yang sekarang menjadi Masjidilaqsa juga dipercaya menjadi tempat berdirinya Bait Suci pada masa lalu.&nbsp;Berdasarkan sumber Yahudi, Bait Suci pertama dibangun oleh Sulaiman (Salomo) putra Daud (Daud) pada tahun 957 SM dan dihancurkan Babilonia pada 586 SM. Bait Suci kedua dibangun pada tahun 516 SM dan dihancurkan oleh Kekaisaran Romawi pada tahun 70 M. Umat Yahudi dan Kristen juga percaya bahwa peristiwa Ibrahim (Abraham) yang hendak menyembelih putranya, Isma&#39;il, juga dilakukan di tempat ini. Masjidilaqsa juga memiliki kaitan erat dengan para nabi dan tokoh Bani Israel yang juga disucikan dan dihormati dalam ketiga agama.</p>\r\n\r\n<p style=\"text-align:justify\">Pada masa kepemimpinan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kekhalifahan_Umayyah\" title=\"Kekhalifahan Umayyah\">Dinasti Umayah</a>, para khalifah memerintahkan berbagai pembangunan di kompleks Masjidilaqsa yang kemudian menghasilkan berbagai bangunan yang masih bertahan hingga saat ini, di antaranya adalah Jami&#39; Al-Aqsa dan Kubah Shakhrah.<sup><a href=\"https://id.wikipedia.org/wiki/Masjidilaqsa#cite_note-3\">[3]</a></sup>&nbsp;Kubah Shakhrah sendiri diselesaikan pada tahun 692 M, menjadikannya sebagai salah satu bangunan Islam tertua di dunia.</p>','Melayani umat sejak 1984','https://masjiddarulhusna.com','darulhusnamosque@gmail.com','darulhusnamosque@gmail.com','Jl. Veteran No. 148, Warungboto, Umbulharjo, Yogyakarta','085715100485','+6281210697841','081210697841','logo-index.png','logo-mdh.png','masjid darul husna, darul husna, masjid, kajian',NULL,'https://www.facebook.com/takmir.darulhusna',NULL,'https://www.instagram.com/masjiddarulhusna/','https://www.youtube.com/channel/UCmm6mFZXYQ3ZylUMa0Tmc2Q','Masjid Darul Husna Warungboto','','masjiddarulhusna','','MDH','<iframe src=\"https://maps.google.com/maps?q=masjid%20darul%20husna%20warungboto&t=&z=13&ie=UTF8&iwloc=&output=embed\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','Tempat belajar nyaman','fa fa-home','Materi Kursus Selalu Update','fa fa-laptop','Jadwal Flexibel','fa fa-thumbs-up','Menjaga Amanah','fa-check-square-o','Tempat belajar nyaman','fa-home','Online service','fa-laptop','Kami menyediakan tempat belajar yang nyaman dan menyenangkan serasa di rumah sendiri','Materi kursus kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari','Bagi Anda siswa yang ingin belajar, kami menerapkan jadwal flexibel','Kami senantiasa menjaga amanah yang diberikan kepada donatur agar sampai di tangan yang berhak.','Kami menyediakan tempat belajar yang nyaman dan menyenangkan','Website kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari','','','','','','','<p>Berawal dari keinginan ibunda Hj.Masah Muhari diakhir hidupnya untuk mewakaan sebagian hartanya dijalan Allah, gayungpun bersambut pada bulan Mei 2011 saat kami akan melaksanakan ibadah umrah, Seorang rekan kami sesama Jamaah bernama ustadzah Hj. Zainur Fahmid memberikan informasi Tentang Anggota yang hendak mewakaan sebidang tanahnya di wilayah Beji Timur. Kami pun memanjatkan doa di kota suci dengan penuh rasa harap pertolongan Allah untuk menunjukan jalan terbaik-Nya, maka sepulang umroh kami mengadakan pertemuan di kediaman Ibu Dra Hj Ratna Mardjanah untuk membicarakan visi misi kami dalam wakaf tersebut dan sepakat untuk mendirikan Istana Yatim Riyadhul Jannah ini.</p>\r\n<p>Nama Riyadhul Jannah Sendiri diambil dari nama pengelola wakaf (H. Ahmad Riyadh Muchtar, Lc) dan pemberi wakaf (Dra Hj Ratna Mardjanah). Istana Yatim Riyadhul Jannah hadir untuk melayani dan memfasilitasi segala kebutuhan anak yatim, terutama pendidikan agama, akhlak dan kehidupan yang layak untuk bekal masa depan mereka yang cerah agar bisa memberi manfaat bagi umat. Harapan kami semoga dengan membangunkan istana untuk anak yatim, maka Allah akan berikan istana-Nya di surga kelak dan kita termasuk manusia yang bisa memberika manfaat bagi sesama sebagaimana sabda Rasulullah SAW yang artinya:&nbsp;</p>\r\n<p>&ldquo;Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya&rdquo;&nbsp;</p>\r\n<p>erimakasih atas segala bentuk bantuan yang dipercayakan kepada kami baik secara materi, tenaga dan kiran serta doa para muhsinin dan muhsinat Istana Yatim Riyadhul Jannah selama ini, mulai dari rencana pendirian hingga berkembang seperti saat ini. Semoga segala amal menjadi shadaqah jariyah disisi-Nya.&nbsp;</p>\r\n<p>&nbsp;</p>','masjid-mdh.jpg','fsH_KhUWfho','<table id=\"dataTables-example\" class=\"table table-bordered\" width=\"100%\">\r\n<thead>\r\n<tr>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"19%\">Nama Bank</th>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"21%\">Nomor Rekening</th>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"7%\">Atas nama</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>BCA KCP Margo City</td>\r\n<td>4212548204</td>\r\n<td>Andoyo</td>\r\n</tr>\r\n<tr>\r\n<td>Bank Mandiri KCP Universitas Indonesia</td>\r\n<td>1570001807768</td>\r\n<td>Eflita Meiyetriani</td>\r\n</tr>\r\n<tr>\r\n<td>Bank BNI Syariah Kantor Cabang Jakarta Selatan</td>\r\n<td>0105301001</td>\r\n<td>Eflita Meiyetriani</td>\r\n</tr>\r\n</tbody>\r\n</table>','<p>Dalam mewujudkan pembangunan berkelanjutan, pemerintah kabupaten anggota LTKL telah mengidentifikasi dan memilih topik yang sesuai dengan kondisi di daerahnya. Ada 5 topik prioritas yang dipilih dengan penerapan yang disesuaikan kembali di masing-masing kabupaten.</p>',NULL,'<p>Setelah Lingkar Temu Kabupaten Lestari (LTKL) diinisiasi, kesekretariatan dibentuk untuk membantu para pemerintah kabupaten anggota bekerja dan berkolaborasi. Walaupun tidak memiliki mandat implementasi, Sekretariat LTKL menjadi vital dalam melancarkan koordinasi, pengumpulan basis data, hingga pelaporan perkembangan. Sekretariat LTKL juga diperkuat dengan kehadiran personil yang telah berpengalaman di bidang management pengetahuan, program pembangunan berkelanjutan hingga kebijakan.</p>','','<p>Lingkar Temu Kabupaten Lestari (LTKL) mengedepankan kolaborasi dalam mewududkan pembangunan berkelanjutan. Ada 10 kabupaten yang tersebar di 6 provinsi di Indonesia telah menjadi anggota LTKL.</p>\r\n<p>Hingga kini, berbagai pihak telah ikut berkolaborasi, mulai dari pemerintah kabupaten, sekeretariat LTKL, mitra pembangunan hingga pihak swasta.</p>','','balairung-budiutomo-01.jpg','<p>Acara yang ditampilkan merupakan kumpulan acara LTKL, mitra, maupun pemerintah kabupaten anggota LTKL, mulai dari acara seminar hingga festival.</p>','<p>LTKL bukan satu-satunya yang bergerak dalam mewujudkan pembangunan berkelanjutan, serta upaya penanggulangan perubahan iklim. Ikuti terus perkembangan usaha LTKL serta rekan-rekan lain menuju bumi dan Indonesia yang lestari.</p>','smtp','ssl://mail.javawebmedia.com','465','12','info@javawebmedia.com','javawebmedia','Metode Pembayaran Produk','<p>Anda dapat melakukan pembayaran dengan beberapa cara, yaitu:</p>\r\n<ol>\r\n<li><strong>Pembayaran Tunai</strong>, dapat Anda serahkan secara langsung ke salah satu staff Java Web Media</li>\r\n<li><strong>Pembayar Via Transfer Rekening</strong></li>\r\n</ol>\r\n<p>Lakukan transfer biaya atas layanan dan produk&nbsp;<strong>Java Web Media</strong>&nbsp;ke salah satu rekening di bawah ini.</p>\r\n<h3>Konfirmasi Pembayaran</h3>\r\n<p>Anda dapat melakukan konfirmasi pembayaran melalui:</p>\r\n<ul>\r\n<li><strong>Melalui Email</strong>, silakan kirim bukti pembayaran ke:&nbsp;<strong><a href=\"mailto:contact@javawebmedia.co.id?subject=Konfirmasi%20Pembayaran\">contact@javawebmedia.co.id</a></strong></li>\r\n<li><strong>Melalui Whatsapp</strong>, kirimkan bukti pembayaran Anda ke&nbsp;<strong>+6281210697841</strong></li>\r\n<li><strong>Melalui Formulir Konfirmasi Pembayaran</strong>, Anda dapat mengunggah bukti pembayaran Anda melalui form&nbsp;<strong><a title=\"Konfirmasi Pembayaran\" href=\"https://javawebmedia.com/konfirmasi\">&nbsp;Konfirmasi Pembayaran</a></strong></li>\r\n</ul>','payment.jpg',NULL,NULL,'Formulir Pemesanan',15,'2021-07-29 04:06:49');
/*!40000 ALTER TABLE `konfigurasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2021_07_10_084327_create_pemasukan_table',1),(2,'2021_07_10_164801_create_pengeluaran_table',2),(3,'2021_07_12_150413_create_kategori_kas_table',3),(4,'2021_07_13_210244_create_keuangan_table',4),(5,'2021_08_14_142503_create_beras_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekening`
--

DROP TABLE IF EXISTS `rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekening`
--

LOCK TABLES `rekening` WRITE;
/*!40000 ALTER TABLE `rekening` DISABLE KEYS */;
INSERT INTO `rekening` VALUES (1,'BCA KCP DEPOK','4212-5482-04','ANDOYO','bca.jpg',1,'2020-06-11 21:36:46'),(2,'BNI SYARIAH DEPOK','0611-9927-06','CV JAVA WEB MEDIA','Logo_BNI_Syariah.png',2,'2019-11-12 23:54:18'),(4,'BANK MANDIRI KCU DEPOK','157-00-0180776-8','EFLITA MEIYETRIANI','mandiri.png',4,'2019-11-12 23:58:42'),(5,'BANK BNI KCU DEPOK','0105-3010-01','EFLITA MEIYETRIANI','bni.png',5,'2019-11-13 00:00:13');
/*!40000 ALTER TABLE `rekening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_staff` int(11) NOT NULL,
  `slug_staff` varchar(255) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(200) DEFAULT NULL,
  `status_staff` varchar(20) NOT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,4,4,'hendri-divisi-dakwah','Hendri','Divisi Dakwah',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431918.jpg','Ya',NULL,1,'2021-08-08 14:11:58'),(2,4,4,'muhammad-nova-hakim-divisi-phbi','Muhammad Nova Hakim','Divisi PHBI',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431960.jpg','Ya',NULL,2,'2021-08-08 14:12:40'),(3,4,4,'muhammad-abdul-aziz-divisi-kemakmuran','Muhammad Abdul Aziz','Divisi Kemakmuran',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628432034.jpg','Ya',NULL,3,'2021-08-08 14:13:54'),(4,4,6,'drs-joko-triyono-ketua-takmir','Drs. Joko Triyono','Ketua Takmir',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431596.jpg','Ya',NULL,1,'2021-08-08 14:07:45'),(5,4,6,'rifki-fauzi-wakil-ketua','Rifki Fauzi','Wakil Ketua',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431709.jpg','Ya',NULL,2,'2021-08-08 14:08:29'),(6,4,6,'suryadi-sekertaris','Suryadi','Sekertaris',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431750.jpg','Ya',NULL,3,'2021-08-08 14:09:10'),(7,4,6,'sutoyo-bendahara','Sutoyo','Bendahara',NULL,NULL,NULL,NULL,NULL,'person-flat-icon-8-1628431785.jpg','Ya',NULL,4,'2021-08-08 14:09:45');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `kode_rahasia` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Admin','admin@gmail.com','admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin',NULL,'testimonials-1.jpg','2021-08-07 10:42:36'),(15,'Muhammad Duha Ramadani','duharamadhani@gmail.com','duha','990ad1fd8a8f184350fae5991fab24cba26aaf07','Admin',NULL,'poto-1627378098.jpeg','2021-07-27 09:28:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text,
  `video` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `bahasa` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (66,'Profil Masjid Darul Husna Warungboto','Homepage','Profil Masjid Darul Husna Warungboto','Yun2MbnSKxw',1,'Indonesia','masjid-mdh-1627404164.jpg',15,'2021-07-27 16:42:44');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-20 22:29:25
