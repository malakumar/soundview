-- This entire database can be constructed by running “source setup.sql” from mysql.
CREATE DATABASE `soundview` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

USE `soundview`;

GRANT ALL PRIVILEGES ON soundview.* TO 'the_user'@'localhost' IDENTIFIED BY 'the_password';

source file.sql;
source user.sql;
source tag1.sql;
source tag2.sql;
source tag3.sql;
source songtitles.sql;
source title.sql;
source name.sql;

