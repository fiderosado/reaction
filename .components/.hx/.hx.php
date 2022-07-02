<?php

namespace components\hx;

class hx{
    const off = 0;
    private $style=null;
    private $texto;
    private $id;
    private $x=1;
    private $class=array();
    public static $instance;
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $this->texto=$args[0];
        return self::$instance;
    }
    public function build(){
       return '<h'.$this->x.$this->getId().$this->getClass().$this->getStyle().'>'.$this->texto.'</h'.$this->x.'>';
    }
    public function setId($id){
        $this->id = $id;
        return self::$instance;
    }
    public function setX($x){
        $this->x = $x;
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
    private function getText(){
        return self::$texto;
    }
    public function setClass($cc){
        if (is_array($cc)){
            $this->class = array_merge($this->class , $cc );
        }elseif (is_string($cc)){
            array_push($this->class, $cc );
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

}
?>