<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
class Error extends App{
	public $app;
	public function __construct($app) {
		$this->app = $app;
	}
	public function index($status,$file){
		require_once(ROOT.'/app/views/error/index.php');
	}

}
?>