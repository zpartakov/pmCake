-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: akademiach4
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `__keys`
--

DROP TABLE IF EXISTS `__keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__keys` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `recent` int(11) NOT NULL,
  PRIMARY KEY (`tablename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `__locks`
--

DROP TABLE IF EXISTS `__locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__locks` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `record` int(11) NOT NULL,
  `username` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `obtained` int(11) NOT NULL,
  PRIMARY KEY (`tablename`,`record`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `__log`
--

DROP TABLE IF EXISTS `__log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__log` (
  `tablename` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `rowid` int(11) DEFAULT NULL,
  `action` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `basesmysqls`
--

DROP TABLE IF EXISTS `basesmysqls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basesmysqls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `db` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `server_id` int(10) NOT NULL,
  `migration_id` int(12) DEFAULT NULL,
  `datemod` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(12) DEFAULT NULL,
  `statut_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=275 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cellwebs`
--

DROP TABLE IF EXISTS `cellwebs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cellwebs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL COMMENT 'date de création de l''utilisateur',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date de modification de l''utilisateur',
  `date_deleted` datetime NOT NULL COMMENT 'date de suppression de l''utilisateur',
  `notes` text COLLATE utf8_unicode_ci,
  `note1` text COLLATE utf8_unicode_ci NOT NULL,
  `note2` text COLLATE utf8_unicode_ci NOT NULL,
  `note3` text COLLATE utf8_unicode_ci NOT NULL,
  `note4` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='utilisateurs pmcake';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chronologies`
--

DROP TABLE IF EXISTS `chronologies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chronologies` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `lib` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pays` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1369 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms` (
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
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cms2whishlist`
--

DROP TABLE IF EXISTS `cms2whishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms2whishlist` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Priority` int(1) NOT NULL,
  `joomla_compatible` int(1) NOT NULL,
  `url_soft` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_dev` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `internal_notes` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'notes internes webmaster',
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_in` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='besoins des usagers sur cms2';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `const_skills`
--

DROP TABLE IF EXISTS `const_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `const_skills` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seq` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=898 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Scheduled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `externes`
--

DROP TABLE IF EXISTS `externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `externes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `server` text NOT NULL,
  `login` varchar(255) NOT NULL,
  `uid` int(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `garant` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `rem` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='base de connaissance';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `joboffers`
--

DROP TABLE IF EXISTS `joboffers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joboffers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `poste` text NOT NULL,
  `lettre` text NOT NULL,
  `cat` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesmigrations`
--

DROP TABLE IF EXISTS `lesmigrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesmigrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serveursource` varchar(255) DEFAULT NULL,
  `serveurcible` varchar(255) DEFAULT NULL,
  `type_id` int(12) NOT NULL,
  `urlsource` varchar(255) DEFAULT NULL,
  `urlcible` varchar(255) DEFAULT NULL,
  `pathsrc` varchar(255) DEFAULT NULL,
  `pathcible` varchar(255) DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `loginresp` varchar(255) DEFAULT NULL,
  `emailscc` varchar(255) DEFAULT NULL,
  `loginscc` varchar(255) DEFAULT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `vhost` varchar(255) DEFAULT NULL,
  `unix` text,
  `mysql` text,
  `limesurvey` text,
  `limesrc` varchar(255) DEFAULT NULL,
  `limecible` varchar(255) DEFAULT NULL,
  `cms` varchar(255) DEFAULT NULL,
  `statut_id` int(12) DEFAULT NULL,
  `temps_prevu` int(3) DEFAULT NULL,
  `temps_reel` int(3) DEFAULT NULL,
  `parent` int(12) DEFAULT NULL,
  `difficulte` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28178 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `obsoletelogins`
--

DROP TABLE IF EXISTS `obsoletelogins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obsoletelogins` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `datenotifpostmaster` date NOT NULL,
  `login` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `server` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `garant` varchar(255) NOT NULL,
  `lastmodif` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `remarques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patchadmins`
--

DROP TABLE IF EXISTS `patchadmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patchadmins` (
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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_bookmarks`
--

DROP TABLE IF EXISTS `pm_bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_bookmarks` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `category` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `shared` char(1) NOT NULL DEFAULT '',
  `home` char(1) NOT NULL DEFAULT '',
  `comments` char(1) NOT NULL DEFAULT '',
  `users` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_delays`
--

DROP TABLE IF EXISTS `pm_delays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_delays` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `days` int(12) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='delays for pushing tasks';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_files`
--

DROP TABLE IF EXISTS `pm_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_files` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(16) DEFAULT NULL,
  `size` varchar(155) DEFAULT NULL,
  `extension` varchar(155) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `comments_approval` varchar(255) DEFAULT NULL,
  `approver` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_approval` varchar(16) DEFAULT NULL,
  `upload` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vc_status` varchar(255) NOT NULL DEFAULT '0',
  `vc_version` varchar(255) NOT NULL DEFAULT '0.0',
  `vc_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `phase` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2034 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_kb_messages`
--

DROP TABLE IF EXISTS `pm_kb_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_kb_messages` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` text COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='messages base de connaissance (KB)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_members`
--

DROP TABLE IF EXISTS `pm_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_members` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `organization` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `login` varchar(155) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL,
  `name` varchar(155) DEFAULT NULL,
  `title` varchar(155) DEFAULT NULL,
  `email_work` varchar(155) DEFAULT NULL,
  `email_home` varchar(155) DEFAULT NULL,
  `phone_work` varchar(155) DEFAULT NULL,
  `phone_home` varchar(155) DEFAULT NULL,
  `mobile` varchar(155) DEFAULT NULL,
  `fax` varchar(155) DEFAULT NULL,
  `comments` text,
  `profil` char(1) NOT NULL DEFAULT '',
  `created` varchar(16) DEFAULT NULL,
  `logout_time` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `last_page` varchar(255) DEFAULT NULL,
  `timezone` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_menus`
--

DROP TABLE IF EXISTS `pm_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_menus` (
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='application menus';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_notes`
--

DROP TABLE IF EXISTS `pm_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_notes` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic` varchar(255) DEFAULT NULL,
  `subject` varchar(155) DEFAULT NULL,
  `description` text,
  `date` varchar(10) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_organizations`
--

DROP TABLE IF EXISTS `pm_organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_organizations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zip_code` varchar(155) DEFAULT NULL,
  `city` varchar(155) DEFAULT NULL,
  `country` varchar(155) DEFAULT NULL,
  `phone` varchar(155) DEFAULT NULL,
  `fax` varchar(155) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `comments` text,
  `created` varchar(16) DEFAULT NULL,
  `extension_logo` char(3) NOT NULL DEFAULT '',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_projects`
--

DROP TABLE IF EXISTS `pm_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_projects` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `organization` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `url_dev` varchar(255) DEFAULT NULL,
  `url_prod` varchar(255) DEFAULT NULL,
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `upload_max` varchar(155) DEFAULT NULL,
  `phase_set` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks`
--

DROP TABLE IF EXISTS `pm_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3369 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks20111105`
--

DROP TABLE IF EXISTS `pm_tasks20111105`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks20111105` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2473 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks20120731`
--

DROP TABLE IF EXISTS `pm_tasks20120731`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks20120731` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks20120828`
--

DROP TABLE IF EXISTS `pm_tasks20120828`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks20120828` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) NOT NULL COMMENT 'parent task id, 0 if none',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `mod_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=469 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks_revs`
--

DROP TABLE IF EXISTS `pm_tasks_revs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks_revs` (
  `id` int(11) NOT NULL,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_created` datetime NOT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4040 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks_time`
--

DROP TABLE IF EXISTS `pm_tasks_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks_time` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` varchar(16) DEFAULT NULL,
  `hours` float(10,2) NOT NULL DEFAULT '0.00',
  `comments` text,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16137 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks_time20110707`
--

DROP TABLE IF EXISTS `pm_tasks_time20110707`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks_time20110707` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` varchar(16) DEFAULT NULL,
  `hours` float(10,2) NOT NULL DEFAULT '0.00',
  `comments` text,
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10595 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tasks_timeSAV`
--

DROP TABLE IF EXISTS `pm_tasks_timeSAV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tasks_timeSAV` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` varchar(16) DEFAULT NULL,
  `hours` float(10,2) NOT NULL DEFAULT '0.00',
  `comments` text,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_teams`
--

DROP TABLE IF EXISTS `pm_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_teams` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `published` char(1) NOT NULL DEFAULT '',
  `authorized` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_tickets`
--

DROP TABLE IF EXISTS `pm_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_tickets` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pm_task_id` int(12) NOT NULL,
  `ticket_id` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_times`
--

DROP TABLE IF EXISTS `pm_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_times` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `hours` decimal(3,2) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='delays for pushing tasks';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_updates`
--

DROP TABLE IF EXISTS `pm_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_updates` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(1) NOT NULL DEFAULT '',
  `item` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `comments` text,
  `created` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4141 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pm_urls_logs`
--

DROP TABLE IF EXISTS `pm_urls_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_urls_logs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9463 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='roles des utilisateurs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `canonical` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `showcms`
--

DROP TABLE IF EXISTS `showcms`;
/*!50001 DROP VIEW IF EXISTS `showcms`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `showcms` (
  `lib` varchar(255),
  `server` varchar(255),
  `url` varchar(255),
  `login` varchar(255),
  `email` varchar(255),
  `date` timestamp,
  `rem` text,
  `id` int(12)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `statuts`
--

DROP TABLE IF EXISTS `statuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuts` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cdu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rem1` text COLLATE utf8_unicode_ci NOT NULL,
  `rem2` text COLLATE utf8_unicode_ci NOT NULL,
  `rem3` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71236 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tags00`
--

DROP TABLE IF EXISTS `tags00`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags00` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cdu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rem1` text COLLATE utf8_unicode_ci NOT NULL,
  `rem2` text COLLATE utf8_unicode_ci NOT NULL,
  `rem3` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2885 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tags01`
--

DROP TABLE IF EXISTS `tags01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags01` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cdu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rem1` text COLLATE utf8_unicode_ci NOT NULL,
  `rem2` text COLLATE utf8_unicode_ci NOT NULL,
  `rem3` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56902 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tasks_revs`
--

DROP TABLE IF EXISTS `tasks_revs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks_revs` (
  `id` int(11) NOT NULL,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `priority` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `owner` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `assigned_to` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(155) DEFAULT NULL,
  `description` text,
  `start_date` varchar(10) DEFAULT NULL,
  `due_date` varchar(10) DEFAULT NULL,
  `estimated_time` varchar(10) DEFAULT NULL,
  `actual_time` varchar(10) DEFAULT NULL,
  `comments` text,
  `completion` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created` varchar(16) DEFAULT NULL,
  `modified` varchar(16) DEFAULT NULL,
  `assigned` varchar(16) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT '',
  `parent_phase` int(10) unsigned NOT NULL DEFAULT '0',
  `complete_date` varchar(10) DEFAULT NULL,
  `service` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `milestone` char(1) NOT NULL DEFAULT '',
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_created` datetime NOT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types_cms`
--

DROP TABLE IF EXISTS `types_cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types_cms` (
  `id` int(11) NOT NULL,
  `type_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `path` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='utilisateurs pmcake';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_access_function`
--

DROP TABLE IF EXISTS `webcal_access_function`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_access_function` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_permissions` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_access_user`
--

DROP TABLE IF EXISTS `webcal_access_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_access_user` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_other_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_can_view` int(11) NOT NULL DEFAULT '0',
  `cal_can_edit` int(11) NOT NULL DEFAULT '0',
  `cal_can_approve` int(11) NOT NULL DEFAULT '0',
  `cal_can_invite` char(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `cal_can_email` char(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `cal_see_time_only` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`cal_login`,`cal_other_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_asst`
--

DROP TABLE IF EXISTS `webcal_asst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_asst` (
  `cal_boss` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_assistant` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cal_boss`,`cal_assistant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_blob`
--

DROP TABLE IF EXISTS `webcal_blob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_blob` (
  `cal_blob_id` int(11) NOT NULL,
  `cal_id` int(11) DEFAULT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_size` int(11) DEFAULT NULL,
  `cal_mime_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `cal_mod_date` int(11) NOT NULL,
  `cal_mod_time` int(11) NOT NULL,
  `cal_blob` longblob,
  PRIMARY KEY (`cal_blob_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_categories`
--

DROP TABLE IF EXISTS `webcal_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_owner` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cat_color` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_config`
--

DROP TABLE IF EXISTS `webcal_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_config` (
  `cal_setting` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cal_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_setting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry`
--

DROP TABLE IF EXISTS `webcal_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry` (
  `cal_id` int(11) NOT NULL,
  `cal_group_id` int(11) DEFAULT NULL,
  `cal_ext_for_id` int(11) DEFAULT NULL,
  `cal_create_by` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_time` int(11) DEFAULT NULL,
  `cal_mod_date` int(11) DEFAULT NULL,
  `cal_mod_time` int(11) DEFAULT NULL,
  `cal_duration` int(11) NOT NULL,
  `cal_due_date` int(11) DEFAULT NULL,
  `cal_due_time` int(11) DEFAULT NULL,
  `cal_priority` int(11) DEFAULT '5',
  `cal_type` char(1) COLLATE utf8_unicode_ci DEFAULT 'E',
  `cal_access` char(1) COLLATE utf8_unicode_ci DEFAULT 'P',
  `cal_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cal_location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_completed` int(11) DEFAULT NULL,
  `cal_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`cal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_categories`
--

DROP TABLE IF EXISTS `webcal_entry_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_categories` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_owner` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_categoriesSAV`
--

DROP TABLE IF EXISTS `webcal_entry_categoriesSAV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_categoriesSAV` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_owner` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_ext_user`
--

DROP TABLE IF EXISTS `webcal_entry_ext_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_ext_user` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cal_email` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_id`,`cal_fullname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_log`
--

DROP TABLE IF EXISTS `webcal_entry_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_log` (
  `cal_log_id` int(11) NOT NULL,
  `cal_entry_id` int(11) NOT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_user_cal` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_time` int(11) DEFAULT NULL,
  `cal_text` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`cal_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_repeats`
--

DROP TABLE IF EXISTS `webcal_entry_repeats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_repeats` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_end` int(11) DEFAULT NULL,
  `cal_endtime` int(11) DEFAULT NULL,
  `cal_frequency` int(11) DEFAULT '1',
  `cal_days` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_bymonth` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_bymonthday` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_byday` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_bysetpos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_byweekno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_byyearday` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_wkst` char(2) COLLATE utf8_unicode_ci DEFAULT 'MO',
  `cal_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_repeats_not`
--

DROP TABLE IF EXISTS `webcal_entry_repeats_not`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_repeats_not` (
  `cal_id` int(11) NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_exdate` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cal_id`,`cal_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_entry_user`
--

DROP TABLE IF EXISTS `webcal_entry_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_user` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_status` char(1) COLLATE utf8_unicode_ci DEFAULT 'A',
  `cal_category` int(11) DEFAULT NULL,
  `cal_percent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cal_id`,`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_group`
--

DROP TABLE IF EXISTS `webcal_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_group` (
  `cal_group_id` int(11) NOT NULL,
  `cal_owner` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cal_last_update` int(11) NOT NULL,
  PRIMARY KEY (`cal_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_group_user`
--

DROP TABLE IF EXISTS `webcal_group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_group_user` (
  `cal_group_id` int(11) NOT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cal_group_id`,`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_import`
--

DROP TABLE IF EXISTS `webcal_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_import` (
  `cal_import_id` int(11) NOT NULL,
  `cal_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_import_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_import_data`
--

DROP TABLE IF EXISTS `webcal_import_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_import_data` (
  `cal_import_id` int(11) NOT NULL,
  `cal_id` int(11) NOT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_import_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cal_external_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_id`,`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_nonuser_cals`
--

DROP TABLE IF EXISTS `webcal_nonuser_cals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_nonuser_cals` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_lastname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_firstname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_admin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_is_public` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `cal_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_reminders`
--

DROP TABLE IF EXISTS `webcal_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_reminders` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_date` int(11) NOT NULL DEFAULT '0',
  `cal_offset` int(11) NOT NULL DEFAULT '0',
  `cal_related` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `cal_before` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `cal_last_sent` int(11) NOT NULL DEFAULT '0',
  `cal_repeats` int(11) NOT NULL DEFAULT '0',
  `cal_duration` int(11) NOT NULL DEFAULT '0',
  `cal_times_sent` int(11) NOT NULL DEFAULT '0',
  `cal_action` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EMAIL',
  PRIMARY KEY (`cal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_report`
--

DROP TABLE IF EXISTS `webcal_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_report` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_report_id` int(11) NOT NULL,
  `cal_is_global` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `cal_report_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cal_include_header` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `cal_report_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cal_time_range` int(11) NOT NULL,
  `cal_user` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_allow_nav` char(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `cal_cat_id` int(11) DEFAULT NULL,
  `cal_include_empty` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `cal_show_in_trailer` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `cal_update_date` int(11) NOT NULL,
  PRIMARY KEY (`cal_report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_report_template`
--

DROP TABLE IF EXISTS `webcal_report_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_report_template` (
  `cal_report_id` int(11) NOT NULL,
  `cal_template_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `cal_template_text` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`cal_report_id`,`cal_template_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_site_extras`
--

DROP TABLE IF EXISTS `webcal_site_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_site_extras` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_type` int(11) NOT NULL,
  `cal_date` int(11) DEFAULT '0',
  `cal_remind` int(11) DEFAULT '0',
  `cal_data` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_timezones`
--

DROP TABLE IF EXISTS `webcal_timezones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_timezones` (
  `tzid` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtstart` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtend` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtimezone` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tzid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_user`
--

DROP TABLE IF EXISTS `webcal_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_passwd` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_lastname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_firstname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_is_admin` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `cal_email` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_enabled` char(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `cal_telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_address` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_title` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_birthday` int(11) DEFAULT NULL,
  `cal_last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_user_layers`
--

DROP TABLE IF EXISTS `webcal_user_layers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_layers` (
  `cal_layerid` int(11) NOT NULL DEFAULT '0',
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_layeruser` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_color` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_dups` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`cal_login`,`cal_layeruser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_user_pref`
--

DROP TABLE IF EXISTS `webcal_user_pref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_pref` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_setting` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cal_login`,`cal_setting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_user_template`
--

DROP TABLE IF EXISTS `webcal_user_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_template` (
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `cal_template_text` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`cal_login`,`cal_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_view`
--

DROP TABLE IF EXISTS `webcal_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_view` (
  `cal_view_id` int(11) NOT NULL,
  `cal_owner` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cal_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cal_view_type` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cal_is_global` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`cal_view_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `webcal_view_user`
--

DROP TABLE IF EXISTS `webcal_view_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_view_user` (
  `cal_view_id` int(11) NOT NULL,
  `cal_login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cal_view_id`,`cal_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `zefiles`
--

DROP TABLE IF EXISTS `zefiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zefiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(12) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `showcms`
--

/*!50001 DROP TABLE IF EXISTS `showcms`*/;
/*!50001 DROP VIEW IF EXISTS `showcms`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `showcms` AS select `t`.`lib` AS `lib`,`c`.`server` AS `server`,`c`.`url` AS `url`,`c`.`login` AS `login`,`c`.`email` AS `email`,`c`.`date` AS `date`,`c`.`rem` AS `rem`,`c`.`id` AS `id` from (`types` `t` join `cms` `c`) where (`c`.`type_id` = `t`.`id`) order by `c`.`type_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-09-24 10:22:51
