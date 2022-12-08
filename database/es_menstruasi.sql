-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 11:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `es_menstruasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `ID` int(11) NOT NULL,
  `kode_penyakit` varchar(16) DEFAULT NULL,
  `kode_gejala` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aturan`
--

INSERT INTO `tb_aturan` (`ID`, `kode_penyakit`, `kode_gejala`, `nilai`) VALUES
(51, 'P01', 'G01', 1),
(52, 'P01', 'G02', 1),
(53, 'P01', 'G03', 0.6),
(54, 'P01', 'G05', 0.6),
(55, 'P01', 'G13', 0.8),
(56, 'P01', 'G14', 1),
(57, 'P01', 'G18', 0.4),
(58, 'P01', 'G22', 1),
(59, 'P01', 'G45', 0.6),
(60, 'P02', 'G04', 1),
(61, 'P02', 'G05', 0.6),
(62, 'P02', 'G07', 0.4),
(63, 'P02', 'G12', 1),
(64, 'P02', 'G15', 0.4),
(65, 'P02', 'G16', 0.6),
(66, 'P03', 'G02', 0.6),
(67, 'P03', 'G03', 0.6),
(68, 'P03', 'G05', 0.6),
(69, 'P03', 'G06', 1),
(70, 'P03', 'G07', 0.4),
(71, 'P03', 'G14', 0.6),
(72, 'P03', 'G19', 0.4),
(73, 'P03', 'G22', 0.6),
(74, 'P04', 'G07', 0.4),
(75, 'P04', 'G08', 1),
(76, 'P04', 'G10', 0.6),
(77, 'P04', 'G12', 0.8),
(78, 'P04', 'G20', 0.8),
(79, 'P04', 'G21', 0.4),
(80, 'P04', 'G24', 0.8),
(81, 'P04', 'G25', 0.8),
(82, 'P05', 'G05', 0.8),
(83, 'P05', 'G07', 0.6),
(84, 'P05', 'G09', 0.8),
(85, 'P05', 'G10', 0.6),
(86, 'P05', 'G11', 0.6),
(87, 'P05', 'G15', 0.6),
(88, 'P05', 'G23', 0.8),
(89, 'P06', 'G03', 0.4),
(90, 'P06', 'G07', 0.4),
(91, 'P06', 'G17', 0.8),
(92, 'P06', 'G26', 0.8),
(93, 'P06', 'G27', 0.6),
(94, 'P06', 'G28', 0.4),
(95, 'P07', 'G07', 0.6),
(96, 'P07', 'G18', 0.4),
(97, 'P07', 'G29', 0.4),
(98, 'P07', 'G30', 0.6),
(99, 'P07', 'G31', 0.6),
(100, 'P07', 'G32', 0.4),
(101, 'P08', 'G03', 1),
(102, 'P08', 'G18', 0.4),
(103, 'P08', 'G31', 0.8),
(104, 'P08', 'G34', 0.8),
(105, 'P08', 'G33', 0.6),
(106, 'P08', 'G35', 0.6),
(107, 'P08', 'G36', 0.6),
(108, 'P08', 'G37', 0.6),
(109, 'P09', 'G05', 0.8),
(110, 'P09', 'G07', 0.6),
(111, 'P09', 'G18', 0.6),
(112, 'P09', 'G30', 0.8),
(113, 'P09', 'G36', 0.8),
(114, 'P09', 'G38', 0.8),
(115, 'P09', 'G39', 0.8),
(116, 'P09', 'G40', 0.8),
(117, 'P09', 'G41', 0.8),
(118, 'P09', 'G42', 0.8),
(119, 'P09', 'G43', 0.6),
(120, 'P10', 'G07', 0.6),
(121, 'P10', 'G09', 0.6),
(122, 'P10', 'G18', 0.4),
(123, 'P10', 'G21', 0.8),
(124, 'P10', 'G39', 0.6),
(125, 'P10', 'G42', 0.6),
(126, 'P10', 'G44', 0.8),
(127, 'P10', 'G47', 0.8),
(128, 'P10', 'G46', 0.8),
(129, 'P01', 'G04', 0),
(130, 'P01', 'G06', 0),
(131, 'P01', 'G07', 0),
(132, 'P01', 'G08', 0),
(133, 'P01', 'G09', 0),
(134, 'P01', 'G10', 0),
(135, 'P01', 'G11', 0),
(136, 'P01', 'G12', 0),
(137, 'P01', 'G15', 0),
(138, 'P01', 'G16', 0),
(139, 'P01', 'G17', 0),
(140, 'P01', 'G19', 0),
(141, 'P01', 'G20', 0),
(142, 'P01', 'G21', 0),
(143, 'P01', 'G23', 0),
(144, 'P01', 'G24', 0),
(145, 'P01', 'G25', 0),
(146, 'P01', 'G26', 0),
(147, 'P01', 'G27', 0),
(148, 'P01', 'G28', 0),
(149, 'P01', 'G29', 0),
(150, 'P01', 'G30', 0),
(151, 'P01', 'G31', 0),
(152, 'P01', 'G32', 0),
(153, 'P01', 'G33', 0),
(154, 'P01', 'G34', 0),
(155, 'P01', 'G35', 0),
(156, 'P01', 'G36', 0),
(157, 'P01', 'G37', 0),
(158, 'P01', 'G38', 0),
(159, 'P01', 'G39', 0),
(160, 'P01', 'G40', 0),
(161, 'P01', 'G41', 0),
(162, 'P01', 'G42', 0),
(163, 'P01', 'G43', 0),
(164, 'P01', 'G44', 0),
(165, 'P01', 'G46', 0),
(166, 'P01', 'G47', 0),
(167, 'P02', 'G01', 0),
(168, 'P02', 'G02', 0),
(169, 'P02', 'G03', 0),
(170, 'P02', 'G06', 0),
(171, 'P02', 'G08', 0),
(172, 'P02', 'G09', 0),
(173, 'P02', 'G10', 0),
(174, 'P02', 'G11', 0),
(175, 'P02', 'G13', 0),
(176, 'P02', 'G14', 0),
(177, 'P02', 'G17', 0),
(178, 'P02', 'G18', 0),
(179, 'P02', 'G19', 0),
(180, 'P02', 'G20', 0),
(181, 'P02', 'G21', 0),
(182, 'P02', 'G22', 0),
(183, 'P02', 'G23', 0),
(184, 'P02', 'G24', 0),
(185, 'P02', 'G25', 0),
(186, 'P02', 'G26', 0),
(187, 'P02', 'G27', 0),
(188, 'P02', 'G28', 0),
(189, 'P02', 'G29', 0),
(190, 'P02', 'G30', 0),
(191, 'P02', 'G31', 0),
(192, 'P02', 'G32', 0),
(193, 'P02', 'G33', 0),
(194, 'P02', 'G34', 0),
(195, 'P02', 'G35', 0),
(196, 'P02', 'G36', 0),
(197, 'P02', 'G37', 0),
(198, 'P02', 'G38', 0),
(199, 'P02', 'G39', 0),
(200, 'P02', 'G40', 0),
(201, 'P02', 'G41', 0),
(202, 'P02', 'G42', 0),
(203, 'P02', 'G43', 0),
(204, 'P02', 'G44', 0),
(205, 'P02', 'G45', 0),
(206, 'P02', 'G46', 0),
(207, 'P02', 'G47', 0),
(208, 'P03', 'G01', 0),
(209, 'P03', 'G04', 0),
(210, 'P03', 'G08', 0),
(211, 'P03', 'G09', 0),
(212, 'P03', 'G10', 0),
(213, 'P03', 'G11', 0),
(214, 'P03', 'G12', 0),
(215, 'P03', 'G13', 0),
(216, 'P03', 'G15', 0),
(217, 'P03', 'G16', 0),
(218, 'P03', 'G17', 0),
(219, 'P03', 'G18', 0),
(220, 'P03', 'G20', 0),
(221, 'P03', 'G21', 0),
(222, 'P03', 'G24', 0),
(223, 'P03', 'G23', 0),
(224, 'P03', 'G25', 0),
(225, 'P03', 'G26', 0),
(226, 'P03', 'G27', 0),
(227, 'P03', 'G28', 0),
(228, 'P03', 'G29', 0),
(229, 'P03', 'G30', 0),
(230, 'P03', 'G31', 0),
(231, 'P03', 'G32', 0),
(232, 'P03', 'G33', 0),
(233, 'P03', 'G34', 0),
(234, 'P03', 'G35', 0),
(235, 'P03', 'G36', 0),
(236, 'P03', 'G37', 0),
(237, 'P03', 'G38', 0),
(238, 'P03', 'G39', 0),
(239, 'P03', 'G40', 0),
(240, 'P03', 'G41', 0),
(241, 'P03', 'G42', 0),
(242, 'P03', 'G43', 0),
(243, 'P03', 'G44', 0),
(244, 'P03', 'G45', 0),
(245, 'P03', 'G46', 0),
(246, 'P03', 'G47', 0),
(247, 'P04', 'G01', 0),
(248, 'P04', 'G02', 0),
(249, 'P04', 'G03', 0),
(250, 'P04', 'G04', 0),
(251, 'P04', 'G05', 0),
(252, 'P04', 'G06', 0),
(253, 'P04', 'G09', 0),
(254, 'P04', 'G11', 0),
(255, 'P04', 'G13', 0),
(256, 'P04', 'G14', 0),
(257, 'P04', 'G15', 0),
(258, 'P04', 'G16', 0),
(259, 'P04', 'G17', 0),
(260, 'P04', 'G18', 0),
(261, 'P04', 'G19', 0),
(262, 'P04', 'G22', 0),
(263, 'P04', 'G23', 0),
(264, 'P04', 'G26', 0),
(265, 'P04', 'G27', 0),
(266, 'P04', 'G28', 0),
(267, 'P04', 'G29', 0),
(268, 'P04', 'G30', 0),
(269, 'P04', 'G31', 0),
(270, 'P04', 'G32', 0),
(271, 'P04', 'G33', 0),
(272, 'P04', 'G34', 0),
(273, 'P04', 'G35', 0),
(274, 'P04', 'G36', 0),
(275, 'P04', 'G37', 0),
(276, 'P04', 'G38', 0),
(277, 'P04', 'G39', 0),
(278, 'P04', 'G40', 0),
(279, 'P04', 'G41', 0),
(280, 'P04', 'G42', 0),
(281, 'P04', 'G43', 0),
(282, 'P04', 'G44', 0),
(283, 'P04', 'G45', 0),
(284, 'P04', 'G46', 0),
(285, 'P04', 'G47', 0),
(286, 'P05', 'G01', 0),
(287, 'P05', 'G02', 0),
(288, 'P05', 'G03', 0),
(289, 'P05', 'G04', 0),
(290, 'P05', 'G06', 0),
(291, 'P05', 'G08', 0),
(292, 'P05', 'G12', 0),
(293, 'P05', 'G13', 0),
(294, 'P05', 'G14', 0),
(295, 'P05', 'G16', 0),
(296, 'P05', 'G17', 0),
(297, 'P05', 'G18', 0),
(298, 'P05', 'G19', 0),
(299, 'P05', 'G20', 0),
(300, 'P05', 'G21', 0),
(301, 'P05', 'G22', 0),
(302, 'P05', 'G24', 0),
(303, 'P05', 'G25', 0),
(304, 'P05', 'G26', 0),
(305, 'P05', 'G27', 0),
(306, 'P05', 'G28', 0),
(307, 'P05', 'G29', 0),
(308, 'P05', 'G30', 0),
(309, 'P05', 'G31', 0),
(310, 'P05', 'G32', 0),
(311, 'P05', 'G33', 0),
(312, 'P05', 'G34', 0),
(313, 'P05', 'G35', 0),
(314, 'P05', 'G36', 0),
(315, 'P05', 'G37', 0),
(316, 'P05', 'G38', 0),
(317, 'P05', 'G39', 0),
(318, 'P05', 'G40', 0),
(319, 'P05', 'G41', 0),
(320, 'P05', 'G42', 0),
(321, 'P05', 'G43', 0),
(322, 'P05', 'G44', 0),
(323, 'P05', 'G45', 0),
(324, 'P05', 'G46', 0),
(325, 'P05', 'G47', 0),
(326, 'P06', 'G01', 0),
(327, 'P06', 'G02', 0),
(328, 'P06', 'G04', 0),
(329, 'P06', 'G05', 0),
(330, 'P06', 'G06', 0),
(331, 'P06', 'G08', 0),
(332, 'P06', 'G09', 0),
(333, 'P06', 'G10', 0),
(334, 'P06', 'G11', 0),
(335, 'P06', 'G12', 0),
(336, 'P06', 'G13', 0),
(337, 'P06', 'G14', 0),
(338, 'P06', 'G15', 0),
(339, 'P06', 'G16', 0),
(340, 'P06', 'G18', 0),
(341, 'P06', 'G19', 0),
(342, 'P06', 'G20', 0),
(343, 'P06', 'G21', 0),
(344, 'P06', 'G22', 0),
(345, 'P06', 'G23', 0),
(346, 'P06', 'G24', 0),
(347, 'P06', 'G25', 0),
(348, 'P06', 'G29', 0),
(349, 'P06', 'G30', 0),
(350, 'P06', 'G31', 0),
(351, 'P06', 'G33', 0),
(352, 'P06', 'G32', 0),
(353, 'P06', 'G34', 0),
(354, 'P06', 'G35', 0),
(355, 'P06', 'G36', 0),
(356, 'P06', 'G37', 0),
(357, 'P06', 'G38', 0),
(358, 'P06', 'G39', 0),
(359, 'P06', 'G40', 0),
(360, 'P06', 'G41', 0),
(361, 'P06', 'G42', 0),
(362, 'P06', 'G43', 0),
(363, 'P06', 'G44', 0),
(364, 'P06', 'G46', 0),
(365, 'P06', 'G47', 0),
(366, 'P06', 'G45', 0),
(367, 'P07', 'G01', 0),
(368, 'P07', 'G02', 0),
(369, 'P07', 'G03', 0),
(370, 'P07', 'G04', 0),
(371, 'P07', 'G05', 0),
(372, 'P07', 'G06', 0),
(373, 'P07', 'G08', 0),
(374, 'P07', 'G09', 0),
(375, 'P07', 'G10', 0),
(376, 'P07', 'G11', 0),
(377, 'P07', 'G12', 0),
(378, 'P07', 'G13', 0),
(379, 'P07', 'G14', 0),
(380, 'P07', 'G15', 0),
(381, 'P07', 'G16', 0),
(382, 'P07', 'G17', 0),
(383, 'P07', 'G19', 0),
(384, 'P07', 'G20', 0),
(385, 'P07', 'G21', 0),
(386, 'P07', 'G22', 0),
(387, 'P07', 'G23', 0),
(388, 'P07', 'G24', 0),
(389, 'P07', 'G25', 0),
(390, 'P07', 'G26', 0),
(391, 'P07', 'G27', 0),
(392, 'P07', 'G28', 0),
(393, 'P07', 'G33', 0),
(394, 'P07', 'G34', 0),
(395, 'P07', 'G35', 0),
(396, 'P07', 'G36', 0),
(397, 'P07', 'G37', 0),
(398, 'P07', 'G38', 0),
(399, 'P07', 'G39', 0),
(400, 'P07', 'G40', 0),
(401, 'P07', 'G41', 0),
(402, 'P07', 'G42', 0),
(403, 'P07', 'G43', 0),
(404, 'P07', 'G44', 0),
(405, 'P07', 'G45', 0),
(406, 'P07', 'G46', 0),
(407, 'P07', 'G47', 0),
(408, 'P08', 'G01', 0),
(409, 'P08', 'G02', 0),
(410, 'P08', 'G04', 0),
(411, 'P08', 'G05', 0),
(412, 'P08', 'G06', 0),
(413, 'P08', 'G07', 0),
(414, 'P08', 'G08', 0),
(415, 'P08', 'G09', 0),
(416, 'P08', 'G10', 0),
(417, 'P08', 'G11', 0),
(418, 'P08', 'G12', 0),
(419, 'P08', 'G13', 0),
(420, 'P08', 'G14', 0),
(421, 'P08', 'G15', 0),
(422, 'P08', 'G16', 0),
(423, 'P08', 'G17', 0),
(424, 'P08', 'G19', 0),
(425, 'P08', 'G20', 0),
(426, 'P08', 'G21', 0),
(427, 'P08', 'G22', 0),
(428, 'P08', 'G23', 0),
(429, 'P08', 'G24', 0),
(430, 'P08', 'G25', 0),
(431, 'P08', 'G26', 0),
(432, 'P08', 'G27', 0),
(433, 'P08', 'G28', 0),
(434, 'P08', 'G29', 0),
(435, 'P08', 'G30', 0),
(436, 'P08', 'G32', 0),
(437, 'P08', 'G38', 0),
(438, 'P08', 'G39', 0),
(439, 'P08', 'G40', 0),
(440, 'P08', 'G41', 0),
(441, 'P08', 'G42', 0),
(442, 'P08', 'G43', 0),
(443, 'P08', 'G44', 0),
(444, 'P08', 'G45', 0),
(445, 'P08', 'G46', 0),
(446, 'P08', 'G47', 0),
(447, 'P09', 'G01', 0),
(448, 'P09', 'G02', 0),
(449, 'P09', 'G03', 0),
(450, 'P09', 'G04', 0),
(451, 'P09', 'G06', 0),
(452, 'P09', 'G08', 0),
(453, 'P09', 'G09', 0),
(454, 'P09', 'G10', 0),
(455, 'P09', 'G11', 0),
(456, 'P09', 'G12', 0),
(457, 'P09', 'G13', 0),
(458, 'P09', 'G14', 0),
(459, 'P09', 'G15', 0),
(460, 'P09', 'G16', 0),
(461, 'P09', 'G17', 0),
(462, 'P09', 'G19', 0),
(463, 'P09', 'G20', 0),
(464, 'P09', 'G21', 0),
(465, 'P09', 'G22', 0),
(466, 'P09', 'G23', 0),
(467, 'P09', 'G24', 0),
(468, 'P09', 'G25', 0),
(469, 'P09', 'G26', 0),
(470, 'P09', 'G27', 0),
(471, 'P09', 'G28', 0),
(472, 'P09', 'G29', 0),
(473, 'P09', 'G31', 0),
(474, 'P09', 'G32', 0),
(475, 'P09', 'G33', 0),
(476, 'P09', 'G34', 0),
(477, 'P09', 'G35', 0),
(478, 'P09', 'G37', 0),
(479, 'P09', 'G44', 0),
(480, 'P09', 'G45', 0),
(481, 'P09', 'G46', 0),
(482, 'P09', 'G47', 0),
(483, 'P10', 'G01', 0),
(484, 'P10', 'G02', 0),
(485, 'P10', 'G03', 0),
(486, 'P10', 'G04', 0),
(487, 'P10', 'G05', 0),
(488, 'P10', 'G06', 0),
(489, 'P10', 'G08', 0),
(490, 'P10', 'G10', 0),
(491, 'P10', 'G11', 0),
(492, 'P10', 'G12', 0),
(493, 'P10', 'G13', 0),
(494, 'P10', 'G14', 0),
(495, 'P10', 'G15', 0),
(496, 'P10', 'G16', 0),
(497, 'P10', 'G17', 0),
(498, 'P10', 'G19', 0),
(499, 'P10', 'G20', 0),
(500, 'P10', 'G22', 0),
(501, 'P10', 'G23', 0),
(502, 'P10', 'G24', 0),
(503, 'P10', 'G25', 0),
(504, 'P10', 'G26', 0),
(505, 'P10', 'G27', 0),
(506, 'P10', 'G28', 0),
(507, 'P10', 'G29', 0),
(508, 'P10', 'G30', 0),
(509, 'P10', 'G31', 0),
(510, 'P10', 'G32', 0),
(511, 'P10', 'G33', 0),
(512, 'P10', 'G34', 0),
(513, 'P10', 'G35', 0),
(514, 'P10', 'G36', 0),
(515, 'P10', 'G37', 0),
(516, 'P10', 'G38', 0),
(517, 'P10', 'G40', 0),
(518, 'P10', 'G41', 0),
(519, 'P10', 'G43', 0),
(520, 'P10', 'G45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `kode_penyakit` varchar(50) NOT NULL,
  `total_bobot` double NOT NULL,
  `gejala_pilih` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`id_diagnosa`, `kode_user`, `kode_penyakit`, `total_bobot`, `gejala_pilih`, `created_at`) VALUES
