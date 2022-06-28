<?php
namespace components\app;
class app{

    const off = 0;
    private $style=null;
    private $id;
    private $class;
    private $ap;
    public static $instance;

    public static function in(){
        self::$instance = new app(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
       // var_dump($args);
        $this->work($args);
    }

    private function work($args){
        $aa=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                array_push( $aa, $args[$i]->build() );
            }
        }
        $this->ap = implode('',  $aa );
    }

    public function build(){
        print '<html'.$this->getId().$this->getClass().$this->getStyle().'>'.$this->ap.'</html>';
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

}
?>