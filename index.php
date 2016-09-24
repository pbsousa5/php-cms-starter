<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Bangkok');
//Debug
// $start = microtime(true);
//Debug

define('ROOT', __DIR__);
require_once(ROOT."/app/config/Config.php");
require_once(ROOT."/app/App.php");

$app = new App($config);
$app->call($app);

//Debug
$end = microtime(true);
// $creationtime = ($end - $start);
// function convert($size)
// {
// 	$unit=array('b','kb','mb','gb','tb','pb');
// 	return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
// }
// printf("<hr>Page created in %.4f seconds.", $creationtime);
// echo(" - Memory used : ".convert(memory_get_usage()));
//
?>