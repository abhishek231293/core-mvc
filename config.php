<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
$hostAddressUrl = $_SERVER['HTTP_HOST'];
define('URL', 'localhost/mvc/');
define('LIBS', 'libs/');
define("_ROOTPATH","http://$hostAddressUrl/mvc/");
define('DB_TYPE', 'pgsql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'instapic');
define('DB_USER', 'postgres');
define('DB_PASS', 'postgres');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');