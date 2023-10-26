-- Adminer 4.8.1 MySQL 5.5.5-10.11.3-MariaDB-1:10.11.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+02:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`
(
    `email`                              varchar(128) NOT NULL,
    `password`                           varchar(128) NOT NULL,
    `first_name`                         varchar(128) NOT NULL,
    `last_name`                          varchar(128) NOT NULL,
    `active`                             tinyint(4)   NOT NULL DEFAULT 0,
    `activation_token`                   varchar(64)           DEFAULT NULL,
    `activation_token_expiration_date`   timestamp    NULL     DEFAULT NULL,
    `refresh_token`                      varchar(64)           DEFAULT NULL,
    `refresh_token_expiration_date`      timestamp    NULL     DEFAULT NULL,
    `reset_passwd_token`                 varchar(64)           DEFAULT NULL,
    `reset_passwd_token_expiration_date` timestamp    NULL     DEFAULT NULL,
    PRIMARY KEY (`email`),
    UNIQUE KEY `unique_activation_token` (`activation_token`),
    UNIQUE KEY `unique_refresh_token` (`refresh_token`),
    UNIQUE KEY `unique_reset_passwd_token` (`reset_passwd_token`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- 2023-10-24 10:12:42