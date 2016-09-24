<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class Help extends App
{
	public $app;
	function __construct($app)
	{
		$this->app = $app;
	}

	public function session($name,$action){
		switch ($action) {
			case 'set':

			break;
			case 'get':

			break;
			case 'delete':

			break;
			default:
			return false;
		}
	}

	public function cookie($value=array(),$action){

	}

	public function is_ajax(){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}else{
			return false;
		}
	}

	public function input($type,$name){
		switch ($type) {
			case 'post':
			$input = $_POST[$name];
			break;
			default:
			$input = $_GET[$name];
			break;
		}
		if(isset($input) && $input !="" && $input !=null){
			return urldecode(htmlspecialchars($input, ENT_QUOTES));
		}else{
			return flase;
		}
	}
	public function memory_used()
	{
		$size =memory_get_usage();
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
}
?>