<?php

namespace components\view;

class view{

    const off = 0;
    private $style=null;
    private $id;
    private $class;
    private $resp;
    public static $instance;
    private $forview ;

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

    public function getForview(){
        return $this->forview;
    }

    public function forView(){
        if(func_get_args()>0){
            if ( !empty(func_get_args()[0]) and !is_null(func_get_args()[0])){
                $this->forview = func_get_args()[0];
               // var_dump($this->forview);
            }
        }
        return self::$instance;
    }

    public function build(){
        return ($this->resp);
    }
}
?>