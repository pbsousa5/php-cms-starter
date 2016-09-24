<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
class Main_mod extends App{
	public $app;
	public function __construct($app) {
		$this->app = $app;
	}  

	public function hello($name){
		return 'From Model : '.$name.$this->app->config['base_url'];
	}      

}
?>