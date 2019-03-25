-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 09:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondokyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `ID_AGAMA` int(11) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`ID_AGAMA`, `NAMA`) VALUES
(1, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1543409556),
('guru', '17', 1544160605),
('guru', '6', 1543412325),
('murid', '11', 1543494777),
('murid', '14', 1543495074),
('murid', '15', 1543495231),
('murid', '16', 1544100243),
('murid', '2', 1543409564),
('murid', '35', 1543496045),
('murid', '4', 1543411643),
('murid', '5', 1543412145),
('murid', '8', NULL),
('tenagaUmum', '6', 1543412580);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/admin/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/default/*', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/default/index', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/*', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/create', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/index', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/update', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/menu/view', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/permission/*', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/create', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/index', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/update', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/permission/view', 2, NULL, NULL, NULL, 1543458371, 1543458371),
('/admin/role/*', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/assign', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/create', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/delete', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/index', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/remove', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/update', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/role/view', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/*', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/assign', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/create', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/index', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/route/remove', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/*', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/create', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/index', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/update', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/rule/view', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/user/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/activate', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/delete', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/user/index', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/admin/user/login', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/logout', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/signup', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/admin/user/view', 2, NULL, NULL, NULL, 1543458372, 1543458372),
('/agama/*', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/agama/create', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/agama/delete', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/agama/index', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/agama/update', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/agama/view', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/index', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/default/view', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/user/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/detail-mata-pelajaran/*', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/detail-mata-pelajaran/create', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/detail-mata-pelajaran/delete', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/detail-mata-pelajaran/index', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/detail-mata-pelajaran/update', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/detail-mata-pelajaran/view', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/gii/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/*', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/action', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/diff', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/index', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/preview', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/gii/default/view', 2, NULL, NULL, NULL, 1543458373, 1543458373),
('/guru/*', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/guru/create', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/guru/delete', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/guru/index', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/guru/update', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/guru/view', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/*', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/create', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/delete', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/index', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/update', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/jenis-keluarga/view', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas-murid/*', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/kelas-murid/create', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/kelas-murid/delete', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/kelas-murid/index', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas-murid/update', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/kelas-murid/view', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/kelas/*', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas/create', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas/delete', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas/index', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas/update', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/kelas/view', 2, NULL, NULL, NULL, 1543458374, 1543458374),
('/keluarga-murid/*', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/keluarga-murid/create', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/keluarga-murid/delete', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/keluarga-murid/index', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/keluarga-murid/update', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/keluarga-murid/view', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/*', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/create', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/delete', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/index', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/update', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/mata-pelajaran/view', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/*', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/create', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/delete', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/index', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/update', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/murid/view', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/nilai-akademik/*', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/nilai-akademik/create', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/nilai-akademik/delete', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/nilai-akademik/index', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/nilai-akademik/update', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/nilai-akademik/view', 2, NULL, NULL, NULL, 1543458375, 1543458375),
('/pembayaran-spp/*', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/pembayaran-spp/create', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/pembayaran-spp/delete', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/pembayaran-spp/index', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/pembayaran-spp/update', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/pembayaran-spp/view', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/*', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/create', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/delete', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/index', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/update', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/perizinan-murid/view', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/*', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/create', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/delete', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/index', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/update', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/semester/view', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/site/*', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/site/error', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/site/index', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/site/login', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/site/logout', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/tahun-ajaran/*', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tahun-ajaran/create', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tahun-ajaran/delete', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tahun-ajaran/index', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/tahun-ajaran/update', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tahun-ajaran/view', 2, NULL, NULL, NULL, 1543458376, 1543458376),
('/tenaga-umum/*', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tenaga-umum/create', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tenaga-umum/delete', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tenaga-umum/index', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tenaga-umum/update', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('/tenaga-umum/view', 2, NULL, NULL, NULL, 1543458377, 1543458377),
('admin', 2, NULL, NULL, NULL, 1543409513, 1543409513),
('guru', 2, NULL, NULL, NULL, 1543409523, 1543409523),
('murid', 2, NULL, NULL, NULL, 1543409531, 1543409531),
('tenagaUmum', 2, NULL, NULL, NULL, 1543409540, 1543409540);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('admin', '/admin/*'),
('admin', '/admin/assignment/*'),
('admin', '/admin/assignment/assign'),
('admin', '/admin/assignment/index'),
('admin', '/admin/assignment/revoke'),
('admin', '/admin/assignment/view'),
('admin', '/admin/default/*'),
('admin', '/admin/default/index'),
('admin', '/admin/menu/*'),
('admin', '/admin/menu/create'),
('admin', '/admin/menu/delete'),
('admin', '/admin/menu/index'),
('admin', '/admin/menu/update'),
('admin', '/admin/menu/view'),
('admin', '/admin/permission/*'),
('admin', '/admin/permission/assign'),
('admin', '/admin/permission/create'),
('admin', '/admin/permission/delete'),
('admin', '/admin/permission/index'),
('admin', '/admin/permission/remove'),
('admin', '/admin/permission/update'),
('admin', '/admin/permission/view'),
('admin', '/admin/role/*'),
('admin', '/admin/role/assign'),
('admin', '/admin/role/create'),
('admin', '/admin/role/delete'),
('admin', '/admin/role/index'),
('admin', '/admin/role/remove'),
('admin', '/admin/role/update'),
('admin', '/admin/role/view'),
('admin', '/admin/route/*'),
('admin', '/admin/route/assign'),
('admin', '/admin/route/create'),
('admin', '/admin/route/index'),
('admin', '/admin/route/refresh'),
('admin', '/admin/route/remove'),
('admin', '/admin/rule/*'),
('admin', '/admin/rule/create'),
('admin', '/admin/rule/delete'),
('admin', '/admin/rule/index'),
('admin', '/admin/rule/update'),
('admin', '/admin/rule/view'),
('admin', '/admin/user/*'),
('admin', '/admin/user/activate'),
('admin', '/admin/user/change-password'),
('admin', '/admin/user/delete'),
('admin', '/admin/user/index'),
('admin', '/admin/user/login'),
('admin', '/admin/user/logout'),
('admin', '/admin/user/request-password-reset'),
('admin', '/admin/user/reset-password'),
('admin', '/admin/user/signup'),
('admin', '/admin/user/view'),
('admin', '/agama/*'),
('admin', '/agama/create'),
('admin', '/agama/delete'),
('admin', '/agama/index'),
('admin', '/agama/update'),
('admin', '/agama/view'),
('admin', '/debug/*'),
('admin', '/debug/default/*'),
('admin', '/debug/default/db-explain'),
('admin', '/debug/default/download-mail'),
('admin', '/debug/default/index'),
('admin', '/debug/default/toolbar'),
('admin', '/debug/default/view'),
('admin', '/debug/user/*'),
('admin', '/debug/user/reset-identity'),
('admin', '/debug/user/set-identity'),
('admin', '/detail-mata-pelajaran/*'),
('admin', '/detail-mata-pelajaran/create'),
('admin', '/detail-mata-pelajaran/delete'),
('admin', '/detail-mata-pelajaran/index'),
('admin', '/detail-mata-pelajaran/update'),
('admin', '/detail-mata-pelajaran/view'),
('admin', '/gii/*'),
('admin', '/gii/default/*'),
('admin', '/gii/default/action'),
('admin', '/gii/default/diff'),
('admin', '/gii/default/index'),
('admin', '/gii/default/preview'),
('admin', '/gii/default/view'),
('admin', '/guru/*'),
('admin', '/guru/create'),
('admin', '/guru/delete'),
('admin', '/guru/index'),
('admin', '/guru/update'),
('admin', '/guru/view'),
('admin', '/jenis-keluarga/*'),
('admin', '/jenis-keluarga/create'),
('admin', '/jenis-keluarga/delete'),
('admin', '/jenis-keluarga/index'),
('admin', '/jenis-keluarga/update'),
('admin', '/jenis-keluarga/view'),
('admin', '/kelas-murid/*'),
('admin', '/kelas-murid/create'),
('admin', '/kelas-murid/delete'),
('admin', '/kelas-murid/index'),
('admin', '/kelas-murid/update'),
('admin', '/kelas-murid/view'),
('admin', '/kelas/*'),
('admin', '/kelas/create'),
('admin', '/kelas/delete'),
('admin', '/kelas/index'),
('admin', '/kelas/update'),
('admin', '/kelas/view'),
('admin', '/keluarga-murid/*'),
('admin', '/keluarga-murid/create'),
('admin', '/keluarga-murid/delete'),
('admin', '/keluarga-murid/index'),
('admin', '/keluarga-murid/update'),
('admin', '/keluarga-murid/view'),
('admin', '/mata-pelajaran/*'),
('admin', '/mata-pelajaran/create'),
('admin', '/mata-pelajaran/delete'),
('admin', '/mata-pelajaran/index'),
('admin', '/mata-pelajaran/update'),
('admin', '/mata-pelajaran/view'),
('admin', '/murid/*'),
('admin', '/murid/create'),
('admin', '/murid/delete'),
('admin', '/murid/index'),
('admin', '/murid/update'),
('admin', '/murid/view'),
('admin', '/nilai-akademik/*'),
('admin', '/nilai-akademik/create'),
('admin', '/nilai-akademik/delete'),
('admin', '/nilai-akademik/index'),
('admin', '/nilai-akademik/update'),
('admin', '/nilai-akademik/view'),
('admin', '/pembayaran-spp/*'),
('admin', '/pembayaran-spp/create'),
('admin', '/pembayaran-spp/delete'),
('admin', '/pembayaran-spp/index'),
('admin', '/pembayaran-spp/update'),
('admin', '/pembayaran-spp/view'),
('admin', '/perizinan-murid/*'),
('admin', '/perizinan-murid/create'),
('admin', '/perizinan-murid/delete'),
('admin', '/perizinan-murid/index'),
('admin', '/perizinan-murid/update'),
('admin', '/perizinan-murid/view'),
('admin', '/semester/*'),
('admin', '/semester/create'),
('admin', '/semester/delete'),
('admin', '/semester/index'),
('admin', '/semester/update'),
('admin', '/semester/view'),
('admin', '/site/*'),
('admin', '/site/error'),
('admin', '/site/index'),
('admin', '/site/login'),
('admin', '/site/logout'),
('admin', '/tahun-ajaran/*'),
('admin', '/tahun-ajaran/create'),
('admin', '/tahun-ajaran/delete'),
('admin', '/tahun-ajaran/index'),
('admin', '/tahun-ajaran/update'),
('admin', '/tahun-ajaran/view'),
('admin', '/tenaga-umum/*'),
('admin', '/tenaga-umum/create'),
('admin', '/tenaga-umum/delete'),
('admin', '/tenaga-umum/index'),
('admin', '/tenaga-umum/update'),
('admin', '/tenaga-umum/view'),
('murid', '/murid/index'),
('murid', '/murid/view'),
('murid', '/site/login'),
('murid', '/site/logout');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_mata_pelajaran`
--

CREATE TABLE `detail_mata_pelajaran` (
  `ID_DETAIL_MATA_PELAJARAN` int(11) NOT NULL,
  `NIP_GURU` varchar(20) DEFAULT NULL,
  `ID_MATA_PELAJARAN` int(11) DEFAULT NULL,
  `ID_KELAS` int(11) DEFAULT NULL,
  `ID_SEMESTER` int(11) DEFAULT NULL,
  `ID_TAHUN_AJARAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_mata_pelajaran`
--

INSERT INTO `detail_mata_pelajaran` (`ID_DETAIL_MATA_PELAJARAN`, `NIP_GURU`, `ID_MATA_PELAJARAN`, `ID_KELAS`, `ID_SEMESTER`, `ID_TAHUN_AJARAN`) VALUES
(2, '116090982', 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `NIP` varchar(20) NOT NULL,
  `NAMA` varchar(190) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(2) DEFAULT NULL,
  `GELAR_DEPAN` varchar(50) DEFAULT NULL,
  `GELAR_BELAKANG` varchar(50) DEFAULT NULL,
  `ALAMAT` longtext,
  `ID_AGAMA` int(11) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(50) DEFAULT NULL,
  `NOTELP` varchar(13) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIP`, `NAMA`, `JENIS_KELAMIN`, `GELAR_DEPAN`, `GELAR_BELAKANG`, `ALAMAT`, `ID_AGAMA`, `TANGGAL_LAHIR`, `TEMPAT_LAHIR`, `NOTELP`, `EMAIL`, `FOTO`) VALUES
('116090982', 'Iwan Sutrisno', 'L', 'Ir', 'S.KOM', 'asdasdasdasd', 1, '2018-12-06', 'MALANG', '08121212', 'iwan@oke.ome', '116090982-1544160603.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keluarga`
--

CREATE TABLE `jenis_keluarga` (
  `ID_JENIS_KELUARGA` int(11) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_keluarga`
--

INSERT INTO `jenis_keluarga` (`ID_JENIS_KELUARGA`, `NAMA`) VALUES
(1, 'Ayah'),
(2, 'Ibu'),
(3, 'Paman'),
(4, 'Bibi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `KODE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `NAMA`, `KODE`) VALUES
(1, 'Kitab', 1),
(2, 'Kitab', 2),
(3, 'Kitab', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_murid`
--

CREATE TABLE `kelas_murid` (
  `ID_KELAS_MURID` int(11) NOT NULL,
  `NIS_MURID` varchar(20) DEFAULT NULL,
  `ID_KELAS` int(11) DEFAULT NULL,
  `ID_SEMESTER` int(11) DEFAULT NULL,
  `ID_TAHUN_AJARAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_murid`
--

INSERT INTO `kelas_murid` (`ID_KELAS_MURID`, `NIS_MURID`, `ID_KELAS`, `ID_SEMESTER`, `ID_TAHUN_AJARAN`) VALUES
(1, '8113160008', 2, 1, 1),
(2, '8113160008', 3, 1, 1),
(3, '8113160009', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_murid`
--

CREATE TABLE `keluarga_murid` (
  `ID_KELUARGA_MURID` int(11) NOT NULL,
  `NIS_MURID` varchar(20) DEFAULT NULL,
  `NAMA` varchar(190) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(190) DEFAULT NULL,
  `ID_AGAMA` int(11) DEFAULT NULL,
  `ID_JENIS_KELUARGA` int(11) DEFAULT NULL,
  `ALAMAT` longtext,
  `NOTELP` varchar(13) DEFAULT NULL,
  `PEKERJAAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `ID_MATA_PELAJARAN` int(11) NOT NULL,
  `KODE_MAPEL` varchar(10) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`ID_MATA_PELAJARAN`, `KODE_MAPEL`, `NAMA`) VALUES
(1, 'BIND', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541036154),
('m130524_201442_init', 1541036158),
('m140506_102106_rbac_init', 1542859696),
('m140602_111327_create_menu_table', 1542859051),
('m160312_050000_create_user', 1542859051),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1542859696);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `NIS` varchar(20) NOT NULL,
  `NAMA` varchar(190) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(2) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(30) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `ID_AGAMA` int(11) DEFAULT NULL,
  `ALAMAT` longtext,
  `EMAIL` varchar(100) DEFAULT NULL,
  `STATUS_NIKAH` varchar(15) DEFAULT NULL,
  `NAMA_ASAL_SEKOLAH` varchar(100) DEFAULT NULL,
  `ALAMAT_ASAL_SEKOLAH` longtext,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `TANGGAL_KELUAR` date DEFAULT NULL,
  `ANGKATAN` int(11) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `STATUS_AKTIF` varchar(15) DEFAULT NULL,
  `STATUS_TERIMA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`NIS`, `NAMA`, `JENIS_KELAMIN`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `ID_AGAMA`, `ALAMAT`, `EMAIL`, `STATUS_NIKAH`, `NAMA_ASAL_SEKOLAH`, `ALAMAT_ASAL_SEKOLAH`, `TANGGAL_MASUK`, `TANGGAL_KELUAR`, `ANGKATAN`, `FOTO`, `STATUS_AKTIF`, `STATUS_TERIMA`) VALUES
('8113160008', 'asdas', 'P', 'asd', '2018-11-28', 1, 'asd', 'oke@oke.oke', 'Menikah', 'ASDASD', 'asd', '2018-12-06', '2018-11-21', 2019, '8113160008-1544099954.png', '1', '1'),
('8113160009', 'Sandy', 'L', 'Malang', '2018-12-27', 1, 'adasd asdad', 'sandy@oke.oke', 'Tidak Menikah', 'asdasd', 'asdasd', '2018-11-01', '2018-11-14', 2015, '8113160009-1544100242.png', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akademik`
--

CREATE TABLE `nilai_akademik` (
  `ID_NILAI_AKADEMIK` int(11) NOT NULL,
  `ID_KELAS_MURID` int(11) DEFAULT NULL,
  `ID_DETAIL_MATA_PELAJARAN` int(11) DEFAULT NULL,
  `NILAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `ID_PEMBAYARAN_SPP` int(11) NOT NULL,
  `NIS_MURID` varchar(20) DEFAULT NULL,
  `ID_SEMESTER` int(11) DEFAULT NULL,
  `ID_TAHUN_AJARAN` int(11) DEFAULT NULL,
  `TANGGAL_BAYAR` date DEFAULT NULL,
  `JENIS_BAYAR` varchar(20) DEFAULT NULL,
  `KODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `KETERANGAN` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perizinan_murid`
--

CREATE TABLE `perizinan_murid` (
  `ID_PERIZINAN_MURID` int(11) NOT NULL,
  `NIS_MURID` varchar(20) DEFAULT NULL,
  `KETERANGAN` varchar(1) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` varchar(1) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `ID_SEMESTER` int(11) NOT NULL,
  `NAMA` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`ID_SEMESTER`, `NAMA`, `STATUS`) VALUES
(1, 1, 1),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `ID_TAHUN_AJARAN` int(11) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`ID_TAHUN_AJARAN`, `NAMA`, `STATUS`) VALUES
(1, '2018/2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_umum`
--

CREATE TABLE `tenaga_umum` (
  `NIP` varchar(30) NOT NULL,
  `NAMA` varchar(190) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(2) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `ID_AGAMA` int(11) DEFAULT NULL,
  `ALAMAT` longtext,
  `NOTELP` varchar(13) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '7AzYJcGELGmy5bWycINmapsH9an1qYQy', '$2y$13$vB8fYNqtavMeKsGCpF2ivuPKC9Mzq.vaGXmeXozkUj.Jqw3/BULv6', NULL, 'admin@poltekom.ac.id', 10, 1541038842, 1541038842),
(6, '0123456', 'SqgxVJ0hHWds18gFHU9v7w1qUGpu2ISn', '$2y$13$uje.9tpNxlgvJGT5wcbBGepAeRDTsmtFznDstsOjB8RvgU9IAMNuS', NULL, 'oke@oke.okee', 10, 1543412264, 1543412264),
(14, '8113160008', 'aGO7Qn2UNEKHtRHlavrmczWiiAgklu5I', '$2y$13$uHGE0.6u9qs5x/r5LD3YAuj2gmbFhz1vzx./Ci07N9uqaxq2booKG', NULL, 'oke@oke.oke', 10, 1543495073, 1543495073),
(16, '8113160009', '4opIWx13I-PYca_utbY1sV67zO27vV_2', '$2y$13$CloXNi18z03E/.N9hjxiyef1XlalE/EOUHEkw1OPvw.m/jxQr0ggu', NULL, 'sandy@oke.oke', 10, 1544100243, 1544100243),
(17, '116090982', 'oW5Z-wJwVBFBM462Lmk2DwOHNDUHZj1L', '$2y$13$wxVIcG8JhIJmJJqlj2eizORyflRaN8qjZ.W2wgyQLxrzccp7SIKR6', NULL, 'iwan@oke.ome', 10, 1544160605, 1544160605);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(190) DEFAULT NULL,
  `LEVEL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`ID_AGAMA`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `detail_mata_pelajaran`
--
ALTER TABLE `detail_mata_pelajaran`
  ADD PRIMARY KEY (`ID_DETAIL_MATA_PELAJARAN`),
  ADD KEY `FK_REFERENCE_12` (`NIP_GURU`),
  ADD KEY `FK_REFERENCE_15` (`ID_MATA_PELAJARAN`),
  ADD KEY `FK_REFERENCE_41` (`ID_KELAS`),
  ADD KEY `FK_REFERENCE_42` (`ID_SEMESTER`),
  ADD KEY `FK_REFERENCE_43` (`ID_TAHUN_AJARAN`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_REFERENCE_8` (`ID_AGAMA`);

--
-- Indexes for table `jenis_keluarga`
--
ALTER TABLE `jenis_keluarga`
  ADD PRIMARY KEY (`ID_JENIS_KELUARGA`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`);

--
-- Indexes for table `kelas_murid`
--
ALTER TABLE `kelas_murid`
  ADD PRIMARY KEY (`ID_KELAS_MURID`),
  ADD KEY `FK_REFERENCE_18` (`ID_KELAS`),
  ADD KEY `FK_REFERENCE_27` (`ID_SEMESTER`),
  ADD KEY `FK_REFERENCE_28` (`ID_TAHUN_AJARAN`),
  ADD KEY `FK_REFERENCE_29` (`NIS_MURID`);

--
-- Indexes for table `keluarga_murid`
--
ALTER TABLE `keluarga_murid`
  ADD PRIMARY KEY (`ID_KELUARGA_MURID`),
  ADD KEY `FK_REFERENCE_21` (`ID_AGAMA`),
  ADD KEY `FK_REFERENCE_22` (`ID_JENIS_KELUARGA`),
  ADD KEY `FK_REFERENCE_23` (`NIS_MURID`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`ID_MATA_PELAJARAN`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `FK_REFERENCE_7` (`ID_AGAMA`);

--
-- Indexes for table `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  ADD PRIMARY KEY (`ID_NILAI_AKADEMIK`),
  ADD KEY `FK_REFERENCE_17` (`ID_DETAIL_MATA_PELAJARAN`),
  ADD KEY `FK_REFERENCE_25` (`ID_KELAS_MURID`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`ID_PEMBAYARAN_SPP`),
  ADD KEY `FK_REFERENCE_19` (`NIS_MURID`),
  ADD KEY `FK_REFERENCE_24` (`ID_SEMESTER`),
  ADD KEY `FK_REFERENCE_26` (`ID_TAHUN_AJARAN`);

--
-- Indexes for table `perizinan_murid`
--
ALTER TABLE `perizinan_murid`
  ADD PRIMARY KEY (`ID_PERIZINAN_MURID`),
  ADD KEY `FK_REFERENCE_20` (`NIS_MURID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`ID_SEMESTER`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`ID_TAHUN_AJARAN`);

--
-- Indexes for table `tenaga_umum`
--
ALTER TABLE `tenaga_umum`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_REFERENCE_9` (`ID_AGAMA`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `ID_AGAMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_mata_pelajaran`
--
ALTER TABLE `detail_mata_pelajaran`
  MODIFY `ID_DETAIL_MATA_PELAJARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_keluarga`
--
ALTER TABLE `jenis_keluarga`
  MODIFY `ID_JENIS_KELUARGA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_KELAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas_murid`
--
ALTER TABLE `kelas_murid`
  MODIFY `ID_KELAS_MURID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga_murid`
--
ALTER TABLE `keluarga_murid`
  MODIFY `ID_KELUARGA_MURID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `ID_MATA_PELAJARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  MODIFY `ID_NILAI_AKADEMIK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `ID_PEMBAYARAN_SPP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perizinan_murid`
--
ALTER TABLE `perizinan_murid`
  MODIFY `ID_PERIZINAN_MURID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `ID_SEMESTER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `ID_TAHUN_AJARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_mata_pelajaran`
--
ALTER TABLE `detail_mata_pelajaran`
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`NIP_GURU`) REFERENCES `guru` (`NIP`),
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_MATA_PELAJARAN`) REFERENCES `mata_pelajaran` (`ID_MATA_PELAJARAN`),
  ADD CONSTRAINT `FK_REFERENCE_41` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_REFERENCE_42` FOREIGN KEY (`ID_SEMESTER`) REFERENCES `semester` (`ID_SEMESTER`),
  ADD CONSTRAINT `FK_REFERENCE_43` FOREIGN KEY (`ID_TAHUN_AJARAN`) REFERENCES `tahun_ajaran` (`ID_TAHUN_AJARAN`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_AGAMA`) REFERENCES `agama` (`ID_AGAMA`);

--
-- Constraints for table `kelas_murid`
--
ALTER TABLE `kelas_murid`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_REFERENCE_27` FOREIGN KEY (`ID_SEMESTER`) REFERENCES `semester` (`ID_SEMESTER`),
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`ID_TAHUN_AJARAN`) REFERENCES `tahun_ajaran` (`ID_TAHUN_AJARAN`),
  ADD CONSTRAINT `FK_REFERENCE_29` FOREIGN KEY (`NIS_MURID`) REFERENCES `murid` (`NIS`);

--
-- Constraints for table `keluarga_murid`
--
ALTER TABLE `keluarga_murid`
  ADD CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`ID_AGAMA`) REFERENCES `agama` (`ID_AGAMA`),
  ADD CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`ID_JENIS_KELUARGA`) REFERENCES `jenis_keluarga` (`ID_JENIS_KELUARGA`),
  ADD CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`NIS_MURID`) REFERENCES `murid` (`NIS`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_AGAMA`) REFERENCES `agama` (`ID_AGAMA`);

--
-- Constraints for table `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_DETAIL_MATA_PELAJARAN`) REFERENCES `detail_mata_pelajaran` (`ID_DETAIL_MATA_PELAJARAN`),
  ADD CONSTRAINT `FK_REFERENCE_25` FOREIGN KEY (`ID_KELAS_MURID`) REFERENCES `kelas_murid` (`ID_KELAS_MURID`);

--
-- Constraints for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`NIS_MURID`) REFERENCES `murid` (`NIS`),
  ADD CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`ID_SEMESTER`) REFERENCES `semester` (`ID_SEMESTER`),
  ADD CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`ID_TAHUN_AJARAN`) REFERENCES `tahun_ajaran` (`ID_TAHUN_AJARAN`);

--
-- Constraints for table `perizinan_murid`
--
ALTER TABLE `perizinan_murid`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`NIS_MURID`) REFERENCES `murid` (`NIS`);

--
-- Constraints for table `tenaga_umum`
--
ALTER TABLE `tenaga_umum`
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_AGAMA`) REFERENCES `agama` (`ID_AGAMA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
