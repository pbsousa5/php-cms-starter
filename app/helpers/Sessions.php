<?php
class Sessions {

    protected $sessionID;

    public function __construct(){
        if( !isset($_SESSION) ){
            $this->init_session();
        }
    }

    public function init_session(){
        session_start();
    }

    public function set_session_id(){
        $this->sessionID = session_id();
    }

    public function get_id(){
        return session_id();
    }

    public function has($session_name){
       return isset($_SESSION[$session_name]);
    }

    public function update( $session_name , $is_array = false ){
        if( !isset($_SESSION[$session_name])  ){
            if( $is_array == true ){
                $_SESSION[$session_name] = array();
            }
            else{
                $_SESSION[$session_name] = '';
            }
        }
    }

    public function insert( $session_name , array $data ){
        if( is_array($_SESSION[$session_name]) ){
            array_push( $_SESSION[$session_name], $data );
        }
    }

    public function debug( $session_name ){
        echo '<pre>';print_r($_SESSION[$session_name]);echo '</pre>';
    }

    public function delete( $session_name = '' ){
        if( !empty($session_name) ){
            unset( $_SESSION[$session_name] );
        }
        else{
            unset($_SESSION);
        }
    }

    public function get( $session_name ){
        return $_SESSION[$session_name];
    }

    public function set( $session_name , $data ){
        $_SESSION[$session_name] = $data;
    }

}
?>