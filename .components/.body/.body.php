<?php

namespace components\body;

class body{
    const off = 0;
    private $style=null;
    private $id;
    private $class;
    private $body = null;
    public static $instance;
    public static function in(){
        self::$instance = new body(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $this->work($args);
    }

    private function work($args){
        $b=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                array_push($b , $args[$i]->build() );
            }
        }
        $this->body = implode('', $b );
    }

    public function build(){
        return '<body'.$this->getId().$this->getClass().$this->getStyle().'>'.$this->body.'</body>';
    }

    public function setId($id){
        $this->$id = $id;
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