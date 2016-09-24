<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

$config['base_url'] = "http://localhost/php-cms-starter/";
$config['site_title'] = "Test Custom MVS CMS";
$config['main_controller'] = "main";
$config['autoload'] = array();
$config['cache'] = false;
$config['cache_paht'] = "/app/cache";
$config['csrf'] = false;
$config['cookie_http'] = true;
$config['cookie_time'] = 3000;
$config['cookie_domain'] = "http://localhost/php-cms-starter";
$config['enscrypt_key'] = "Sb4yD3e";

$config['db_connect'] = true;
$config['db_host'] = "localhost";
$config['db_user'] = "root";
$config['db_password'] = "root";
$config['db_name'] = "mvc";
?>