<?php

namespace components\view;

class view{

    const off = 0;
    private $style=null;
    private $id;
    private $class;
    private $resp;
    public static $instance;
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $c=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                // var_dump($args[$i]->build());
                array_push($c , $args[$i]->build() );
            }
        }
        $this->resp = implode('', $c );
    }
    public function build(){
        return ($this->resp);
    }
}
?>