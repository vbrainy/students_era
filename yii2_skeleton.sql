-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2014 at 05:31 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2_skeleton`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_format`
--

CREATE TABLE IF NOT EXISTS `email_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=In-Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `email_format`
--

INSERT INTO `email_format` (`id`, `title`, `subject`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'forgot_password', 'Voice - Forgot Password', '<table cellpadding="0" cellspacing="0" border="0" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td style="padding:20px 0 20px 0" align="center" valign="top"><!-- [ header starts here] -->\r\n            <table style="border:1px solid #E0E0E0;" cellpadding="10" cellspacing="0" bgcolor="FFFFFF" border="0" width="650">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style="background: #444444; " bgcolor="#EAEAEA" valign="top"><p><a href="{logo_front_url}"><img style="" src="{logo_img_url}" alt="Voice" title="Voice"></a></p><p></p><p></p></td>\r\n                    </tr>\r\n                    <!-- [ middle starts here] -->\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <p>Dear  {username},</p>  \r\n                        <p>Your New Password is :<br></p><p><strong>E-mail:</strong> {email}<br>     \r\n                         </p><p><strong>Password:</strong> {password}<br>    \r\n                        \r\n                        </p><p>&nbsp;</p>\r\n                        </td>\r\n                    </tr>\r\n                   <tr>\r\n                        <td style="background: #444444; text-align:center;color: white;" align="center" bgcolor="#EAEAEA"><center>\r\n                        <p style="font-size:12px; margin:0;">Voice Team</p>\r\n                        </center></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 1, '2013-09-08 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `badge_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_code` varchar(10) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '0 = male, 1 = female',
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `signin_with` tinyint(4) DEFAULT NULL COMMENT '0 = site, 1=facebook, 2=twitter',
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = in-active, 1=active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='(All users - Master table) (store batch, personal profile details)' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `facebook_id`, `twitter_id`, `badge_number`, `email`, `password`, `security_code`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `phone_number`, `address`, `city`, `website`, `signin_with`, `last_login`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, 'admin@admin.com', '0192023a7bbd73250516f069df18b500', NULL, 'Administrator', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2014-12-23 12:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `role_description`) VALUES
(1, 'Super Admin', 'Super Admin'),
(2, 'Admin Users', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_rules`
--

CREATE TABLE IF NOT EXISTS `user_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privileges_controller` varchar(255) NOT NULL,
  `privileges_actions` text NOT NULL,
  `permission` enum('allow','deny') NOT NULL DEFAULT 'allow',
  `permission_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_rules`
--

INSERT INTO `user_rules` (`id`, `role_id`, `privileges_controller`, `privileges_actions`, `permission`, `permission_type`) VALUES
(1, 1, 'SiteController', 'index,logout,change-password,change-status', 'allow', 'admin'),
(2, 2, 'SiteController', 'index,logout,change-password,change-status,change-user-status', 'allow', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user_rules_menu`
--

CREATE TABLE IF NOT EXISTS `user_rules_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` enum('admin','front-top','front-bottom','front-middle') NOT NULL DEFAULT 'admin',
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `user_rules_id` int(10) NOT NULL,
  `label` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `position` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 - inactive, 1 - active',
  PRIMARY KEY (`id`),
  KEY `user_rules_id` (`user_rules_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_rules_menu`
--

INSERT INTO `user_rules_menu` (`id`, `category`, `parent_id`, `user_rules_id`, `label`, `class`, `url`, `position`, `status`) VALUES
(1, 'admin', 0, 1, 'Dashboard', 'icon-home', 'site/index', 1, 1),
(3, 'admin', 0, 2, 'Dashboard', 'icon-home', 'site/index', 1, 1),
(4, 'admin', 0, 2, 'Email Template', NULL, 'email-format/index', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
