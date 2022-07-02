<?php

namespace components\button_icon_a;

use components\icon\icon;

class button_icon_a{
    private $id;
    private $texto = 'Icon Boton';
    private $icon = 'menu';
    private $style=null;
    private $class=array();
    private static $instance;
    public function __construct(){
        if (count(func_get_args()[0])){
            if ( is_string( func_get_args()[0][0] )){
                $this->texto = func_get_args()[0][0];
            }
        }
    }
    public static function in()
    {
        self::$instance = new self(func_get_args());
        return self::$instance;
    }

    public function setIcon($name){
        $this->icon = $name;
        return self::$instance;
    }

    public function build(){

        $b = array();
        $b[]= '<button type="button" data-modal-toggle="add-user-modal" class="w-1/2 text-white bg-blue-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">';
        $b[]= icon::in($this->icon)->setClass('-ml-1 mr-2 h-6 w-6')->build();
        $b[]= $this->texto;
        $b[]= '</button>';

        return implode('',$b);
    }

}
?>