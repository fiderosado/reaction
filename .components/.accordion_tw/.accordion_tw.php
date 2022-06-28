<?php

namespace components\accordion_tw;

use utils\components_tools;
use utils\utils;

class accordion_tw{
    const off = 0;
    private $id;
    private $class=array();
    private $style=array();
    private static $instance;
    private $acord = null;
    private $isFlush = array();
    private $argumentos;
    private $accordionClase = array('accordion');
    private $acordionFlushclases = 'accordion accordion-flush';
    const acordionItemClassName = 'components\accordion_tw\accordion_item_tw';
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $this->argumentos = func_get_args()[0];
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
                array_push( $this->style , $k.':'.$v.';');
            }
        }
        return self::$instance;
    }
    private function getText(){
        return self::$texto;
    }
    public function setClass($cc){
        if (is_array($cc)){
            $this->class =  array_merge( $this->class , $cc) ;
        }elseif (is_string($cc)){
            array_push($this->class , $cc)  ;
        }
        return self::$instance;
    }
    private function getId(){
        return (empty($this->id)) ? '' : ' id="'.$this->id.'"';
    }
    private function getClass(){
        return (empty($this->class))? '' : ' class="'.implode(' ', $this->class).'"';
    }
    private function getStyle(){
        return (empty($this->style))? '' : ' style="'.implode(' ',$this->style).'"';
    }
    public function get_class(){
        return get_class();
    }
    public function type($t){
        $this->isFlush = $t;
        return self::$instance;
    }
    private function work($args){
        $b=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                if( $args[$i]->get_class()===self::acordionItemClassName ){
                   $b[] = $args[$i]->build($this->isFlush);
                }else{
                   $b[] = $args[$i]->build();
                }
            }
        }
        $this->acord = implode('', $b );
    }
    public function build(){
        $cl = utils::load('css',get_class());

        if ($this->isFlush){
            $this->accordionClase = components_tools::searchAndDel($this->accordionClase , array('accordion'));
            array_push($this->accordionClase , $this->acordionFlushclases );
        }
        $this->work($this->argumentos);



        $this->accordionClase = implode(' ', $this->accordionClase);
        return '<style>'.$cl.'</style>
        <div class="p-4">
        <div class="'.$this->accordionClase.'" id="accordion_'.$this->id.'">
                '.$this->acord.'
        </div>
        <div>';
    }
}
?>