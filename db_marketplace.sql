-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `photo_profil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id`, `id_user`, `no_hp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `photo_profil`) VALUES
(1, 1, '081234567890', 'laki-laki', 'Bandung', '1980-05-15', 'Jl. Cihampelas No. 123, Bandung', NULL),
(2, 2, '089876543210', 'perempuan', 'Bandung', '1985-09-25', 'Komplek Antapani Indah, Blok B5, Bandung', NULL),
(3, 3, '085551234567', 'laki-laki', 'Jakarta', '1999-03-10', 'Apartemen Thamrin Residence, Tower A3, Jakarta', NULL),
(4, 4, '081112223333', 'perempuan', 'Depok', '2000-11-05', 'Jl. Padjajaran No. 45, Bogor', NULL),
(5, 5, '083334445555', 'laki-laki', 'Jerman', '1998-07-20', 'Perumahan BSD City, Blok F5, Tangerang', NULL),
(6, 6, '089173091272', 'laki-laki', 'Seoul', '2000-03-31', 'Perumahan Kelapa Gading Permai, Blok D10, Jakarta', 'Unreleased YOON SAN-HA 3.jfif'),
(7, 7, '083092189328', 'laki-laki', 'Gunpo, Korea Selatan', '1999-02-23', 'Komplek Pluit Indah, Blok F9, Tangerang', 'E8WnQmBVIAo7pZi.jpg'),
(8, 8, '081239182930', 'perempuan', 'Sukadana, Kab. Lampung Timur', '2000-12-29', 'Jatinangor, Sumedang, Jawa Barat', 'amalia.png'),
(9, 9, '081392839292', 'laki-laki', 'Seoul', '1996-03-15', 'Perumahan Bogor Residence, Blok A4, Bogor', 'E80GrJoVUAA3T7F.jpg'),
(10, 10, '089273813279', 'perempuan', 'Seoul', '2000-03-28', 'Seoul, Korea Selatan', '366635448_729709552503740_7779222130457386829_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kode` varchar(5) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`kode`, `nama_kategori`) VALUES
('A0001', 'Shirt'),
('A0002', 'T-Shirt'),
('A0003', 'Jacket'),
('B0001', 'Pants'),
('B0002', 'Skirt'),
('C0001', 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(5) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_kategori`, `nama_produk`, `deskripsi`, `harga`, `diskon`, `stok`, `thumbnail`) VALUES
(1, 'A0001', 'Kemeja wanita biru muda ukuran L', '<p>Kemeja wanita biru muda dengan ukuran L adalah pilihan sempurna untuk gaya kasual yang elegan. Kemeja ini dirancang dengan perhatian terhadap detail dan terbuat dari bahan berkualitas tinggi yang memberikan kenyamanan dan gaya sepanjang hari. Warna biru muda yang lembut membuatnya cocok untuk berbagai kesempatan, baik itu untuk bekerja di kantor, pergi berbelanja, atau berkumpul dengan teman-teman. Dengan ukuran L yang nyaman, kemeja ini akan memberikan Anda penampilan yang modis dan chic.</p> <p>Spesifikasi:</p> <ul> <li>Bahan: Katun</li> <li>Warna: Biru muda</li> <li>Ukuran: L (Large)</li> <li>Jenis: Kemeja wanita</li> <li>Model: Potongan reguler</li> </ul>', 109000, 0, 10, 'beautiful-woman-wearing-blue-shirt-apparel-studio-shoot_53876-102838.jpg'),
(2, 'A0001', 'Kemeja putih polos wanita lengan panjang', '<p>Kemeja putih polos wanita lengan panjang adalah pilihan yang sempurna untuk tampilan kasual yang bersih dan elegan. Terbuat dari bahan katun berkualitas tinggi, kemeja ini memberikan kenyamanan sepanjang hari. Desain polosnya yang sederhana membuatnya sangat serbaguna dan mudah dipadukan dengan berbagai gaya pakaian. Dengan lengan panjang, kemeja ini cocok untuk berbagai kesempatan, dari acara formal hingga santai bersama teman-teman.</p>', 110000, 10, 5, 'casual-white-blouse-women-rsquo-s-fashion_53876-101510.jpg'),
(3, 'A0001', 'Kemeja beige polos pria lengan pendek', '<p>Kemeja beige polos pria lengan pendek adalah pilihan yang sempurna untuk tampilan kasual yang bersih dan elegan. Terbuat dari bahan katun berkualitas tinggi, kemeja ini memberikan kenyamanan sepanjang hari. Desain polosnya yang sederhana membuatnya sangat serbaguna dan mudah dipadukan dengan berbagai gaya pakaian.</p>', 110000, 0, 15, 'man-beige-shirt-pants-casual-wear-fashion_53876-102165.jpg'),
(4, 'A0002', 'Kaos crop-top wanita putih', '<p>Kaos crop-top wanita putih adalah pilihan yang tepat untuk berbagai kesempatan, mulai dari hangout santai dengan teman hingga acara-acara santai di musim panas. Dengan kualitas bahan yang baik, potongan yang modis, dan kenyamanan sepanjang hari, produk ini akan menjadi pilihan yang sempurna untuk melengkapi koleksi pakaian Anda. Tampil cantik dan gaya dengan kaos crop-top wanita putih yang chic ini.</p>', 119000, 15, 25, 'happy-woman-white-crop-top-outdoor-photoshoot_53876-105544.jpg'),
(5, 'A0002', 'Kaos hitam lengan panjang wanita', '<p>Kaos hitam lengan panjang wanita adalah pilihan yang sempurna untuk gaya kasual yang nyaman dan bergaya. Terbuat dari bahan berkualitas tinggi, kaos ini dirancang khusus untuk wanita yang ingin tampil modis dalam berbagai kesempatan. Dengan lengan panjang, kaos ini memberikan perlindungan tambahan pada musim sejuk atau bisa digulirkan saat cuaca hangat. Warna hitam yang klasik membuatnya mudah dipadukan dengan berbagai pakaian, menjadikannya item wajib dalam lemari pakaian Anda.</p> <ul> <li><strong>Bahan:</strong> Katun</li> <li><strong>Warna:</strong> Hitam</li> <li><strong>Jenis:</strong> Kaos lengan panjang wanita</li> <li><strong>Ukuran:</strong> Tersedia dalam berbagai ukuran</li> </ul>', 59000, 10, 20, 'blonde-girl-black-sweater-denim-skirt-winter-apparel-shoot_53876-102291.jpg'),
(6, 'A0002', 'Kaos hitam lengan panjang pria', '<p>Kaos hitam lengan panjang pria adalah pilihan yang sempurna untuk gaya kasual yang nyaman dan bergaya. Terbuat dari bahan berkualitas tinggi, kaos ini dirancang khusus untuk pria yang ingin tampil modis dalam berbagai kesempatan. Dengan lengan panjang, kaos ini memberikan perlindungan tambahan pada musim sejuk atau bisa digulirkan saat cuaca hangat. Warna hitam yang klasik membuatnya mudah dipadukan dengan berbagai pakaian, menjadikannya item wajib dalam lemari pakaian Anda.</p> <ul> <li><strong>Bahan:</strong> Katun</li> <li><strong>Warna:</strong> Hitam</li> <li><strong>Ukuran:</strong> Tersedia dalam berbagai ukuran</li> </ul>', 69000, 15, 18, 'man-black-sweater-black-bucket-hat-youth-apparel-shoot_53876-102294.jpg'),
(7, 'A0002', 'Kaos polo warna merah pria', '<p>Kaos polo merah adalah pilihan yang sempurna untuk gaya kasual yang nyaman dan bergaya. Terbuat dari bahan berkualitas tinggi, kaos ini dirancang khusus untuk pria yang ingin tampil modis dalam berbagai kesempatan. </p> <ul> <li><strong>Bahan:</strong> Katun</li> <li><strong>Warna:</strong> Merah</li> <li><strong>Ukuran:</strong> Fit to all</li> </ul>', 89000, 40, 15, 'man-red-polo-shirt-apparel-studio-shoot_53876-102825.jpg'),
(8, 'A0003', 'BFF Hoodie Merah Tali Putih', '<p>Tunjukkan persahabatan Anda dengan gaya yang modis dengan BFF Hoodie Merah Tali Putih ini. Hoodie ini bukan hanya sekadar pakaian, tetapi juga simbol persahabatan yang kuat. Terbuat dari bahan berkualitas tinggi, hoodie ini nyaman dipakai dan cocok untuk segala musim. Warna merah yang cerah dengan tali putih memberikan sentuhan gaya yang mencolok, membuat Anda dan sahabat Anda tampil lebih keren.</p> <p>Spesifikasi:</p> <ul> <li>Bahan: Katun</li> <li>Warna: Merah dengan tali putih</li> <li>Jenis: Hoodie</li> <li>Model: Lengan panjang</li> </ul>', 650000, 30, 10, 'bff-printed-red-hoodie_53876-105408.jpg'),
(9, 'B0001', 'Celana Kulot Denim Panjang All Size Fit to XL', '<p>Celana kulot denim panjang adalah pilihan yang sempurna untuk gaya kasual yang nyaman sepanjang hari. Terbuat dari bahan denim berkualitas tinggi yang lembut dan tahan lama, celana ini tidak hanya memberikan kenyamanan, tetapi juga gaya yang chic. Dengan potongan kulot yang longgar, celana ini cocok untuk semua ukuran tubuh hingga XL.</p> <p>Fitur Produk:</p> <ul> <li>Bahan denim berkualitas tinggi.</li> <li>Potongan kulot yang longgar dan nyaman.</li> <li>All size fit to XL, cocok untuk berbagai bentuk tubuh.</li> <li>Desain yang stylish untuk gaya kasual yang trendi.</li> <li>Mudah dipadukan dengan berbagai pakaian dan aksesori.</li> </ul> <p>Spesifikasi:</p> <ul> <li>Bahan: Denim</li> <li>Ukuran: All size (fit to XL)</li> <li>Panjang: Panjang hingga mata kaki</li> <li>Warna: Biru denim</li> </ul>', 149000, 10, 8, 'asian-woman-smiling-cheerful-expression-full-body-portrait_53876-127136.jpg'),
(10, 'B0001', 'Celana beige pendek pria ukuran L', '<p>Celana beige pendek pria adalah pilihan yang sempurna untuk gaya kasual yang nyaman sepanjang hari. Terbuat dari bahan yang berkualitas tinggi yang lembut dan tahan lama, celana ini tidak hanya memberikan kenyamanan, tetapi juga gaya yang chic.</p>', 129000, 5, 16, 'man-wearing-beige-shorts-close-up_53876-125260.jpg'),
(11, 'B0002', 'Rok denim', '<p>Rok denim wanita adalah pilihan sempurna untuk menambahkan sentuhan gaya kasual yang trendi ke koleksi pakaian Anda. Terbuat dari bahan denim berkualitas tinggi, rok ini akan memberikan Anda tampilan yang chic dan nyaman sepanjang hari. Dengan potongan yang pas dan desain yang fleksibel, rok ini cocok untuk berbagai kesempatan, dari jalan-jalan santai hingga pertemuan dengan teman-teman. Tampilan klasik denimnya membuatnya sesuai dengan berbagai gaya busana.</p>', 120000, 0, 14, 'blonde-girl-black-sweater-denim-skirt-winter-apparel-shoot_53876-102291.jpg'),
(12, 'B0002', 'Rok desain vintage biru vector remix', '<p>Tampilkan gaya retro yang anggun dengan Rok Desain Vintage Biru ini. Rok ini menggabungkan desain klasik dengan nuansa warna biru yang khas era vintage. Terbuat dari bahan berkualitas tinggi yang nyaman, rok ini adalah pilihan yang sempurna untuk menghadiri acara khusus, berjalan-jalan santai, atau hanya untuk tampil berbeda dengan gaya yang unik. Dengan potongan yang pas dan desain yang timeless, rok ini akan menjadi salah satu item favorit dalam koleksi pakaian Anda.</p>', 140000, 50, 15, 'blue-vintage-skirt-vector-remix-from-artwork-by-ann-gene-buckley_53876-116285.jpg'),
(13, 'C0001', 'Topi Creative Warna Mustard', '<p>Tampilkan gaya kreatif Anda dengan topi warna mustard yang unik ini. Topi Creative adalah pilihan sempurna untuk mereka yang ingin menonjol dengan gaya yang berbeda. Didesain dengan perhatian terhadap detail, topi ini menampilkan warna mustard yang cerah dan menawan. Cocok untuk digunakan dalam berbagai kesempatan, baik itu saat jalan-jalan di kota atau berkumpul dengan teman-teman. Jadikan topi ini aksen gaya Anda dan buat penampilan Anda lebih menarik.</p> <p>Spesifikasi:</p> <ul> <li>Bahan: Kain</li> <li>Warna: Mustard</li> <li>Ukuran: One size fits most (Satu ukuran untuk semua)</li> <li>Jenis: Topi snapback</li> <li>Jenis Kelamin: Unisex</li> </ul>', 99000, 0, 10, 'beautiful-woman-baseball-cap-headband-fashion-studio-shoot_53876-102175.jpg'),
(14, 'C0001', 'Bucket hat unisex warna hitam', '<p>Bucket hat unisex warna hitam adalah aksesori gaya yang sempurna untuk melengkapi penampilan Anda. Terbuat dari bahan berkualitas tinggi, topi ini cocok untuk pria dan wanita dengan berbagai gaya. Warna hitam yang klasik membuatnya sesuai untuk berbagai kesempatan, dari berjalan-jalan di taman hingga festival musik akhir pekan. Dengan desain yang simpel namun stylish, bucket hat ini akan menjadikan Anda tampil lebih keren dan trendi.</p>', 69000, 0, 12, 'black-bucket-hat-unisex-accessory_53876-106055.jpg'),
(15, 'C0001', 'Tote bag hijau dengan rhombus pattern', '<p>Tote bag hijau adalah aksesori yang praktis dan gaya untuk menunjang aktivitas sehari-hari Anda. Dengan desain sederhana namun elegan, tote bag ini cocok untuk berbagai kesempatan, baik untuk berbelanja, pergi ke kantor, atau berkumpul dengan teman-teman. Terbuat dari bahan kanvas berkualitas tinggi, tote bag ini sangat tahan lama dan dapat membawa berbagai barang dengan mudah. Warna hijau yang segar menambahkan sentuhan alami pada penampilan Anda.</p>', 70000, 20, 22, 'green-tote-bag-with-rhombus-pattern-basic-apparel-shoot_53876-102257.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_user`, `id_produk`, `rating`, `pesan`) VALUES
(1, 8, 2, 4.5, 'Saya membeli kaos crop-top ini untuk liburan musim panas, dan saya sangat senang dengan pembelian saya. Warna putihnya membuat saya terlihat cerah, dan saya merasa sejuk saat memakainya. Namun, perlu diperhatikan bahwa potongan crop-top ini cukup pendek, jadi pastikan Anda siap dengan itu.'),
(2, 2, 4, 5, 'Kaos crop-top ini luar biasa! Saya suka banget dengan potongannya yang stylish, dan bahan yang digunakan sangat nyaman. Sangat cocok untuk dipakai sehari-hari.'),
(3, 10, 9, 4, 'Celana kulot ini sangat nyaman dipakai sehari-hari. Saya suka potongan kulotnya yang longgar, dan bahan denimnya berkualitas tinggi. Meskipun saya memiliki tubuh berukuran XL, celana ini tetap pas dan tidak terasa sempit. Sangat puas dengan pembelian ini!'),
(4, 5, 9, 4, 'Saya membeli celana kulot ini untuk istri saya, dan dia sangat senang. Celana ini cocok untuk berbagai kesempatan, dari pergi berbelanja hingga makan malam romantis. Bahan denimnya tidak cepat aus, dan ukuran all size memudahkan dalam memilih. Harganya juga terjangkau. Terima kasih!'),
(5, 10, 9, 3, 'Saya suka desain celana ini, tetapi sayangnya setelah beberapa kali mencucinya, warnanya mulai memudar. Saya harus mencuci dengan hati-hati agar tidak semakin rusak. Namun, dari segi kenyamanan dan potongan kulotnya, tidak ada yang bisa saya keluhkan.'),
(6, 8, 13, 5, 'Topi ini benar-benar unik dan stylish. Saya suka warna mustardnya yang cerah dan desainnya yang berbeda dari topi biasa. Topi ini juga sangat nyaman digunakan, dan saya sering menerima pujian atas penampilan saya ketika mengenakannya. Sangat puas dengan pembelian ini!'),
(7, 2, 1, 3, 'Kemeja ini terlihat cantik, tetapi sayangnya saya merasa bahwa ukurannya agak besar untuk ukuran L. Saya harus menjahitnya sedikit agar lebih sesuai dengan tubuh saya. Selain itu, kualitasnya cukup baik, dan warna biru muda tetap cantik setelah beberapa kali mencuci.'),
(8, 4, 1, 5, 'Saya sangat senang dengan kemeja ini. Warna biru muda yang lembut sangat cantik, dan bahan katunnya nyaman di kulit. Ukuran L cocok dengan tubuh saya dengan sempurna. Kemeja ini bisa dipakai di berbagai kesempatan, dari kantor hingga pertemuan dengan teman-teman. Sangat puas dengan pembelian ini!'),
(9, 9, 8, 4, 'Hoodie ini sangat keren, dan saya suka desainnya. Bahan katunnya nyaman, tetapi sayangnya setelah beberapa kali mencucinya, warnanya sedikit memudar. Namun, saya masih menyukai hoodie ini dan sering mengenakannya saat bersama sahabat-sahabat saya.'),
(10, 1, 14, 5, 'Bucket hat ini luar biasa! Bahan katunnya sangat nyaman dan cocok dengan kepala saya. Saya sering menggunakannya saat berjemur di pantai atau hanya berjalan-jalan di kota. Warna hitamnya juga serasi dengan hampir semua pakaian saya. Saya sangat puas dengan pembelian ini.'),
(11, 2, 14, 5, 'Bucket hat ini adalah aksesori yang simpel tapi keren. Saya suka desainnya yang unisex, sehingga saya bisa meminjamkannya ke pacar saya juga.'),
(12, 8, 11, 5, 'Saya sangat menyukai rok denim ini! Bahannya nyaman.'),
(13, 4, 11, 5, 'Rok denim ini sangat keren dan chic.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `status` enum('berhasil','proses','gagal','oncart') DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_produk`, `status`) VALUES
(1, 2, 9, 'berhasil'),
(2, 5, 8, 'oncart'),
(3, 3, 14, 'berhasil'),
(4, 3, 6, 'gagal'),
(5, 3, 7, 'oncart'),
(6, 1, 13, 'oncart'),
(7, 1, 10, 'gagal'),
(8, 1, 10, 'berhasil'),
(9, 5, 13, 'berhasil'),
(10, 5, 3, 'gagal'),
(11, 4, 2, 'gagal'),
(12, 4, 2, 'berhasil'),
(13, 2, 11, 'berhasil'),
(14, 1, 14, 'berhasil'),
(15, 2, 15, 'oncart'),
(16, 3, 8, 'berhasil'),
(17, 4, 15, 'gagal'),
(86, 1, 8, 'oncart'),
(94, 8, 9, 'oncart'),
(95, 8, 9, 'oncart'),
(96, 8, 5, 'oncart'),
(97, 8, 14, 'oncart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'John Doe', 'john.doe@example.com', '482c811da5d5b4bc6d497ffa98491e38', 'user'),
(2, 'Jane Smith', 'jane.smith@example.com', '482c811da5d5b4bc6d497ffa98491e38', 'user'),
(3, 'Mike Johnson', 'mike.johnson@example.com', '482c811da5d5b4bc6d497ffa98491e38', 'user'),
(4, 'Emily Wilson', 'emily.wilson@example.com', '656138aa3d5954f2eb4554f3069e94f8', 'user'),
(5, 'David Clark', 'david.clark@example.com', 'f2401c4d5d72bbe7275df759a0e48278', 'user'),
(6, 'Sanha Yoon', 'ddana.yoon@gmail.com', '21ad0099ef2012c34ef1db12414bda7e', 'user'),
(7, 'Min Hyuk Park', 'p.minhyuk@gmail.com', '5d1fcc23902b78ba045a94e376cecb22', 'user'),
(8, 'Amalia Nur Fitri', 'amalia@gmail.com', '42b691a892d12f0fa84156078e99eb0f', 'user'),
(9, 'Jinwoo Park', 'jinwoo.park@gmail.com', 'e0cd7fb149fd0b61c43579f661f9ac25', 'user'),
(10, 'Sua Moon', 'moon.sua@gmail.com', 'c1768c71889d37bc88d881c2ac2ad318', 'user'),
(11, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_user_ibfk_1` (`id_user`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_ibfk_1` (`kode_kategori`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ibfk_1` (`id_user`),
  ADD KEY `transaksi_ibfk_2` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_produk` (`kode`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
