-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2018 at 07:23 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(48, 'Grape vines'),
(34, ' Local News'),
(24, '  International News'),
(40, ' World cup');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'unapproved',
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(34, 51, 'john', 'example@gmail.com', 'ffff', 'unapproved', '2018-05-14'),
(31, 10, 'jane', 'example@gmail.com', 'sfssss', 'approved', '2018-05-02'),
(30, 10, 'john', 'example@gmail.com', 'vines', 'approved', '2018-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_title`, `image`) VALUES
(1, 'mohamed', 'mohamed.png'),
(9, 'barca', 'barcelona_club_barcelona_composition_victor_valdes_daniel_alves_gerard_pique_jordi_alba_xavi_andres_iniesta_javier_mascherano_sergio_busquets_david_villa_lionel_messi_pedro_rodriguez_neymar_sports_football_.jpg'),
(10, 'vines', 'maxresdefault.jpg'),
(11, 'vines', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(255) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_views_count` int(15) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_views_count`, `time`, `edit_by`) VALUES
(10, 'world cup, russia', 4, '', 40, 'Who will win the world cup 2018 in russia', 'job mutai', '2018-05-14', 'trophy-fifa-worldcup-2018-hd-wallpaper.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 7, '2018-05-10 17:01:40', 'rose ireri'),
(11, 'chelsea epl', 0, 'published', 24, 'A closer look at chelsea new players', 'john kimathi', '2018-05-14', '851551-gorgerous-chelsea-wallpaper-2018-hd-1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 9, '2018-05-10 17:01:40', 'rose ireri'),
(19, 'Barcelona, Messi,la liga', 0, 'published', 24, 'Barcelona', 'elvis ngetich', '2018-05-14', 'barcelona_club_barcelona_composition_victor_valdes_daniel_alves_gerard_pique_jordi_alba_xavi_andres_iniesta_javier_mascherano_sergio_busquets_david_villa_lionel_messi_pedro_rodriguez_neymar_sports_football_.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 1, '2018-05-10 17:01:40', 'rose ireri'),
(18, 'gor mahia, kpl', 0, 'published', 34, 'Gor mahia  clash with kpl giants', 'kimathi', '2018-05-07', 'gor-mahia-defender-godfrey-walusimbi-v-mathare-united_mxpl008yw07ozb7r2ckc282j.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 3, '2018-05-10 17:01:40', NULL),
(17, 'real madrid,christiano ,ronaldo, la liga', 0, 'published', 24, 'Real madrid spain champions', 'job mutai', '2018-05-07', 'real_madrid_team_players_field_sport_27764_1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 1, '2018-05-10 17:01:40', NULL),
(35, 'real madrid,christiano ,ronaldo, la liga', 0, 'draft', 48, 'Real madrid spain champions', 'job mutai', '2018-05-09', 'real_madrid_team_players_field_sport_27764_1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 0, '2018-05-10 17:01:40', NULL),
(36, 'world cup, ', 4, 'draft', 40, 'Who will win the world cup 2018 in russia', 'job mutai', '2018-05-09', 'trophy-fifa-worldcup-2018-hd-wallpaper.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 3, '2018-05-10 17:01:40', NULL),
(37, 'chelsea premier league', 0, 'draft', 24, 'A closer look at chelsea new players', 'john kimathi', '2018-05-07', '851551-gorgerous-chelsea-wallpaper-2018-hd-1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 2, '2018-05-10 17:01:40', NULL),
(38, 'Barcelona, Messi,la liga', 0, 'draft', 24, 'Barcelona', 'elvis ngetich', '2018-05-07', 'barcelona_club_barcelona_composition_victor_valdes_daniel_alves_gerard_pique_jordi_alba_xavi_andres_iniesta_javier_mascherano_sergio_busquets_david_villa_lionel_messi_pedro_rodriguez_neymar_sports_football_.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 0, '2018-05-10 17:01:40', NULL),
(39, 'gor mahia, kpl', 0, 'draft', 34, 'Gor mahia  clash with kpl giants', 'kimathi', '2018-05-07', 'gor-mahia-defender-godfrey-walusimbi-v-mathare-united_mxpl008yw07ozb7r2ckc282j.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 0, '2018-05-10 17:01:40', NULL),
(40, 'real madrid,christiano ,ronaldo, la liga', 0, 'draft', 24, 'Real madrid spain champions', 'job mutai', '2018-05-07', 'real_madrid_team_players_field_sport_27764_1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 1, '2018-05-10 17:01:40', NULL),
(41, 'real madrid,christiano ,ronaldo, la liga', 0, 'draft', 48, 'Real madrid spain champions', 'job mutai', '2018-05-09', 'real_madrid_team_players_field_sport_27764_1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 0, '2018-05-10 17:01:40', NULL),
(42, 'chelsea premier league', 0, 'draft', 24, 'A closer look at chelsea new players', 'john kimathi', '2018-05-07', '851551-gorgerous-chelsea-wallpaper-2018-hd-1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 9, '2018-05-10 17:01:40', NULL),
(43, 'Barcelona, Messi,la liga', 0, 'draft', 24, 'Barcelona', 'elvis ngetich', '2018-05-07', 'barcelona_club_barcelona_composition_victor_valdes_daniel_alves_gerard_pique_jordi_alba_xavi_andres_iniesta_javier_mascherano_sergio_busquets_david_villa_lionel_messi_pedro_rodriguez_neymar_sports_football_.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 1, '2018-05-10 17:01:40', NULL),
(44, 'gor mahia, kpl', 0, 'published', 34, 'Gor mahia  clash with kpl giants', 'kimathi', '2018-05-07', 'gor-mahia-defender-godfrey-walusimbi-v-mathare-united_mxpl008yw07ozb7r2ckc282j.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 0, '2018-05-10 17:01:40', NULL),
(45, 'real madrid,christiano ,ronaldo, la liga', 0, 'published', 24, 'Real madrid spain champions', 'job mutai', '2018-05-07', 'real_madrid_team_players_field_sport_27764_1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 1, '2018-05-10 17:01:40', NULL),
(46, 'chelsea premier league', 0, 'published', 24, 'A closer look at chelsea new players', 'john kimathi', '2018-05-07', '851551-gorgerous-chelsea-wallpaper-2018-hd-1920x1080.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 2, '2018-05-10 17:01:40', NULL),
(47, 'roma', 0, 'published', 24, 'Roma tonight line up', 'elvis ngetich', '2018-05-14', '6uE9y21.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 7, '2018-05-10 17:01:40', 'rose ireri'),
(49, 'funny,memes,grape vines,vines', 0, 'published', 48, 'Funny memes of 2018', 'job mutai', '2018-05-14', 'maxresdefault.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo.</p>', 3, '2018-05-10 17:01:40', 'rose ireri'),
(51, 'sony sugar, goalkeepeer', 1, 'published', 34, 'Sony sugar bring in a new Goalkeeper', 'rose ireri', '2018-05-14', 'sony-sugar-v-kariobangi-sharks_dlca9n2e5jw41bp83q7pdpske.jpg', '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis rhoncus ligula vitae sagittis. Quisque eu mattis nisl. Aenean ac elit non tellus vestibulum bibendum. Fusce egestas lectus nec ipsum cursus eleifend. Cras mauris ligula, pharetra vitae iaculis quis, laoreet vitae eros. Morbi vel tellus urna. Suspendisse vitae libero at mauris finibus mollis. Duis quam magna, mollis non imperdiet non, dapibus id nisi. Vestibulum eget consectetur elit. Suspendisse venenatis lectus augue, sit amet vehicula mi lacinia vitae. Etiam at dui venenatis, pulvinar elit eget, elementum ipsum. Mauris mattis enim condimentum risus semper finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed nec ex est. Maecenas posuere quis erat non dignissim. Pellentesque laoreet, mi eget rutrum rutrum, nibh odio rhoncus purus, non hendrerit magna dolor quis justo</span></p>', 12, '2018-05-12 17:41:09', 'rose ireri');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_number` varchar(15) DEFAULT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `randSalt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_phone_number`, `user_image`, `user_role`, `randSalt`) VALUES
(35, 'kimney', '$2y$10$iusesomecrazystrings2u9I3VMJcdnnhIMojE72KZRnto5V.nhQ2', 'john', 'kimathi', 'example@gmail.com', '0708749559', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(30, 'rose', '$1$TT2.gk1.$TGtomFAmF.BBfo0y0J9T00', 'rose', 'ireri', 'rose@gmail.com', '78888844', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(31, 'jane', '$2y$10$iusesomecrazystrings2uOIoAj09Bd71ntKYs5Jf6/sMAd1aJdYK', 'jane', 'njoki', 'jane@gmail.com', '88888888', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(36, 'naomi', '$2y$10$iusesomecrazystrings2u9I3VMJcdnnhIMojE72KZRnto5V.nhQ2', 'naomi', 'ngatia', 'example@gmail.com', '+254708749559', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'tmn7f06pgj3fn0h0hhrpj1dkc5', 1526102372),
(2, '6krblq3nuujdjif8fe6djvmve4', 1526093703),
(3, 'vr90tcf1j3r480o6ifih96om26', 1526098115),
(4, '2p6c12pd90r9fe5iqi3v19n7n1', 1526179766),
(5, 'rsfucpcop5e1outgg9tg9mpd50', 1526146101),
(6, 'u8u4ulk4ttffps3bnvbvunek45', 1526329681),
(7, 'usv15b95oqsb48rtisr96sm987', 1526354886),
(8, 'mpdd31eg7mcqidcppc4dhour65', 1526353932),
(9, '2p942d3fn652lop5erttlc9f10', 1526416204);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
