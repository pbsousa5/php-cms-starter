<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class User extends App {
	public $app;
	public $user_mod;
	public $help;
	public function __construct($app) {
		$this->app = $app;
		$this->app->model('User_mod');
		$this->user_mod = new User_mod($app);

		$this->app->helper('Help');
		$this->help = new Help($this);
	}

	public function index(){
		$this->app->helper('PasswordHash');
		
	}

	public function login(){
		if($this->help->is_ajax()){
			$this->app->helper('PasswordHash');
			$hash = new PasswordHash(8,false);
			$username = $this->help->input('post','username');
			$password = $this->help->input('post','password');
			$data_login = $this->user_mod->login($username);
			if($data_login && $hash->CheckPassword($password,$data_login['password'])){
				$session = array(
					'status'=>true,
					'uid'=>$data_login['uid'],
					'username'=>$data_login['username']
					);
				$render_data['result'] = json_encode(array('status'=>true));
			}else{
				$render_data['result'] = json_encode(array('status'=>false));
			}
			$this->app->view('ajax_result',$render_data);
		}else{
			$render_data['memory_used'] = $this->help->memory_used();
			$this->app->config['site_title'] = "User Login";
			$this->app->view('header',$render_data);
			$this->app->view('login',$render_data);
			$this->app->view('footer',$render_data);
		}
		
	}
	
}
?>