-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2014 at 09:16 AM
-- Server version: 5.5.38-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `basesmysqls`
--

DROP TABLE IF EXISTS `basesmysqls`;
CREATE TABLE IF NOT EXISTS `basesmysqls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `db` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_id` int(10) NOT NULL,
  `migration_id` int(12) DEFAULT NULL,
  `datemod` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(12) DEFAULT NULL,
  `statut_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=275 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=262 ;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='the configurations for the website' AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `Notes` text COLLATE utf8_unicode_ci NOT NULL,
  `EmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email2Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email3Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PrimaryPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HomePhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HomePhone2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MobilePhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HomeAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `Profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=907 ;

-- --------------------------------------------------------

--
-- Table structure for table `externes`
--

DROP TABLE IF EXISTS `externes`;
CREATE TABLE IF NOT EXISTS `externes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `server` text COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(9) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `garant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `pm_project_id` int(12) NOT NULL,
  `mail_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_body` text COLLATE utf8_unicode_ci NOT NULL,
  `mail_sign` text COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='base de connaissance' AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prog_language_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='usefull functions' AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `joboffers`
--

DROP TABLE IF EXISTS `joboffers`;
CREATE TABLE IF NOT EXISTS `joboffers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `poste` text NOT NULL,
  `lettre` text NOT NULL,
  `cat` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `lesmigrations`
--

DROP TABLE IF EXISTS `lesmigrations`;
CREATE TABLE IF NOT EXISTS `lesmigrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serveursource` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serveurcible` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(12) NOT NULL,
  `urlsource` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urlcible` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pathsrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pathcible` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `loginresp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailscc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginscc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unix` text COLLATE utf8_unicode_ci,
  `mysql` text COLLATE utf8_unicode_ci,
  `limesurvey` text COLLATE utf8_unicode_ci,
  `limesrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limecible` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut_id` int(12) DEFAULT NULL,
  `temps_prevu` int(3) DEFAULT NULL,
  `temps_reel` int(3) DEFAULT NULL,
  `parent` int(12) DEFAULT NULL,
  `difficulte` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `obsoletelogins`
--

DROP TABLE IF EXISTS `obsoletelogins`;
CREATE TABLE IF NOT EXISTS `obsoletelogins` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `datenotifpostmaster` date NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `garant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastmodif` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `remarques` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=126 ;

-- --------------------------------------------------------

--
-- Table structure for table `patchadmins`
--

DROP TABLE IF EXISTS `patchadmins`;
CREATE TABLE IF NOT EXISTS `patchadmins` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `server` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `db` varchar(255) NOT NULL,
  `sqlserver` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `racine` text NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `loginmysql` varchar(255) NOT NULL,
  `passwdmysql` varchar(255) NOT NULL,
  `urladmin` varchar(255) NOT NULL,
  `loginadmin` varchar(255) NOT NULL,
  `passwdadmin` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `todos` text NOT NULL,
  `rem` text NOT NULL,
  `miseajour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scriptpatch` tinyint(4) NOT NULL DEFAULT '0',
  `typetrans` varchar(255) NOT NULL DEFAULT 'ftp',
  `priv` tinyint(4) NOT NULL DEFAULT '1',
  `meladmin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_bookmarks`
--

DROP TABLE IF EXISTS `pm_bookmarks`;
CREATE TABLE IF NOT EXISTS `pm_bookmarks` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `category` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `shared` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `home` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comments` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `users` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_delays`
--

DROP TABLE IF EXISTS `pm_delays`;
CREATE TABLE IF NOT EXISTS `pm_delays` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `days` int(12) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='delays for pushing tasks' AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_files`
--

DROP TABLE IF EXISTS `pm_files`;
CREATE TABLE IF NOT EXISTS `pm_files` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments_approval` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `approver` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_approval` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vc_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `vc_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0',
  `vc_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `phase` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2034 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_members`
--

DROP TABLE IF EXISTS `pm_members`;
CREATE TABLE IF NOT EXISTS `pm_members` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `organization` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `login` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_work` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_home` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_work` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_home` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `profil` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logout_time` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `last_page` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_menus`
--

DROP TABLE IF EXISTS `pm_menus`;
CREATE TABLE IF NOT EXISTS `pm_menus` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(3) NOT NULL,
  `rank` int(3) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `style_li` text COLLATE utf8_unicode_ci NOT NULL,
  `style_img` text COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_after` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='application menus' AUTO_INCREMENT=102 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_notes`
--

DROP TABLE IF EXISTS `pm_notes`;
CREATE TABLE IF NOT EXISTS `pm_notes` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_organizations`
--

DROP TABLE IF EXISTS `pm_organizations`;
CREATE TABLE IF NOT EXISTS `pm_organizations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension_logo` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_projects`
--

DROP TABLE IF EXISTS `pm_projects`;
CREATE TABLE IF NOT EXISTS `pm_projects` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pm_organization_id` int(12) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `url_dev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_prod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `upload_max` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phase_set` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=150 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks`
--

