<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
namespace \app\controllers;
class Main {

	private $model;



	public function __construct(Model $model) {

		$this->model = $model;

	}

	public function index(){
		echo 'index';
	}

}
?>