-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2015 at 01:10 
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_erpeeldev`
--
CREATE DATABASE IF NOT EXISTS `db_erpeeldev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_erpeeldev`;

-- --------------------------------------------------------

--
-- Table structure for table `rpl_category`
--

CREATE TABLE IF NOT EXISTS `rpl_category` (
  `id_category` int(2) NOT NULL AUTO_INCREMENT,
  `parent_id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_edit` datetime NOT NULL,
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rpl_category`
--

INSERT INTO `rpl_category` (`id_category`, `parent_id`, `name`, `url`, `date_added`, `date_edit`, `publish`) VALUES
(1, 0, 'Lounge', 'lounge', '2015-01-27 00:00:00', '0000-00-00 00:00:00', 0),
(2, 0, 'Discuss', 'discuss', '2015-01-27 00:00:00', '2015-01-27 00:00:00', 0),
(3, 0, 'Stage', 'stage', '2015-01-27 00:00:00', '0000-00-00 00:00:00', 0),
(4, 0, 'Project', 'project', '2015-01-27 00:00:00', '0000-00-00 00:00:00', 0),
(5, 0, 'Library', 'library', '2015-01-27 00:00:00', '0000-00-00 00:00:00', 0),
(6, 3, 'CSS 5', 'css-5', '2015-01-27 00:00:00', '0000-00-00 00:00:00', 0),
(7, 0, 'Games', 'games', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 7, 'Role Playing Game', 'rpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rpl_post`
--

CREATE TABLE IF NOT EXISTS `rpl_post` (
  `id_post` int(7) NOT NULL AUTO_INCREMENT,
  `thread_id` int(5) NOT NULL,
  `reply_to_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `post` text NOT NULL,
  `date_add` datetime NOT NULL,
  `date_edit` datetime NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rpl_post`
--

INSERT INTO `rpl_post` (`id_post`, `thread_id`, `reply_to_id`, `user_id`, `post`, `date_add`, `date_edit`) VALUES
(1, 8, 0, 1, 'kwkwkwkwkwkwkwkwk', '2015-02-05 00:00:00', '2015-02-05 00:00:00'),
(2, 8, 0, 1, 'hwhwahahahwwha', '2015-02-05 00:00:00', '0000-00-00 00:00:00'),
(3, 8, 0, 1, 'hwhwahahahwwha\r\nwlllwlwlwlwlw', '2015-02-05 00:00:00', '2015-02-05 00:00:00'),
(4, 8, 0, 1, 'hwhwahahahwwha\r\nwlllwlwlwlwlw', '2015-02-05 00:00:00', '2015-02-05 00:00:00'),
(5, 8, 0, 1, 'hwhwahahahwwha\r\nwlllwlwlwlwlw', '2015-02-05 00:00:00', '2015-02-05 00:00:00'),
(6, 8, 0, 1, 'hwhwahahahwwha\r\nwlllwlwlwlwlw', '2015-02-05 00:00:00', '2015-02-05 00:00:00'),
(7, 8, 0, 1, '<p>damn</p>\n', '2015-02-05 15:36:07', '0000-00-00 00:00:00'),
(8, 1, 0, 1, '<p>U should check for xamp configuration<br />\n&nbsp;</p>\n', '2015-02-05 15:47:20', '0000-00-00 00:00:00'),
(9, 1, 0, 1, '<p>damn ass</p>\n', '2015-02-05 15:47:36', '0000-00-00 00:00:00'),
(10, 1, 0, 1, '<p>idiot</p>\n', '2015-02-05 15:49:37', '0000-00-00 00:00:00'),
(11, 1, 0, 1, '<p>test notif</p>\n', '2015-02-05 15:53:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rpl_rule`
--

CREATE TABLE IF NOT EXISTS `rpl_rule` (
  `id_rule` int(12) NOT NULL AUTO_INCREMENT,
  `rule` varchar(50) NOT NULL,
  `admin_area` int(1) NOT NULL,
  `thread_create` int(1) NOT NULL,
  `thread_edit` int(1) NOT NULL,
  `thread_delete` int(1) NOT NULL,
  `post_create` int(1) NOT NULL,
  `post_edit` int(1) NOT NULL,
  `post_delete` int(1) NOT NULL,
  `rule_create` int(1) NOT NULL,
  `rule_edit` int(1) NOT NULL,
  `rule_delete` int(1) NOT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rpl_rule`
--

INSERT INTO `rpl_rule` (`id_rule`, `rule`, `admin_area`, `thread_create`, `thread_edit`, `thread_delete`, `post_create`, `post_edit`, `post_delete`, `rule_create`, `rule_edit`, `rule_delete`) VALUES
(0, 'member', 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
(1, 'administrator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'editor', 0, 0, 0, 0, 1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rpl_thread`
--

CREATE TABLE IF NOT EXISTS `rpl_thread` (
  `id_thread` int(12) NOT NULL AUTO_INCREMENT,
  `category_id` int(12) NOT NULL,
  `title` varchar(150) NOT NULL,
  `url_title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL,
  `date_edit` datetime NOT NULL,
  `date_last_post` datetime NOT NULL,
  PRIMARY KEY (`id_thread`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rpl_thread`
--

INSERT INTO `rpl_thread` (`id_thread`, `category_id`, `title`, `url_title`, `content`, `date_add`, `date_edit`, `date_last_post`) VALUES
(1, 2, 'PHP My Admin\r\n', 'php-my-admin', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(2, 2, 'Framework Code Igniter', 'framework-code-igniter', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(3, 2, 'Framework Laravel', 'framework-laravel', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(4, 1, 'Macromedia Flash', 'macromedia-flash', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(5, 2, 'Adobe Photoshop', 'adobe-photoshop', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(6, 2, 'Jobs Said', 'jobs-said', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(7, 2, 'Bill Motivation\r\n', 'bill-motivation', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00'),
(8, 2, 'HON\r\n', 'hon', 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2015-02-03 00:00:00', '0000-00-00 00:00:00', '2015-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rpl_users`
--

CREATE TABLE IF NOT EXISTS `rpl_users` (
  `id_user` int(12) NOT NULL AUTO_INCREMENT,
  `rule_id` int(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `interest` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `years` varchar(4) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rpl_users`
--

INSERT INTO `rpl_users` (`id_user`, `rule_id`, `username`, `password`, `name`, `email`, `website`, `address`, `interest`, `about`, `years`, `img`) VALUES
(1, 1, 'murtala', 'n4c7S1yQsCHms+PLUZkEDYmEa7rsRqNi0RdatC0mwYu/4TXVt3RmvvKK1IcQkwjVmWKeYQsZFsfZW3uQwgga2A==', 'Murtala', 'murtala@sliolab.com', 'www.sliolab.com', '', 'Hardware, Networking', '', '2005', ''),
(3, 0, 'hendri', 'lGTsVzw38VAE0mnzaCl+knkDXOSD/By8yVRxPdbloXS5CpatfnjeZx5lcZ7eQZBIQqec75El9QoUQ08vn/qWFw==', '', 'hendri@soonpoh.co.id', '', '', '', '', '2005', ''),
(7, 0, 'alfito', 'uncb80K+On+9YJDSYlKTrxgDWY/tvWU9nZ4mTQQJO/9toxDq2DheKHuqAZJ0osxVoiPTv7VRgAoVGeOIqxj61A==', '', 'alfito@soonpoh.co.id', '', '', '', '', '2005', ''),
(8, 1, 'mzulfikar', 'i7PO0ONbQIJp3/CEPhvK1/mNSb7YwQ6JGmpS2v0bSvPeJwsIsOWtuVLqdtHmertM1f1EPY7sB+uV1SU1ram5Qw==', 'Muhammad Zulfiakr', 'mzulfikar@sliolab.com', 'www.sliolab.com', 'Munjul Jakarta Timur', 'Anime', 'Damn Ass', '2005', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
