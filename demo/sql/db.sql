-- Script di Creazione della base di dati per il social Network
-- Autore: Gianotto Roberto

-- creazione del database del social network
CREATE DATABASE IF NOT EXISTS `social` /*!40100 DEFAULT CHARACTER SET utf8 */;

-- aggancio del database del social network
USE `social`;

-- creazione della tabella degli utenti
CREATE TABLE IF NOT EXISTS `social`.`users` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`signup_date` DATE NOT NULL,
	`profile_pic` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`num_posts` INT(11) UNSIGNED NOT NULL,
	`num_likes` INT(11) UNSIGNED NOT NULL,
	`user_closed` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`friend_array` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

-- creazione della tabella dei Post
CREATE TABLE IF NOT EXISTS `social`.`posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- creazione della tabella post_comments
CREATE TABLE IF NOT EXISTS `social`.`post_comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- creazione della tabella likes
CREATE TABLE IF NOT EXISTS `social`.`likes` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;