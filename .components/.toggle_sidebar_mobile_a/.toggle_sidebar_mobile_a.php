<?php

namespace components\toggle_sidebar_mobile_a;

use components\icon\icon;

class toggle_sidebar_mobile_a{
    private $id;
    private static $instance;
    private $class = array('mr-2 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded');
    public function __construct(){}

    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function setClass($cc){
        if (is_array($cc)){
            $this->class = array_merge($this->class , $cc );
        }elseif (is_string($cc)){
            array_push($this->class, $cc );
        }
        return self::$instance;
    }
    public function setId($id){
        $this->id = $id;
        return self::$instance;
    }
    public function setText($d){
        $this->text = $d;
        return self::$instance;
    }
    public function setStyle($s){
        if (is_array($s)){
            foreach ( $s as $k => $v) {
                $this->style .= $k.':'.$v.';';
            }
        }
        return self::$instance;
    }
    private function getId(){
        return (empty($this->id)) ? '' : ' id="'.$this->id.'"';
    }

    private function getClass(){
        return (empty($this->class))? '' : ' class="'.implode(' ',$this->class).'"';
    }

    private function getStyle(){
        return (empty($this->style))? '' : ' style="'.$this->style.'"';
    }

    public function build(){
        /*lg:hidden*/
        return '<button'.$this->getId().$this->getClass().$this->getStyle().' aria-expanded="true" aria-controls="sidebar">
                    '.icon::in('view-grid')->setId('toggleSidebarMobileHamburger')->build().'
                    '.icon::in('x')->setId('toggleSidebarMobileClose')->setClass('hidden')->build().'
                </button>';
    }
}