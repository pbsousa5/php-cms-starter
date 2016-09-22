<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class Main {

	public $text;



	public function __construct() {

	}  

	public function hello($name){
		return 'From Model : '.$name;
	}      

}
?>