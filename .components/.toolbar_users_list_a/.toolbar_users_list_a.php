<?php

namespace components\toolbar_users_list_a;

use components\button_icon_a\button_icon_a;
use components\container\container;

class toolbar_users_list_a{
    private $id;
    private static $instance;
    public function __construct(){

    }

    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }

    public function build(){

        $ret = array();

        $busccontent = function (){

            $se = array();
            $form = '<form class="lg:pr-3" action="#" method="GET">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64 xl:w-96">
                        <input type="text" name="email" id="users-search" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" 
                        placeholder="Search for users"></div>
                     </form>';
            $se[] = container::in(
                $form
            )->setClass('hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0')->build();
            return implode(' ',$se);
        };

        $ret[]= $busccontent();

        $botcontent = function (){
            $ba = array();
            $ba[] = container::in(
                        button_icon_a::in('Agregar Usuario')->setIcon('plus'),
                        button_icon_a::in('Exportar')->setIcon('save-as')
                    )->setClass('flex items-center space-x-2 sm:space-x-3 ml-auto')->build();
            return implode(' ',$ba);
        };

        $ret[]= $botcontent();

        return implode(' ',$ret);
    }

}
?>