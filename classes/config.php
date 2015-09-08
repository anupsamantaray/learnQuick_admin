<?php
error_reporting(E_ERROR | E_PARSE);
//error_reporting(E_ALL);
ini_set("memory_limit","200M");
if (ini_get("pcre.backtrack_limit") < 1000000000) { ini_set("pcre.backtrack_limit",1000000000); };
@set_time_limit(10000000);
ini_set('max_execution_time', '100000');
session_start();
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');


define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'learnquix');

 

define('SITE_PATH', substr(dirname(__FILE__),0,-8));
define('SITE_CLASS_PATH', SITE_PATH.'/classes');
define('ADMIN_PATH', SITE_PATH . '/admin');

//define('SITE_URL', 'http://androappstech.com/school_admin/');

//define('SITE_URL', 'http://localhost/sunny2');

define('ADMIN_URL', SITE_URL . '/admin');



define('MAX_RECORDS', 10);
putenv("TZ=Asia/Kolkata");
require_once (SITE_CLASS_PATH . '/db_connect.php');
//require_once (SITE_CLASS_PATH . '/class.phpmailer.php');
//require_once (SITE_CLASS_PATH . '/commonFunctions.php');
?>