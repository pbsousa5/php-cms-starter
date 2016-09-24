<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class App
{
	public $config;
	public $mod;
	public $db;
	function __construct($config)
	{
		global $config;
		$this->config = $config;
		if($this->config['db_connect']){
			require_once(ROOT.'/app/helpers/MysqliDb.php');
			$this->db = new MysqliDb(array(
				'host' => $this->config['db_host'],
				'username' => $this->config['db_user'], 
				'password' => $this->config['db_password'],
				'db'=> $this->config['db_name'],
				'charset' => 'utf8'
				));
		}else{
			$this->db = false;
		}
	}
	public function call(){
		if (isset($_GET['query'])) {
			$query_string =  urldecode(htmlspecialchars($_GET['query'], ENT_QUOTES));
			$query_string = explode('/',$query_string);

			$controller_call = $query_string[0];
			if(isset($query_string[1]) && $query_string[1] !=""){
				$action     = $query_string[1];
			}else{
				$action     = "index";
			}
			if(count($query_string > 2) && isset($query_string[2]) && $query_string[2] !=""){
				$query_string = array_slice($query_string,2);
				foreach($query_string as $val_qs){
					if($val_qs!=""){
						$parametor[] = $val_qs;
					}
				}
			}else{
				$parametor  = '';
			}
		} else {
			$controller_call = $this->config['main_controller'];
			$action     = 'index';
			$parametor  = '';
		}

		$controller_file = ROOT.'/app/controllers/' . ucfirst($controller_call) . '.php';
		$controller_error = ROOT.'/app/controllers/Error.php';
		if(file_exists($controller_file)){
			require_once($controller_file);
			$class = $controller_call;
			$controller = new $class($this);
			if(method_exists($controller,$action)){
				if(is_array($parametor)){
					call_user_func_array(array($controller,$action),$parametor);
				}else{
					$controller->{ $action }();
				}

			}else{
				require_once($controller_error);
				$controller = new error($this);
				$controller->index('404',$action);
			}
		}else{
			require_once($controller_error);
			$controller = new error($this);
			$controller->index('404',$controller_call);
		}

	}
	public function view($file_view,$value=''){
		$file = ROOT."/app/Views/".$file_view.".php";
		if(file_exists($file)){
			if(is_array($value)){
				extract($value);
			}
			require_once($file);
		}else{
			$status = "404";
			require_once(ROOT.'/app/views/error/index.php');
		}
	}

	public function helper($file){
		$file = ROOT."/app/helpers/".$file.".php";
		if(file_exists($file)){
			require_once($file);
		}else{
			$status = "404";
			require_once(ROOT.'/app/views/error/index.php');
		}
	}

	public function model($file){
		$file = ROOT."/app/models/".$file.".php";
		if(file_exists($file)){
			require_once($file);
		}else{
			$status = "404";
			require_once(ROOT.'/app/views/error/index.php');
		}
	}

}

?>