DROP TABLE IF EXISTS `pm_tasks`;
CREATE TABLE IF NOT EXISTS `pm_tasks` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimated_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actual_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5855 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_archiv`
--

DROP TABLE IF EXISTS `pm_tasks_archiv`;
CREATE TABLE IF NOT EXISTS `pm_tasks_archiv` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimated_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actual_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5855 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_pm_members`
--

DROP TABLE IF EXISTS `pm_tasks_pm_members`;
CREATE TABLE IF NOT EXISTS `pm_tasks_pm_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_task_id` int(12) NOT NULL,
  `pm_member_id` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1206 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_revs`
--

DROP TABLE IF EXISTS `pm_tasks_revs`;
CREATE TABLE IF NOT EXISTS `pm_tasks_revs` (
  `id` int(11) NOT NULL,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimated_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actual_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_created` datetime NOT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6189 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_tags`
--

DROP TABLE IF EXISTS `pm_tasks_tags`;
CREATE TABLE IF NOT EXISTS `pm_tasks_tags` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pm_task_id` int(12) NOT NULL,
  `tag_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='pm_task has many tags' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_time`
--

DROP TABLE IF EXISTS `pm_tasks_time`;
CREATE TABLE IF NOT EXISTS `pm_tasks_time` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `hours` float(10,2) NOT NULL DEFAULT '0.00',
  `comments` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26773 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tasks_time_archiv`
--

DROP TABLE IF EXISTS `pm_tasks_time_archiv`;
CREATE TABLE IF NOT EXISTS `pm_tasks_time_archiv` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `hours` float(10,2) NOT NULL DEFAULT '0.00',
  `comments` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26773 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_teams`
--

DROP TABLE IF EXISTS `pm_teams`;
CREATE TABLE IF NOT EXISTS `pm_teams` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `published` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `authorized` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_tickets`
--

DROP TABLE IF EXISTS `pm_tickets`;
CREATE TABLE IF NOT EXISTS `pm_tickets` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pm_task_id` int(12) NOT NULL,
  `ticket_id` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_times`
--

DROP TABLE IF EXISTS `pm_times`;
CREATE TABLE IF NOT EXISTS `pm_times` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `hours` decimal(3,2) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='delays for pushing tasks' AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_updates`
--

DROP TABLE IF EXISTS `pm_updates`;
CREATE TABLE IF NOT EXISTS `pm_updates` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `item` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `comments` text COLLATE utf8_unicode_ci,
  `created` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4141 ;

-- --------------------------------------------------------

--
-- Table structure for table `pm_urls_logs`
--

DROP TABLE IF EXISTS `pm_urls_logs`;
CREATE TABLE IF NOT EXISTS `pm_urls_logs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9463 ;

-- --------------------------------------------------------

--
-- Table structure for table `prog_languages`
--

DROP TABLE IF EXISTS `prog_languages`;
CREATE TABLE IF NOT EXISTS `prog_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='usefull functions' AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='roles des utilisateurs' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuts`
--

DROP TABLE IF EXISTS `statuts`;
CREATE TABLE IF NOT EXISTS `statuts` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cdu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rem1` text COLLATE utf8_unicode_ci NOT NULL,
  `rem2` text COLLATE utf8_unicode_ci NOT NULL,
  `rem3` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags_cdu`
--

DROP TABLE IF EXISTS `tags_cdu`;
CREATE TABLE IF NOT EXISTS `tags_cdu` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cdu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rem1` text COLLATE utf8_unicode_ci NOT NULL,
  `rem2` text COLLATE utf8_unicode_ci NOT NULL,
  `rem3` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71236 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `types_cms`
--

DROP TABLE IF EXISTS `types_cms`;
CREATE TABLE IF NOT EXISTS `types_cms` (
  `id` int(11) NOT NULL,
  `type_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `path` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL COMMENT 'date de création de l''utilisateur',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date de modification de l''utilisateur',
  `date_deleted` datetime NOT NULL COMMENT 'date de suppression de l''utilisateur',
  `notes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortname` (`shortname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='utilisateurs pmcake' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zefiles`
--

DROP TABLE IF EXISTS `zefiles`;
CREATE TABLE IF NOT EXISTS `zefiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(12) NOT NULL,
  `name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=241 ;

-- --------------------------------------------------------

--
-- Table structure for table `__keys`
--

DROP TABLE IF EXISTS `__keys`;
CREATE TABLE IF NOT EXISTS `__keys` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `recent` int(11) NOT NULL,
  PRIMARY KEY (`tablename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `__locks`
--

DROP TABLE IF EXISTS `__locks`;
CREATE TABLE IF NOT EXISTS `__locks` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `record` int(11) NOT NULL,
  `username` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `obtained` int(11) NOT NULL,
  PRIMARY KEY (`tablename`,`record`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `__log`
--

DROP TABLE IF EXISTS `__log`;
CREATE TABLE IF NOT EXISTS `__log` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `rowid` int(11) DEFAULT NULL,
  `action` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
