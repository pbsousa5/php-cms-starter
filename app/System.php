<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}

class System
{
	public $config;
	function __construct($config)
	{
		global $config;
		$this->config = $config;
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

		$controller_file = ROOT.'/app/controllers/' . $controller_call . '.php';
		$controller_error = ROOT.'/app/controllers/error.php';
		if(file_exists($controller_file)){
			require_once($controller_file);
			$class = $controller_call;
			$controller = new $class();
			if(method_exists($controller,$action)){
				if(is_array($parametor)){
					call_user_func_array(array($controller,$action),$parametor);
				}else{
					$controller->{ $action }();
				}

			}else{
				require_once($controller_error);
				$controller = new error();
				$controller->index('404',$action);
			}
		}else{
			require_once($controller_error);
			$controller = new error();
			$controller->index('404',$controller_call);
		}

	}
	private function _autoload(){

	}
}

?>