-- --------------------------------------------------------
-- Database Projectd
-- Version 1.0
-- --------------------------------------------------------
-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3373
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13
-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
	`id` varchar(128) NOT NULL,
	`ip_address` varchar(45) NOT NULL,
	`timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
	`data` blob NOT NULL,
	KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `user`
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(73) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`username_user`, `password_user`) VALUES
('denny', '$2y$10$WNEjLV3zNWY1j/kQaoBcYeQq2C9I7wsd96q2IPpwQqhsNUXR7VAle');

--
-- Table structure for table `project`
--
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `kode_project` varchar(6) NOT NULL,
  `nama_project` varchar(80) NOT NULL,
  `mulai_project` date NOT NULL,
  `selesai_project` date NOT NULL,
  `folder_project` text NOT NULL,
  `gambar_project` text NOT NULL,
  `level_project` ENUM('Web','Android','Desain') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`kode_project`, `nama_project`, `mulai_project`, `selesai_project`, `folder_project`, `gambar_project`, `level_project`) VALUES
('ELG001', 'E-Learning', '2020-08-28', '2020-10-30', 'elearning', 'gambar.jpg', 'Web'),
('HDK001', 'Helpdesk', '2019-11-24', '2020-01-15', 'helpdesk', 'gambar.jpg', 'Web'),
('PKT001', 'PKetuV', '2019-07-24', '2019-09-30', 'pketuv', 'gambar.jpg', 'Web'),
('HPS001', 'HePOS - Point of Sale', '2020-11-02', '2020-12-30', 'hepos', 'gambar.jpg', 'Web'),
('IVD001', 'iVenden.co', '2020-11-05', '2020-11-06', 'ivendenco', 'gambar.jpg', 'Desain');

--
-- Table structure for table `safelink`
--
DROP TABLE IF EXISTS `safelink`;
CREATE TABLE `safelink` (
  `kode_safelink` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama_safelink` varchar(80) NOT NULL,
  `slug_safelink` varchar(250) NOT NULL,
  `url_safelink` text NOT NULL,
  `hits_safelink` bigint NOT NULL DEFAULT '0',
  `created_safelink` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `safelink`
--

INSERT INTO `safelink` (`kode_safelink`, `nama_safelink`, `slug_safelink`, `url_safelink`, `hits_safelink`, `created_safelink`) VALUES
(1, 'Hostingan.id', 'hostinganid', 'https://my.hostingan.id/aff.php?aff=54', NULL, '2020-11-04 19:01:00'),
(2, 'IDCloudhost', 'idcloudhost', 'https://my.idcloudhost.com/aff.php?aff=3817', NULL, '2020-11-04 19:02:00'),
(3, 'DewaBiz', 'dewabiz', 'https://my.dewabiz.com/aff.php?aff=904', NULL, '2020-11-04 19:02:00'),
(4, 'Helpdesk Denny', 'helpdesk', 'https://helpdesk.denny.my.id/', NULL, '2020-11-04 19:02:00'),
(5, 'E-Learning Denny', 'elearning', 'https://elearning.denny.my.id/', NULL, '2020-11-04 19:02:00'),
(6, 'Pemilihan Ketua Group Voting', 'pketuv', 'https://pketuv.denny.my.id/', NULL, '2020-11-06 19:02:00'),
(7, 'HePOS - Point of Sale', 'hepos', 'https://hepos.denny.my.id/', NULL, '2020-12-06 14:02:00'),
(8, 'iVenden.co', 'ivendenco', 'https://www.instagram.com/ivenden.co/', NULL, '2020-11-24 13:39:00'),
(9, 'SoundCloud Flux1on', 'soundcloud', 'https://soundcloud.com/flux1on', NULL, '2020-11-04 19:02:00'),
(10, 'JapaneseDixec', 'japanesedixec', 'https://soundcloud.com/flux1on/flux1on-japanesedixec-free-beats', NULL, '2020-11-04 19:02:00');

--
-- Indexes for dumped tables
--

ALTER TABLE `ci_sessions` ADD PRIMARY KEY (`id`, `ip_address`);
ALTER TABLE `user` ADD PRIMARY KEY (`username_user`);
ALTER TABLE `project` ADD PRIMARY KEY (`kode_project`),ADD INDEX(`level_project`);
ALTER TABLE `safelink` ADD UNIQUE (`slug_safelink`);