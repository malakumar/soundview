-- This entire database can be constructed by running “source setup.sql” from mysql.
CREATE DATABASE `soundview` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

USE `soundview`;

GRANT ALL PRIVILEGES ON soundview.* TO 'anuragkumar'@'localhost' IDENTIFIED BY 'aabhay';
