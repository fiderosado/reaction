<?php

namespace components\breadcrumb_a;

use components\icon\icon;

class breadcrumb_a{

    private $id;
    private $route;
    private $style=null;
    private $class=array();
    private static $instance;
    public function __construct(){
        if (count(func_get_args()[0])){
            if ( is_string( func_get_args()[0][0] )){
                $this->route = func_get_args()[0][0];
            }
        }
    }
    public static function in()
    {
        self::$instance = new self(func_get_args());
        return self::$instance;
    }

    public function build(){

        $menus = function ($ruta){
            $ruta = explode('/',$ruta);
            $a = array();
            $icon_class = ['w-5 h-5 mr-2.5'];

            $a[] = '<ol class="inline-flex items-center space-x-1 md:space-x-2">';
            foreach ($ruta as $i => $g){
                if ($i==0){
                    $icon = icon::in('home')->setClass($icon_class)->build();
                }else{
                    $icon = icon::in('chevron-right')->setClass($icon_class)->build();
                }
                $a[] = '<li class="inline-flex items-center">
                                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">                                       
                                       ' . $icon . $g . '
                                    </a>
                                </li>';
            }
            $a[] = '</ol>';

            return implode(' ', $a);

        };

        $nav = function ($m){
            $n = array();
            $n[] = '<nav class="flex mb-5" aria-label="Breadcrumb">';
            $n[] =  $m;
            $n[] = '</nav>';
            return implode('',$n);
        };

        return $nav( $menus( $this->route ) );

    }

}