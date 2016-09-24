<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class Main extends App {
	public $app;
	public $main_mod;
	public function __construct($app) {
		$this->app = $app;
		$this->app->model('Main_mod');
		$this->main_mod = new Main_mod($app);
	}

	public function index($a=''){
		$this->app->helper('PasswordHash');
		$a = $this->main_mod->hello($a);
		$this->app->view('main',array('a'=>$a));
	}
	public function hello($a='',$b='',$c='',$d=''){
		echo 'hello : '. $a.' | '.$b.' | '.$c.' | '.$d;
	}

}
?>