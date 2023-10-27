-- Adminer 4.8.1 MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Artist`;
CREATE TABLE `Artist` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `name` varchar(64) NOT NULL,
                          `show_id` int(11) NOT NULL,
                          PRIMARY KEY (`id`),
                          KEY `show_id` (`show_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `Command`;
CREATE TABLE `Command` (
                           `id` varchar(64) NOT NULL,
                           `date_commande` datetime NOT NULL,
                           `etat` int(11) NOT NULL DEFAULT 1,
                           `montant_total` decimal(10,2) NOT NULL DEFAULT 0.00,
                           `client_mail` varchar(128) NOT NULL,
                           PRIMARY KEY (`id`),
                           KEY `email` (`client_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `Evening`;
CREATE TABLE `Evening` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `name` varchar(64) NOT NULL,
                           `thematic` varchar(256) NOT NULL,
                           `date` datetime NOT NULL,
                           `price` decimal(6,2) NOT NULL,
                           `reduced_price` decimal(6,2) NOT NULL,
                           `spot_id` int(11) NOT NULL,
                           PRIMARY KEY (`id`),
                           KEY `spot_id` (`spot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `Show`;
CREATE TABLE `Show` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` varchar(64) NOT NULL,
                        `description` text NOT NULL,
                        `time` time NOT NULL,
                        `video` varchar(255) NOT NULL,
                        `evening_id` int(11) NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `evening_id` (`evening_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `ShowImage`;
CREATE TABLE `ShowImage` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `path` varchar(255) NOT NULL,
                             `show_id` int(11) NOT NULL,
                             PRIMARY KEY (`id`),
                             KEY `show_id` (`show_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `Spot`;
CREATE TABLE `Spot` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `name` varchar(64) NOT NULL,
                        `address` varchar(128) NOT NULL,
                        `nb_standing` int(11) NOT NULL,
                        `nb_seated` int(11) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `SpotImage`;
CREATE TABLE `SpotImage` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `path` varchar(255) NOT NULL,
                             `spot_id` int(11) NOT NULL,
                             PRIMARY KEY (`id`),
                             KEY `spot_id` (`spot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE `Ticket` (
                          `id` varchar(64) NOT NULL,
                          `date` datetime NOT NULL,
                          `barcode` varchar(64) NOT NULL,
                          `client_email` varchar(128) NOT NULL,
                          `evening_id` int(11) NOT NULL,
                          `id_command` varchar(64) NOT NULL,
                          `price` int(11) NOT NULL,
                          PRIMARY KEY (`id`),
                          KEY `client_email` (`client_email`),
                          KEY `evening_id` (`evening_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
                        `email` varchar(128) NOT NULL,
                        `password` varchar(128) NOT NULL,
                        `first_name` varchar(128) NOT NULL,
                        `last_name` varchar(128) NOT NULL,
                        `active` tinyint(4) NOT NULL DEFAULT 0,
                        `activation_token` varchar(64) DEFAULT NULL,
                        `activation_token_expiration_date` timestamp NULL DEFAULT NULL,
                        `refresh_token` varchar(64) DEFAULT NULL,
                        `refresh_token_expiration_date` timestamp NULL DEFAULT NULL,
                        `reset_passwd_token` varchar(64) DEFAULT NULL,
                        `reset_passwd_token_expiration_date` timestamp NULL DEFAULT NULL,
                        PRIMARY KEY (`email`),
                        UNIQUE KEY `unique_activation_token` (`activation_token`),
                        UNIQUE KEY `unique_refresh_token` (`refresh_token`),
                        UNIQUE KEY `unique_reset_passwd_token` (`reset_passwd_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


-- 2023-10-27 16:10:57