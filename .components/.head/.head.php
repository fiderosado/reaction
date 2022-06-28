<?php

namespace components\head;

class head{
    const off = 0;
    private static $style=null;
    private $text;
    private $id;
    private $class;
    private $metas = array();
    private $scrip = array();
    private $head = array();
    private $stylesheets = array();
    public static $instance;
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        $this->work($args);
    }
    private function work($args){
        for($i = self::off ; $i < count($args); ++$i) {
            foreach ( $args[$i] as $ty => $ar ){
                switch ($ty){
                    case 'metas':
                        foreach ($ar as $t => $m){
                            array_push($this->metas , $m);
                        }
                        array_push($this->head , implode(' ',  $this->metas) );
                        break;
                    case 'scripts':
                        foreach ($ar as $t => $s){
                            array_push($this->scrip , $s);
                        }
                        array_push($this->head , implode(' ', $this->scrip ) );
                        break;
                    case 'stylesheet':
                        foreach ($ar as $t => $m){
                            array_push($this->stylesheets , '<link href="'.$m.'" rel="stylesheet">');
                        }
                        array_push($this->head , implode(' ', $this->stylesheets ));
                        break;
                }
            }
        }
        array_unshift($this->head , '<head'.self::getId().''.self::getClass().''.self::getStyle().'>' );
        array_push($this->head , '</head>' );
    }
    public function build(){
        return implode('', $this->head );
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