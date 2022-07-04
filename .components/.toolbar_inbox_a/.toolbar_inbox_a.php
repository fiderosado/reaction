<?php

namespace components\toolbar_inbox_a;

use components\button_icon_a\button_icon_a;
use components\container\container;
use components\icon\icon;
use components\text\text;
use components\view\view;

class toolbar_inbox_a{
    private $id;
    private static $instance;
    public function __construct(){

    }

    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }

    public function build(){

        $contLeft = function (){
            return  container::in(/*contenedor principal*/

                        container::in(/*contenedor left*/

                            container::in(/*check box*/
                                       '<input id="checkbox-all" 
                                        aria-describedby="checkbox-1" type="checkbox"
                                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 m-2 rounded">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>'
                            )->setClass('p-1'),

                            container::in(/*botones iconos*/
                                '<a href="#" class="texto-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center"> '.icon::in('trash')->setClass('w-6 h6')->build().'</a><a href="#" class="texto-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">'.icon::in('archive')->setClass('w-6 h6')->build().' </a><a href="#" class="texto-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">'.icon::in('exclamation-circle')->setClass('w-6 h6')->build().' </a>  <a href="#" class="texto-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">'.icon::in('dots-vertical')->setClass('w-6 h6')->build().'</a>'
                            )->setClass('flex space-x-2 px-0 px-2'),

                            container::in('<a href="#" class="flex-1 text-white bg-blue-600 hover:bg-gray-700 
focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 pr-5 mx-4 text-center">
                                          '.icon::in('plus')->setClass('-ml-1 mr-1 h-5 w-5')->build().' Compose </a>'
                            )->setClass('')/*boton compose*/
                        )->setClass('flex items-center divide-x divide-gray-200 py-2'),

                        container::in(/*contenedor derecho*/

                            view::in('<a href="#" class=" text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center "><svg class="" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg></a>'),
                            text::in(
                               'Show'.
                               text::in('1-25')->setClass('text-gray-900  font-semibold')->build().' of '.
                               text::in('200')->setClass('text-gray-900  font-semibold')->build()
                            )->setClass('sm:text-sm VS_eC9rMc1VfvC_eyACU font-normal text-gray-500')

                        )->setClass('flex items-center space-y-5 divide-x divide-gray-200 py-2 sm:space-x-3')
/*lg:mt-1.5*/
                    )->setClass('py-2 bg-white block sm:flex items-center justify-between border-b border-gray-200 ')->build();
        };

        return $contLeft();
    }

}
?>