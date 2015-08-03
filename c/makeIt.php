<?php


include('config.php');

mysql_connect($mysql['host'], $mysql['login'], $mysql['password']);
mysql_select_db($mysql['dbName']);

mysql_query('CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` bigint(11) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGIN');


