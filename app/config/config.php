<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

$config['base_url'] = "http://localhost/php-cms-starter/";
$config['main_controller'] = "main";
$config['autoload'] = array();
$config['cache'] = false;
$config['cache_paht'] = "/app/cache";
$config['csrf'] = false;
$config['cookie_http'] = true;
$config['cookie_time'] = 3000;
$config['cookie_domain'] = "http://localhost/php-cms-starter";
$config['enscrypt_key'] = "";

$config['db_host'] = "localhost";
$config['db_user'] = "root";
$config['db_password'] = "root";
$config['db_name'] = "mvc";
?>