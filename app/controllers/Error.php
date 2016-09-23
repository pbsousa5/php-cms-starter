<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
class Error {
	public function __construct() {

	}
	public function index($status,$file){
		require_once(ROOT.'/app/views/error/index.php');
	}

}
?>