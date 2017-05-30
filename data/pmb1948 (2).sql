-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mei 2017 pada 03.19
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pmb1948`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
`id` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_angkatan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `kode`, `nama`, `id_universitas`, `jurusan`, `id_angkatan`) VALUES
(1, 123, 'Fauzan', 1, 'Sistem Informatika', '1'),
(2, 124, 'Iqbal', 2, 'Bahasa Jerman', '3'),
(3, 125, 'Dadan', 4, 'Teknik Informatika', '3'),
(4, 126, 'Muhammad', 2, 'Matematika', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id`, `nama`, `tahun`) VALUES
(1, 'Lorem', '2017'),
(3, 'Ipsum', '2016'),
(4, 'Dolor', '2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `waktu_dibuat` datetime DEFAULT NULL,
  `waktu_disunting` datetime DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `detail`, `waktu_dibuat`, `waktu_disunting`, `gambar`) VALUES
(18, 'PMB Peduli Bencana Situ Gintung', '<p>Perhimpunan Mahasiswa Bandung peduli terhadap bencana di Situ Gintung yang memakan korban hingga 100 orang. PMB mengirim 20 orang anggotanya untuk membantu para korban situ gintung yang tergabung dengan POSKO JENGGALA.</p>\r\n', '2017-05-24 16:11:00', '0000-00-00 00:00:00', 'pmb situ gintung (1)1543984869.jpg'),
(19, 'PMB Bersama Festival Braga', '<p><strong>Puluhan Bebegig Sawah Huhujanan Keliling Bandung</strong></p>\r\n\r\n<p>Bandung - Guyuran hujan tak menyurutkan sekitar 50 bebegig Sawah untuk pawai berkeliling lima ruas Jalan Kota Bandung. Orang-orangan sawah yang dimodifikasi ini diarak mulai dari Balai Kota Bandung hingga Jalan Braga.</p>\r\n\r\n<p>Kegiatan ini merupakan pra event dari Braga Festival 2011 yang akan digelar 23-25 September 2011 mendatang. Parade Bebegig Sawah tersebut dilepas oleh Wali Kota Bandung Dada Rosada.</p>\r\n\r\n<p>&quot;Bebegig itu kan hanya ada di kampung, orang kota belum tahu. Filosofinya kan bebegig itu mengawasi hama, jadi pesan moralnya kita itu pasti selalu ada yang mengawasi, &quot; ujar Dada usai melepas Karnaval Bebegig Sawah di Balai Kota Bandung, Jalan Wastukancana, Rabu (21/9/2011).</p>\r\n\r\n<p>Rute yang dilalui iring iringan ini adalah, Jalan Merdeka, Jalan Lembong, Jalan Tamblong, Jalan Naripan, dan finish di Jalan Braga.Pelepasan dimulai dengan penampilan Seni Helaran dari SD Rancabolang.</p>\r\n\r\n<p>Kemudian dengan selaras, para peserta yang masing-masing membawa bebegig membuat lingkaran dan melakukan sedikit tarian.</p>\r\n', '2017-05-24 16:11:00', '0000-00-00 00:00:00', 'braga1543987014.jpg'),
(20, 'Sekertariat Bersama Mahasiswa Lokal', '<p>Sekretariat Bersama Organisasi Mahasiswa Lokal (SOMAL) 12 Juni 1965 - 2009</p>\r\n\r\n<p>Shall We Return?</p>\r\n\r\n<p>oleh :&nbsp;<em>Momok Sritomo W. Soebroto ( GMS&#39;70)</em></p>\r\n\r\n<p>Banyak diantara kita barangkali yang tidak &ldquo;ngeh&rdquo; dengan kata atau istilah SOMAL ini. Sebuah nama yang tidak punya arti apa-apa untuk kondisi sekarang ini; tetapi sejarah politik kemahasiswaan pasti tidak pernah melupakannya. Khususnya bagi mereka yang pernah merasakan hiruk-pikuk dunia kemahasiswaan di saat-saat pertengahan tahun 1965. Ya, hampir 45 tahun yang lalu. Tepatnya 12 Juni 1965, saat dimana dunia kemahasiswaan mencatat berkumpulnya beberapa organisasi mahasiswa lokal seperti Ikatan Mahasiswa Djakarta (IMADA), Masyarakat Mahasiswa Bogor (MMB), Perhimpunan Mahasiswa Bandung (PMB), Corpus Studiosorum Bandungense (CSB), Ikatan Mahasiswa Bandung (IMABA), dan Gerakan Mahasiswa Surabaya (GMS) berkumpul dan mendeklarasikan terbentuknya Sekretariat Bersama Organisasi Mahasiswa Lokal (SOMAL). Selanjutnya ikut bergabung juga Ikatan Mahasiswa&nbsp;Pontianak&nbsp;(IMAPON) dan Ikatan Mahasiswa&nbsp;Yogyakarta&nbsp;(IMAYO). Suasana politik saat itu benar-benar membuat organisasi mahasiswa lokal seperti Imada, PMB, GMS dan lain-lain merasa berkepentingan untuk berhimpun diri, membangun jaringan dan sekaligus kekuatan. Khususnya didasarkan pada kesamaan nasib dan kesamaan garis perjuangan dalam menjaga eksistensi masing-masing yang terancam pada saat politik dicanangkan sebagai panglima.<br />\r\n<br />\r\nTekanan dan suasana politik tahun 60-an benar-benar telah membuat dunia kemahasiswaan menjadi lebih dinamis, meskipun dalam berbagai kasus terus menyeret kampus dan mahasiswa untuk masuk dalam ranah politik praktis. GMS seperti halnya dengan organisasi mahasiswa lokal lain (SOMAL : PMB, CSB, IMADA, MMB, GMS, IMAPON dan IMAYO) yang awalnya lebih banyak bergulat dengan aktivitas seputar dunia kampus mulai menggeliat dan tidak mau ketinggalan didalam pergerakan/ perjuangan di jalanan. Meskipun berbagai seruan &ldquo;back to campus&rdquo; telah dikumandangkan sejak lama, namun tidak mudah untuk membawa kembali mereka yang sudah terlanjur menikmati dunia barunya. Ranah politik akhirnya telah memberikan alternatif sebagai pilihan &ldquo;pengabdian&rdquo; kepada nusa-bangsa-negara; selain dunia profesi yang terkait dengan bekal keilmuan yang digeluti para aktivis organisasi mahasiswa. Kita telah mencatat beberapa tokoh SOMAL yang pernah memberi warna khas dunia kemahasiswaan, maupun politik saat itu seperti Sarwono Kusumaatmadja (PMB), Rahmat Witoelar (PMB), Moestahid Astari (GMS), Awan Karmawan Burhan (CSB), Lilik Asdjudiredja (IMABA), Sjahrir (IMADA), Marsilam Simandjuntak (IMADA), Erna Walinono (PMB), Trimoelja Darmasetia Soerjadi (GMS), dll.<br />\r\n<br />\r\nAdigum yang terkesan heroik &ldquo;Student today is Leader tomorrow&rdquo; sangat populer dan sering didengungkan oleh aktivis pergerakan mahasiswa tahun 60-an terus dijadikan sebagai sumber insipirasi bagaimana sebuah organisasi mahasiswa harus dilanggengkan eksistensinya. Sebuah slogan yang sungguh sangat efektif untuk membangkitkan semangat dalam merancang pola kaderisasi. Khususnya pada saat merekrut anggota dan menjaga bagaimana organisasi bisa tumbuh dan berkembang agar tetap survive. Networking yang sangat kuat dengan kawan-kawan yang pernah tergabung dalam SOMAL (PMB, CSB, IMADA, MMB, GMS, IMAPON dan IMAYO) dan dilandasi pula dengan nilai-nilai independensi, pluralisme, non-sektarian, dan lain-lain akan merupakan modal dasar yang sungguh masih sangat relevan dengan tantangan global yang harus dihadapi oleh bangsa sekarang ini. Hal tersebut bisa dijadikan &ldquo;entry point&rdquo; yang mampu memberikan daya tarik untuk melakukan revitalisasi dalam kerangka melanjutkan tradisi kepemimpinan SOMAL di dunia kemahasiswaan maupun politik nasional.&nbsp;Kapan lagi&nbsp;kita bisa berkumpul, membangun tali silatuhrahim dalam ikut memberi sumbangan pemikiran dan kontribusi bagi kejayaan almamater, nusa, bangsa dan NKRI.<br />\r\nSemoga Allah SWT memberikan ridhoNya kepada kita semua.</p>\r\n\r\n<p>Berikut adalah Anggota SOMAL di Indonesia :</p>\r\n', '2017-05-24 16:21:25', '0000-00-00 00:00:00', 'pmb situ gintung (2)1544001061.jpg'),
(21, 'Pendaftaran Anggota 2011', '<p><strong>Masa Penerimaan Anggota Baru PMB 2011</strong></p>\r\n\r\n<p>Pendaftaran Anggota Perhimpunan Mahasiswa Bandung akan di laksanakan pada tanggal ----- hingga ------</p>\r\n\r\n<p>Untuk mahasiswa yang berminat untuk bergabung bersama kami, silahkan mengisi kolom di bawah.</p>\r\n\r\n<p>untuk syarat-syarat calon Anggota bisa dilihat di&nbsp;<em>Persyaratan</em>.</p>\r\n', '2017-05-24 16:21:49', '0000-00-00 00:00:00', 'braga21544001042.jpg'),
(22, 'PMB Peduli Merapi', '<p>PMB yang tergabung bersama Ikatan Mahasiswa Peduli Merapi ( GMS, IMADA, IMAYO, PMB, MMB ) ini bergerak membantu para korban Gunung Merapi yang terjadi pada 26 oktober 2010. PMB bersama organisasi lainnya segera membantu warga setempat dalam pengevakuasian korban letusan Gunung Merapi.</p>\r\n', '2017-05-24 16:22:07', '0000-00-00 00:00:00', 'pmb peduli merapi1543987071.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `id_model` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `waktu_dibuat` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `nama`, `model`, `id_model`, `gambar`, `waktu_dibuat`) VALUES
(1, 'foto a', 'kegiatan', 1, 'fam.jpg', NULL),
(2, 'foto b', 'artikel', 1, 'sdf.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
`id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `detail`, `gambar`, `tanggal`, `waktu`) VALUES
(1, 'Khitanan masal 9 Oktober 2012', 'Sebanyak 100 anak dari kalangan ekonomi menengah ke bawah turut berpartispasi dalam kegiatan tersebut. Ketua pelaksana khitanan massal PMB Aggih Firdansyah mengatakan kegiatan khitanan massal ini sebagai salah satu pengabdian PMB pada masyarakat.\r\n\r\nSelain itu, khitanan massal ini merupakan kegiatan tahunan yang diadakan oleh PMB sebagai bentuk kepedulian sosial, mengingat biaya khitan yang semakin mahal, yang diselenggarakan saat liburan sekolah.\r\n\r\n"Dengan aksi yang PMB lakukan ini, kami harap dapat membantu sesama terutama bagi mereka yang membutuhkan," kata Aggih saat ditemui INILAH.COM, di Jalan Merdeka Kota Bandung, Minggu (7/10/2012).\r\n\r\nDia menjelaskan acara khitanan massal ini merupakan implementasi dari tanggung jawab sosial PMB terutama dalam hal memberikan bantuan kepada masyarakat sekitar.\r\n\r\nDirinya juga berharap acara-acara kecil seperti ini dapat diikuti oleh teman-teman mahasiswa lainnya. Karena dengan bentuk pengabdian pada masyarakat seperti ini, dapat membantu mereka yang membutuhkan.\r\n\r\nSementara itu, sambil menunggu antrean, anak-anak yang hendak dikhitankan dihibur dengan berbagai kesenian Sunda, atraksi pencak silat dan diarak keliling menggunakan delman. "Ini semua dilakukan untuk menciptakan suasana agar anak-anak tidak merasa tegang," ungkapnya.\r\n\r\nDia menambahkan selain dikhitan secara gratis, peserta mendapatkan bingkisan berupa sarung, baju koko, kopiah, tas dan peralatan sekolah serta uang tunai. "Semua bingkisan ini kami peroleh dari PMB angkatan 1967 dan iuran anggota PMB," ucapnya', 'berita11538730567.jpg', '2017-04-20', '10:55 WIB'),
(2, 'Seminar Nasional', 'Seminar Nasional " Tantangan dan Peluang Perekonomian Nasional "\r\n\r\nseminar yang di adakan di jakarta hotel crowne plaza adalah seminar yang di adakan oleh Perhimpunan Mahasiswa Bandung yang berkerja sama dengan Alumni PMB 1967. Dalam seminar yang di ikuti oleh Arifin Panigoro, DR. Syarief Hasan (Menteri Koperasi dan UKM), DR. Siswono Yudohusodo (Mantan Menpera dan Mentrans), DR. Ir. Muslimin Nasution (Mantan Menhut dan Perkebunan), DR. Ir. Bambang Subianto (Mantan Menkeu), DR. Ir. Bayu Krisnamurthi (Wakil Menteri Perdagangan) dan di ikuti juga oleh sejumlah mahasiswa dari Bandung, Bogor dan Jakarta seperti UNPAD, ITB, IPB dsbnya.', 'berita31538728552.jpg', '2017-07-13', '09:00 WIB'),
(3, 'PMB Futsal Cup 2012', 'Perhimpunan Mahasiswa Bandung FUTSAL CUP 2012 yang memperebutkan piala bergilir PMB, piala WALIKOTA, dan piala DISPORA.\r\n\r\npertandingan yang sangat meriah ini di menangkan oleh :\r\n\r\nTingkat Universitas :\r\n1. Universitas MARANATHA ( MAGNETIK )\r\n2. PS ITB \r\n3. Universitas Kebangsaan\r\n\r\nTingkat SMA :\r\n1. SMAN 16 Bandung\r\n2. SMAN 1 Cimahi\r\n3. SMAN 18 Bandung', 'berita41538730290.jpg', '2017-07-16', '11:00 WIB'),
(4, 'Malam Khidmat', 'Dalam rangka memperingati hari ulang tahun PMB yang ke 64 yang akan di laksanakan pada tanggal 17 Maret 2012 di aula GELANGGANG GENERASI MUDA (GGM) kota Bandung. Dalam acara MALAM KHIDMAT dengan tema "SATU KESAN SERIBU PESAN".', 'berita61538730330.jpg', '2017-06-14', '10:55 WIB'),
(5, 'Membangun Kebersamaan Untuk Indonesia Lebih Baik Bersama PMB 1967', 'Baksos PMB bersama alumni PMB 1967 ini dilakukan selama 1 tahun penuh di tahun 2012 dari awal Januari hingga akhir tahun bulan Desember. Rangkaian kegiatan diisi dengan sumbangan kepada YAYASAN YATIM PIATU, PESANTREN, SUNATAN MASAL, dan NIKAH MASAL bagi masyarakat yang kurang mampu, dan di harapkan kegiatan ini dapat terpenuhi sesuai dengan target dan tidak sampai salah sasaran.', 'berita71538730370.jpg', '2017-06-13', '10:55 WIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `nama`, `gambar`) VALUES
(3, 'Persatuan Mahasiswa Bandung (PMB) 1948', 'slide11538740367.jpeg'),
(4, 'Caption Kedua', 'slide21538740380.jpeg'),
(5, 'Caption Ketiga', 'slide31538740392.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokoh`
--

CREATE TABLE IF NOT EXISTS `tokoh` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tokoh`
--

INSERT INTO `tokoh` (`id`, `nama`, `keterangan`, `gambar`, `urutan`) VALUES
(13, 'Bacharuddin Jusuf Habibie - PMB 1959', 'adalah Presiden Republik Indonesia yang ketiga. Ia menggantikan Soeharto yang mengundurkan diri dari jabatan presiden pada tanggal 21 Mei 1998. Ia belajar teknik mesin di Institut Teknologi Bandung tahun 1954. Pada 1955 sampai 1965 ia melanjutkan studi teknik penerbangan, spesialisasi konstruksi pesawat terbang, di RWTH Aachen, Jerman Barat, menerima gelar diploma engineer pada tahun 1960 dan gelar doktor engineer pada tahun 1965 dengan predikat summa cum laude.', '11543982895.png', 1),
(14, 'Prof. Dr. Ir. Wiratman Wangsadinata - PMB 1954', 'adalah salah satu pakar dan praktisi di bidang konstruksi Indonesia. Ia merupakan seorang putra terbaik bangsa yang tidak diragukan dedikasinya, integritas dan profesionalisme sebagaiengineer dan entrepreneur bahkan guru besar yang sukses di bidang infrastruktur. Karya-karyanya yang monumental telah menghiasi perjalanan sejarah bangsa Indonesia diantaranya adalah Gedung Wisma Nusantara, Wisma Dharmala, Bakrie Tower dan Duku Atas Tunnel di Jakarta, Jembatan Ampera di Palembang, Jembatan Rajamandala di Bandung, Restorasi Candi Borobudur di Magelang serta Keuliling Dam di Aceh.', '21543982942.png', 2),
(15, 'Adnan Buyung Nasution - PMB 1958', 'Mantan jaksa yang menjadi advokat handal ini sejak kecil sudah keliahatan berbakat aktivis. pernah menjadi anggota DPR/MPR tapi di recall. Sempat menganggur satu tahun sebelum membuka kantor pengacara dan membentuk lembaga bantuan hukum Jakarta yang kemudian menjadi YLBHI dan di kenal sebagai lokomotif demokrasi.\r\nBuyung lahir di Jakarta, 20 juli 1934. Hidupnya cukup sarat dengan tantangan. Sejak umur 12 tahun, Buyung bersama adiknya Samsi Nasution sudah menjadi pedagang kaki lima menjual barang loakan di pasar Kranggan, Yogyakarta.\r\nLulus SMA, Buyung hijrah ke Bandung dan mendaftar kuliah di ITB jurusan Teknik Sipil. Disana Buyung aktif di Perhimpunan Mahasiswa Bandung (PMB). Tetapi Buyung hanya berahan 1 tahun di ITB, lalu pindah ke fakultas Gabungan Hukum, Ekonomi dan Sosial Politik UGM, Yogyakarta. Tidak lama dari situ, pada tahun 1957 Buyung pindah ke fakultas Hukum dan Ilmu Pengetahuan Kemasyarakatan, UI, Jakarta.', '31543982961.png', 3),
(16, 'Ir. Sarwono Kusumaatmadja - PMB 1963', 'Sarwono Kusumaatmadja merupakan salah satu anggota alumni PMB angkatan 1963. Sarwono adalah anggota Dewan Perwakilan Daerah dari DKI Jakarta untuk masa bakti [ada tahun 2004 sampai 2009. Ia pernah menjabat sebagai Menteri Kelautan dan Perikanan periode Kabinet Persatuan Nasional. Ia meraih gelar sarjana pada tahun 1974 dari Jurusan Teknik Sipil Institut Teknologi Bandung. Sebelumnya, ia menamatkan pendidikan tingkat atas di Kolese Kanisius. Pada periode 1971 sampai 1988, ia menjabat sebagai anggota DPR-RI dan Sekretaris Jenderal Dewan Pimpinan Pusat Golkar (1983-1988). Selain menjabat Menteri Negara Lingkungan Hidup pada Kabinet Pembangunan VI (1993-1998), ia juga menjabat Menteri Negara Pendayagunaan Aparatur Negara pada Kabinet Pembangunan V (1988-1993). Periode 1999-2001, ia menjabat Menteri Kelautan dan Perikanan Indonesia pada Kabinet Persatuan Nasional dan terpilih dalam pemilu parlemen Indonesia 2004 sebagai anggota Dewan Perwakilan Daerah DKI Jakarta pada tahun 2004. Sekarang beliau adalah Dewan Komisaris PT. Energy Management Indonesia (Persero) EMI, sebagai Komisaris Utama.', '41543982986.png', 4),
(17, 'Siswono Yudohusodo - PMB 1961', 'Siswono Yudo Husodo adalah seorang politikus Indonesia. Ia pernah menjadi calon Wakil Presiden Indonesia pada Pemilu 2004 sebagai pasangan dari capres Amien Rais. Mereka berdua kalah pada pemilu tersebut. Yodo Husodo menjabat sebagai Menteri Negara Perumahan Rakyat pada Kabinet Pembangunan V (1988-1993) dan Menteri Transmigrasi pada Kabinet Pembangunan VI (1993-1998).\r\nSiswono adalah mantan Ketua Himpunan Pengusaha Muda Indonesia (1973-1977) dan Ketua Persatuan Pengusaha Real Estate Indonesia (1983-1986). Ia sudah menjadi petani sejak tahun 1999 dan menjadi anggota MPR mewakili petani. Kesibukannya sudah lebih banyak di pertanian. Lulusan Teknik Sipil Institut Teknik Bandung (ITB) tahun 1968 ini fasih menerangkan bagaimana mengawinkan domba, bagaimana memilih bibit domba unggul, dan bagaimana bercocok tanam tembakau dan sayur-mayur.', '51543983013.png', 5),
(18, 'Arifin Panigoro - PMB 1962', 'Sebelum Orde Baru tumbang tahun 1998, nama Arifin Panigoro hanya dikenal kalangan terbatas sebagai pengusaha di Bidang Perminyakan. Lingkaran pergaulannya lebih banyak dengan Pertamina dan pengusaha perminyakan internasional.  Namun, ketika reformasi tengah “hamil tua” yang ditandai dengan maraknya aksi demonstrasi mahasiswa,\r\nkesadaran politik Arifin bangkit. Ia telah menjadi simbol kebangkitan politik pengusaha. Tidak hanya itu, ia turut serta secara aktif membantu pergerakan mahasiswa,\r\ntermasuk menyiapkan nasi bungkus untuk dikirim kepada mahasiswa yang tengah menggelar aksi di Gedung DPR Senayan di Jakarta.', '61543983035.png', 6),
(19, 'Wimar Witoelar - PMB 1963', 'Lahir pada tanggal 14 juli 1945 di Padalarang Jawa Barat. Beliau merupakan putra termuda dari 5 bersaudara pasangan Raden Achmad Witoelar K. dan Nyi Raden Toti S. Dia juga merupakan adik kandung dari Rachmat Witoelar, Menteri Negara Lingkungan Hidup RI Kabinet Indonesia Bersatu dan adik ipar dari Erna Witoelar yang juga mantan Menteri Indonesia.\r\nBeliau bergabung bersama organisasi PMB pada tahun 1963.', '71543983053.png', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE IF NOT EXISTS `universitas` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Unikom', 'Jl. Dipatiukur No 112-114.', ''),
(2, 'Univeritas Pendidikan Indonesia', 'Jl. Setiabudi No. 229 Gd. FPIPS, UPI, Isola, Sukasari, Sukasari Bandung, Jawa Barat 40154', ''),
(3, 'Institut Teknologi Bandung', 'Jl. Ganesha No.10, Lb. Siliwangi, Coblong, Kota Bandung, Jawa Barat 40132', ''),
(4, 'Telkom Univeritas', 'Jl. Telekomunikasi No. 01, Terusan Buah Batu, Sukapura, Dayeuhkolot, Bandung, Jawa Barat 40257', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_role`) VALUES
(1, 'Admin', 'bisabisa', 1),
(2, 'Dadan', 'bisabisa', 0),
(3, 'Iqbal', 'bisabisa', 0),
(4, 'Fauzan', 'bisabisa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`id`), ADD KEY `universitas` (`id_universitas`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokoh`
--
ALTER TABLE `tokoh`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tokoh`
--
ALTER TABLE `tokoh`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
