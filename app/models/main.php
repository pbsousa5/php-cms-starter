<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
require_once(ROOT.'/app/helpers/system.php');
class Main_mod {

	public $text;
	public function __construct() {

	}  

	public function hello($name){
		return 'From Model : '.$name;
	}      

}
?>