(1, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:27:13'),
(2, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:28:02'),
(3, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:28:52'),
(4, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:31:08'),
(5, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:31:19'),
(6, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:31:30'),
(7, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:32:36'),
(8, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:32:52'),
(9, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:33:02'),
(10, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:33:40'),
(11, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:34:00'),
(12, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:34:27'),
(13, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:34:36'),
(14, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:34:56'),
(15, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:35:06'),
(16, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:36:08'),
(17, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:36:37'),
(18, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:36:51'),
(19, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:37:03'),
(20, '63896295cc57d', 'P01', 100, '[\"G01\"]', '2022-12-03 18:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G01', 'Perdarahan haid lebih lama dari normal (lebih dari 7 hari)'),
('G02', 'Darah haid keluar berlebihan'),
('G03', 'Nyeri atau kram pada bagian bawah'),
('G04', 'Perdarahan haid lebih pendek dari normal (kurang dari 7 hari)'),
('G05', 'Mengalami gangguan hormonal'),
('G06', 'Siklus menstruasi lebih pendek dari normal (kurang dari 21 hari)'),
('G07', 'Depresi, stres mental/emosi atau stres fisik'),
('G08', 'Siklus menstruasi lebih panjang dari normal (kurang dari 35 hari)'),
('G09', 'Pernah mengalami menstruasi namun berhenti berturut-turut selama 3 bulan'),
('G10', 'Mengalami gangguan gizi/nutrisi'),
('G11', 'Kehilangan nafsu makan'),
('G12', 'Darah haid keluar sedikit'),
('G13', 'Siklus menstruasi normal'),
('G14', 'Sering mengganti pembalut per harinya'),
('G15', 'Lemak pada tubuh rendah (kurus)'),
('G16', 'Mempunyai penyakit keturunan'),
('G17', 'Mengalami kontrasepsi darurat'),
('G18', 'Mengalami kelelahan'),
('G19', 'Mempunyai infeksi atau penyakit menular seksual'),
('G20', 'Mempunyai penyakit kronis'),
('G21', 'Obesitas'),
('G22', 'Gumpalan darah yang dikeluarkan lebih besar dari biasanya'),
('G23', 'Memakai obat tertentu (seperti KB)'),
('G24', 'Mengalami menstruasi hanya 8-9 kali dalam setahun'),
('G25', 'Keluarnya darah haid tidak teratur'),
('G26', 'Sedang mengubah pemakaian obat'),
('G27', 'Kelainan pada vagina'),
('G28', 'Cedera pada vagina'),
('G29', 'Sering kesemutan'),
('G30', 'Sulit untuk konsentrasi'),
('G31', 'Sakit kepala'),
('G32', 'Suhu tubuh turun'),
('G33', 'Mengalami diare'),
('G34', 'Sering mual dan muntah'),
('G35', 'Sensitif terhadap suara dan cahaya'),
('G36', 'Sakit kepala'),
('G37', 'Sakit punggung'),
('G38', 'Sering merasa cemas'),
('G39', 'Susah tidur'),
('G40', 'Sakit perut'),
('G41', 'Sakit pada payudara'),
('G42', 'Suasana hati cepat berubah'),
('G43', 'Kelaparan berlebihan'),
('G44', 'Pertumbuhan rambut yang tidak diinginkan'),
('G45', 'Sesak nafas'),
('G46', 'Rambut pada kepala menipis'),
('G47', 'Jerawatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `kode_user` varchar(50) NOT NULL,
  `kode_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `kode_penyakit` varchar(16) NOT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`kode_penyakit`, `nama_penyakit`, `bobot`, `keterangan`) VALUES
('P01', 'Menoragia/Hipermenoria', 0.8, 'Menoragia atau Hipermenorea adalah siklus menstruasi dengan interval normal dan teratur namun jumlah darah dan durasi yang lebih dari normal. Secara medis Menoragia didefinisikan total jumlah darah haid lebih dari 80 ml per siklus dan durasi haid lebih lama dari 7 hari. perdarahan yang keluar secara berlebihan mengharuskan sering ganti pembalut lebih dari 6 kali per hari. Gangguan ini bisa disebabkan oleh banyak hal seperti kondisi dalam uterus, ketidakseimbangan hormon/endokrin, penyakit darah, gangguan anatomi dan lainnya. sebaiknya periksa diri langsung kepada dokter jika mengalami perdarahan yang berlebihan agar ditangani dengan baik.'),
('P02', 'Hipomenorea', 0.3, 'Hipomenorea adalah perdarahan menstruasi dengan jumlah darah lebih sedikit dan/atau durasi lebih pendek dari normal. Sebab-sebabnya dapat terletak pada konstitusi penderita, pada uterus (misalnya sesudah miomektomi), pada gangguan endokrin/hormon, dan lain-lain. Kecuali jika ditemukannya oleh sebab yang nyata, terapi dapat dilakukan untuk menenangkan penderita. Adanya Hipomenorea tidak akan mengganggu fertilitas.'),
('P03', 'Polimenorea', 0.3, 'Polimenorea adalah dari siklus mentruasi yang lebih pendek dari normal yaitu kurang dari 21 hari. Gangguan ini akan membuat wanita lebih sering mendapatkan menstruasi setiap tahunnya. Penyebab Polimenorea bermacam-macam antara lain gangguan endokrin yang menyebabkan gangguan ovulasi, fase luteal memendek, dan kongesti ovarium karena peradangan ataupun juga bisa disebabkan oleh stres. Kondisi ini sebaiknya jangan dianggap sepele karena akan menyebabkan beberapa dampak, misalnya saja masalah kesuburan. Wanita harus memperhatikan faktor dari siklus menstruasi yang dialami, agar terhindar dari berbagai gangguan kesehatan.'),
('P04', 'Oligomenorea', 0.3, 'Oligomenorea adalah haid dengan siklus yang lebih panjang dari normal yaitu lebih dari 35 hari. Kondisi ini mengakibatkan seorang wanita jarang mengalami menstruasi selama setahun, yakni kurang dari 8-9 kali. Gangguan ini sering terjadi pada sindroma ovarium polikistik yang disebabkan oleh peningkatan hormon androgen sehingga terjadi gangguan ovulasi. Penyebab Oligomenorea antara lain stres fisik dan emosi, penyakit kronis, serta gangguan nutrisi. Oligomenorea memerlukan evaluasi lebih lanjut untuk mencari penyebab. Perhatian perlu diberikan bila Oligomenorea disertai dengan obesitas dan infertibilitas karena mungkin berhubungan dengan sindroma metabolik.'),
('P05', 'Amenorea', 0.3, 'Amenorea adalah dimana kondisi seorang wanita berhenti mengalami menstruasi sama sekali. Tidak mengalami menstruasi sama sekali selama 90 hari dan dianggap tidak normal, kecuali wanita hamil dan menopause. Amenorea dibagi menjadi dua, yaitu Amenorea primer dan Amenorea sekunder. Amenorea sekunder adalah dimana kondisi seorang wanita belum pernah mengalami menstruasi sampai usia 16 tahun. Sedangkan amenoria primer adalah dimana kondisi seorang wanita yang subur tiba-tiba berhenti mengalami menstruasi selama tiga bulan berturut-turut hingga lebih. Amenorea sekunder dan Amenorea primer memiliki penyebab yang berbeda. Amenorea primer biasanya disebabkan kelainan genetik, gangguan hormon hingga permasalahan pada rahim. Sedangkan Amenorea sekunder disebabkan kehamilan, menopause, efek samping obat-obatan, gangguan rahim dan penggunaan kontrasepsi. Selain itu gangguan gizi dan olahraga yang berlebihan bisa mengakibatkan Amenorea.'),
('P06', 'Metroragia', 0.8, 'Metroragia biasa disebut dengan perdarahan intermenstrual, adalah perdarahan vagina yang terjadi pada interval tidak teratur dengan jumlah darah dan durasi lebih dari normal yang tidak terkait dengan siklus menstruasi. Sementara darah berasal dari rahim seperti yang terjadi selama menstruasi, perdarahan tidak mewakili menstruasi yang normal. Ada beberapa penyebab Metroragia, beberapa di antaranya tidak berbahaya. Dalam kasus lain, Metroragia bisa menjadi tanda kondisi yang lebih serius.'),
('P07', 'Menometroragia', 1, 'Menometroragia adalah gangguan pendaharan di luar siklus menstruasi, dimana kondisi ditandai dengan perdarahan uterus abnormal yang berat, berkepanjangan, dan tidak teratur. Wanita dengan kondisi ini biasanya mengalami perdarahan lebih dari 80 ml, atau 3 ons, selama siklus menstruasi. Perdarahan juga tidak terduga dan sering. Misalnya, penderita mungkin akan mengalami perdarahan di luar waktu yang diharapkan dari periode menstruasi penderita.'),
('P08', 'Dismenorea', 0.8, 'Dismenorea adalah nyeri saat haid,biasanya dengan rasa kram dan terpusat di abdomen bawah. Keluhan nyeri haid dapat terjadi bervariasi mulai dari yang ringan sampai berat. Keparahan Dismenorea berhubungan langsung dengan lama dan jumlah darah haid. Seperti diketahui haid hampir selalu diikuti dengan rasa mulas/nyeri. Namun, yang dimaksud dengan Dismenorea pada topik ini adalah nyeri haid berat sampai menyebabkan perempuan tersebut datang berobat ke dokter atau mengobati dirinya sendir dengan obat anti nyeri.'),
('P09', 'Sindroma Prahaid (PMS)', 0.3, 'PMS merupakan sindroma atau kumpulan berbagai keluhan yang muncul sebelum haid, yaitu antara lain cemas, lelah, susah konsentrasi, susah tidur, hilang energi, sakit kepala, sakit perut dan sakit pada payudara. Premenstrual Syndrome biasanya ditemukan 7-10 hari menjelang haid. Penyebab pasti belum diketahui, tetapi diduga hormon estrogen, progesteron, prolaktin, dan aldosteron berperan dalam terjadinya Premenstrual Syndrome. Gangguan keseimbangan hormon estrogen dan progesteron akan menyebabkan retensi cairan dan natrium sehingga berpotensi menyebabkan terjadi keluhan Premenstrual Syndrome. Perempuan yang peka terhadap faktor psikologis, perubahan hormon sering mengalami gangguan prahaid.'),
('P10', 'PCOS', 0.8, 'Polycystic Ovary Syndrome atau sering disebut dengan PCOS merupakan sindroma atau kumpulan gejala yang diakibatkan karena gangguan hormon yang terjadi pada saat masa reproduksi. Jika mengalami PCOS, penderita biasanya tidak menstruasi secara teratur. Atau penderita juga dapat mengalami menstruasi yang berlangsung hanya beberapa hari saja. Penyebab gangguan menstruasi ini dikarenakan terlalu banyaknya hormon yang disebut dengan Androgen dalam tubuh, dan juga disebabkan karena obesitas.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kota_asal` varchar(250) NOT NULL,
  `hak_akses` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `kode_user`, `email`, `pass`, `user`, `tgl_lahir`, `jenis_kelamin`, `kota_asal`, `hak_akses`, `created_at`, `updated_at`, `login_at`, `logout_at`) VALUES
(1, '1', 'artaputra95@gmail.com', 'admin', 'admin', '1997-03-18', 'L', 'Denpasar', '0', '2022-12-02 03:11:30', '2022-12-02 03:11:30', '2022-12-03 01:25:38', '0000-00-00 00:00:00'),
(2, '63896295cc57d', 'putriprema14@gmail.com', 'erongendut14', 'uti', '2002-06-14', 'P', 'denpasar', '1', '2022-12-02 03:27:33', NULL, '2022-12-03 14:35:09', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
