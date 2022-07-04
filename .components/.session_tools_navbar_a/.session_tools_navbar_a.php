<?php

namespace components\session_tools_navbar_a;

class session_tools_navbar_a{
    private $id;
    private static $instance;
    private $class = array();
    public function __construct(){

    }

    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }

    public function build(){
        return 'session_tools_navbar_a';
    }
}
?>