<?php
define('VER', '2016071001');
define('MEM_LIFT_TIME', 3600 * 24 * 30);
define('MEM_PREX', 'mcgoldfish_');
define('DEBUG_MODE', true);
define('SITE_DOMAIN', '.mcgoldfish.com');
include_once dirname(__FILE__) . '/db_www.php';
include_once dirname(__FILE__) . '/route.php';
define('INCLUDE_ROOT', dirname(dirname(__FILE__)).'/');

define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('SITE_URL', 'http://' . HTTP_HOST);
define('FRONT_DIR', INCLUDE_ROOT . 'controller/');
define('TOP_LEVEL_DOMAIN_NAME', '');
define('TOP_HTTP_LEVEL_DOMAIN_NAME', '');

define('STATIC_RESOURCE_ORIGIN_PATH','');
define('STATIC_RESOURCE_OUTTER_PATH','');
define('IMG_URL', '');

define("SITE_NAME", '');
define('SITE_FULL_NAME', '');
define('SITE_CONTACT_EMAIL', '');
define('TIME_ZONE', 'Asia/Shanghai');
date_default_timezone_set(TIME_ZONE);

function __autoload($class)
{
	$class_file = INCLUDE_ROOT . 'library/Class.' . $class . '.php';
	if(file_exists($class_file)) return include_once($class_file);
}
spl_autoload_register( '__autoload' );