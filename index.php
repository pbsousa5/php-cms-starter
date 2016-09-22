<?php
define('ROOT', __DIR__);
require_once(ROOT."/app/configs/config.php");
function call($controller, $action) {
	$controller_file = ROOT.'/app/controllers/' . $controller . '.php';
	
	if(file_exists($controller_file)){
		require_once($controller_file);
		$controller = "\\app\\controllers\\".$controller
		$controller = new $class();
		$controller->{ $action }();
	}else{
		die('Error not have file : '.$controller_file); exit();
	}
}
if (isset($_GET['controller']) && isset($_GET['action'])) {
	$controller = $_GET['controller'];
	$action     = $_GET['action'];
} else {
	$controller = $config['root_page'];
	$action     = 'index';
}

call($controller, $action);
?>