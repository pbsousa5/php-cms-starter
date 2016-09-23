<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
// require_once(ROOT.'/app/helpers/system.php');
class Main extends System {
	public function __construct() {

	}

	public function index(){
		echo 'index';

	}
	public function hello($a='',$b='',$c='',$d=''){
		echo 'hello : '. $a.' | '.$b.' | '.$c.' | '.$d;
	}

}
?>