-- Adminer 4.8.1 MySQL 5.5.5-10.3.11-MariaDB-1:10.3.11+maria~bionic dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Spot`;
CREATE TABLE `Spot`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `name`        varchar(64)  NOT NULL,
    `address`     varchar(128) NOT NULL,
    `nb_standing` int(11)      NOT NULL,
    `nb_seated`   int(11)      NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `SpotImage`;
CREATE TABLE `SpotImage`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `path`    varchar(255) NOT NULL,
    `spot_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `spot_id` (`spot_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `Evening`;
CREATE TABLE `Evening`
(
    `id`            int(11)       NOT NULL AUTO_INCREMENT,
    `name`          varchar(64)   NOT NULL,
    `thematic`      varchar(256)  NOT NULL,
    `date`          datetime      NOT NULL,
    `price`         decimal(6, 2) NOT NULL,
    `reduced_price` decimal(6, 2) NOT NULL,
    `spot_id`       int(11)       NOT NULL,
    PRIMARY KEY (`id`),
    KEY `spot_id` (`spot_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `Show`;
CREATE TABLE `Show`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `title`       varchar(64)  NOT NULL,
    `description` text         NOT NULL,
    `time`        time         NOT NULL,
    `video`       varchar(255) NOT NULL,
    `evening_id`  int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `evening_id` (`evening_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `ShowImage`;
CREATE TABLE `ShowImage`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `path`    varchar(255) NOT NULL,
    `show_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `show_id` (`show_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `Artist`;
CREATE TABLE `Artist`
(
    `id`      int(11)     NOT NULL AUTO_INCREMENT,
    `name`    varchar(64) NOT NULL,
    `show_id` int(11)     NOT NULL,
    PRIMARY KEY (`id`),
    KEY `show_id` (`show_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE `Ticket`
(
    `id`           varchar(64)  NOT NULL,
    `date`         datetime     NOT NULL,
    `barcode`      varchar(64)  NOT NULL,
    `client_email` varchar(128) NOT NULL,
    `evening_id`   int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `client_email` (`client_email`),
    KEY `evening_id` (`evening_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- 2023-09-06 14:47:17