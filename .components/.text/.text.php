<?php

namespace components\text;

class text{
    const off = 0;
    private $style=null;
    private $texto;
    private $id;
    private $class;
    public static $instance;
    public static function in(){
      //  $args = func_get_args(); // var_dump($args);
        self::$instance = new text(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $this->texto=$args[0];
        return self::$instance;
    }
    public function build(){
       return '<span'.$this->getId().$this->getClass().$this->getStyle().'>'.$this->texto.'</span>';
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
    private function getText(){
        return self::$texto;
    }
    public function setClass($cc){
        if (is_array($cc)){
            $this->class = implode(' ',$cc );
        }elseif (is_string($cc)){
            $this->class = $cc;
        }
        return self::$instance;
    }

    private function getId(){
        return (empty($this->id)) ? '' : ' id="'.$this->id.'"';
    }

    private function getClass(){
        return (empty($this->class))? '' : ' class="'.$this->class.'"';
    }

    private function getStyle(){
        return (empty($this->style))? '' : ' style="'.$this->style.'"';
    }

}
?>