<?php

namespace components\menu_vert_alink_icon_a;

use components\container\container;
use components\icon\icon;
use components\text\text;

class menu_vert_alink_icon_a{
    const off = 0;
    private $style=null;
    private $id;
    private $class=array();
    private $arrayMenu = array();
    public static $instance;
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        if (count(func_get_args()[0])){
            if (count(func_get_args()[0][0])){
                $this->arrayMenu = func_get_args()[0][0];
            }
        }

        return self::$instance;
    }
    public function build(){

        $m = array();

        if (!is_null($this->arrayMenu)){
            foreach ($this->arrayMenu as $i => $it ){
    /// target="_blank"
                 $m[] = '<a href="'.$it['href'].'" 
                           class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                            '.icon::in($it['icon'])->setClass(['w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75'])->build().'
                            <span class="ml-3">'.$it['name'].'</span>
                        </a>';
            }
        }

        $r = container::in( implode(' ', $m ) )->setClass(['space-y-2 pt-2'])->build();

        return $r ;

    }
}
/*<svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                      d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                      clip-rule="evenodd"></path>
                            </svg>*/
?>