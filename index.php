<?php
date_default_timezone_set('Asia/Bangkok');
//Debug
$start = microtime(true);
//Debug

define('ROOT', __DIR__);
require_once(ROOT."/app/config/Config.php");
require_once(ROOT."/app/System.php");

$system = new System($config);
$system->call();
/*function call($controller_call = '', $action = '', $parametor = '') {
	$controller_file = ROOT.'/app/controllers/' . $controller_call . '.php';
	$controller_error = ROOT.'/app/controllers/error.php';
	if(file_exists($controller_file)){
		require_once($controller_file);
		$class = $controller_call;
		$controller = new $class();
		if(method_exists($controller,$action)){
			if(is_array($parametor)){
				call_user_func_array(array($controller,$action),$parametor);
			}else{
				$controller->{ $action }();
			}
			
		}else{
			require_once($controller_error);
			$controller = new error();
			$controller->index('404',$action);
		}
	}else{
		require_once($controller_error);
		$controller = new error();
		$controller->index('404',$controller_call);
	}
}
if (isset($_GET['query'])) {
	$query_string =  urldecode(htmlspecialchars($_GET['query'], ENT_QUOTES));
	$query_string = explode('/',$query_string);

	$controller = $query_string[0];
	if(isset($query_string[1]) && $query_string[1] !=""){
		$action     = $query_string[1];
	}else{
		$action     = "index";
	}
	if(count($query_string > 2) && isset($query_string[2]) && $query_string[2] !=""){
		$query_string = array_slice($query_string,2);
		foreach($query_string as $val_qs){
			if($val_qs!=""){
				$parametor[] = $val_qs;
			}
		}
	}else{
		$parametor  = '';
	}
} else {
	$controller = Config::ROOT_PAGE;
	$action     = 'index';
	$parametor  = '';
}
call($controller, $action, $parametor);
*/
//Debug


$end = microtime(true);
$creationtime = ($end - $start);
function convert($size)
{
	$unit=array('b','kb','mb','gb','tb','pb');
	return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
printf("<hr>Page created in %.4f seconds.", $creationtime);
echo(" - Memory used : ".convert(memory_get_usage()));
//
?>