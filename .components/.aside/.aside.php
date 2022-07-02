<?php

namespace components\aside;

class aside{

    const off = 0;
    private $style=null;
    private $id;
    private $class;
    private $add;
    private $resp;
    public static $instance;
    public static function in(){
        self::$instance = new aside(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $c=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                // var_dump($args[$i]->build());
                array_push($c , $args[$i]->build() );
            }
        }
        $this->resp = implode('', $c );
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setStyle($s){
        if (is_array($s)){
            foreach ( $s as $k => $v) {
                $this->style .= $k.':'.$v.';';
            }
        }
        return $this;
    }

    public function setClass($class){
        if (is_array($class)){
            $this->class = implode(' ',$class );
        }elseif (is_string($class)){
            $this->class = $class;
        }
        return $this;
    }

    public function setAdd($add){
        if (is_array($add)){
            $this->add = implode(' ',$add );
        }elseif (is_string($add)){
            $this->add = $add;
        }
        return $this;
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

    public function build(){
        return ('<aside '.$this->getId().$this->getClass().$this->getStyle().$this->getAdd().'>'.$this->resp.'</aside >');
    }

    private function getAdd(){
        return (empty($this->add))? '' : ' '.$this->add.' ';
    }

}
?>