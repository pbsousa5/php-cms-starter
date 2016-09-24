<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
class User_mod extends App{
	public $app;
	public $db;
	public function __construct($app) {
		$this->app = $app;
		$this->app->helper('MysqliDb');
		$this->db = new MysqliDb(Array (
			'host' => $this->app->config['db_host'],
			'username' => $this->app->config['db_user'], 
			'password' => $this->app->config['db_password'],
			'db'=> $this->app->config['db_name'],
			'charset' => 'utf8'));
	}  

	public function login($username){
		$this->db->where('username',$username);
		return $this->db->getOne('users','uid,username,password');
	}      

}
?>