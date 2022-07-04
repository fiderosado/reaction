<?php

namespace components\navbar_thdashboard_a;
use components\icon\icon;
use components\session_tools_navbar_a\session_tools_navbar_a;

class navbar_thdashboard_a{

    private $id;
    private static $instance;

    private $navObjects = array();
    private $viewLeft = array();
    private $viewRigth = array();

    public function __construct(){
        if ( count(func_get_args())>0 ){
            if (is_array(func_get_args()[0])){
                $this->navObjects = func_get_args()[0];
            }
        }
    }
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function getViewLeft(){
        return implode('',$this->viewLeft);
    }
    public function getViewRigth(){
        return  implode('',$this->viewRigth);
    }

    public function build(){
        define("vLeft","viewLeft");
        define("vRight","viewRigth");
        if (!is_null($this->navObjects)){
            foreach ($this->navObjects as $i => $obj){
                if( is_object($obj)){
                    $v = $obj->getForview();
                    switch ( $v ){
                        case vLeft :
                             $this->viewLeft[] = $obj->build();
                            break;

                        case vRight :
                             $this->viewRigth[]= $obj->build();
                            break;
                    }
                }
            }
        }

        $body = '
<nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
            '.$this->getViewLeft().'
            </div>
            <div class="flex items-center">
            '.$this->getViewRigth().'
            </div>
        </div>
    </div>
</nav>';

        return $body;
    }
}

?>
