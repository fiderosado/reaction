<?php

namespace components\accordion_tw;

use utils\components_tools;
use utils\utils;

class accordion_item_tw{
    const off = 0;
    private $id;
    private $class=array();
    private $style=array();
    private static $instance;
    private $body;
    private $tit;
    private $expanded;
    private $no;
    private $fatherId;
    private $isFlush = false;
    private $argumentos;
    private $acordionItemClass = array('accordion-item bg-white border border-gray-200');
    private $acordionHeaderClass = array('accordion-header mb-0');
    private $acordionButtonClass = array('accordion-button relative flex items-center w-full py-4 px-5 text-base texto-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none font-bold');
    private $acordionColapseClass = array('accordion-collapse collapse');
    private $acordionItemFlushClases = 'border-t-0 border-l-0 border-r-0 rounded-none';
    public static function in(){
        //if (!isset(self::$instance)) {
            self::$instance = new self(func_get_args());
       // }
        return self::$instance;
    }
    public function __construct(){
     //   $this->log(2);
        $this->argumentos = func_get_args()[0];
    }
    public function get_class(){
        return get_class();
    }
    public function typeflush($is=false){
        $this->isFlush = $is;
        return self::$instance;
    }
    private function work($args){
        $b=array();
        for($i = self::off ; $i < count($args); ++$i) {
            if (is_object($args[$i])){
                array_push($b , $args[$i]->build() );
            }elseif (is_string($args[$i])){
                array_push($b , $args[$i] );
            }
        }
        $this->body = implode(' ', $b);
    }
    public function setId($id){
      //  $this->log( $id );
        $this->id = $id;
        return self::$instance;
    }
    public function setStyle($s){
       /// $this->log( $s );
        if (is_array($s)){
            foreach ( $s as $k => $v) {
                array_push( $this->style , $k.':'.$v.';');
            }
        }
        return self::$instance;
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
    private function getTitle(){
        var_dump((empty($this->tit)) ? '' : ' id="'.$this->tit.'"' );
        return self::$instance;
    }
    private function getClass(){
        return (empty($this->class))? '' : ' class="'.implode(' ', $this->class).'"';
    }
    private function getStyle(){
        return (empty($this->style))? '' : ' style="'.implode(' ',$this->style).'"';
    }
    private function buildAcordionItem($title,$expanded=false ,$no,$acordionButtonClass ,$body,$fatherId ,$acordionColapseClass ,$acordionItemClass,$acordionHeaderClass){
        if ($expanded){
            array_push($acordionColapseClass , 'show');
        }else{
            array_push($acordionButtonClass,'collapsed');
        }
        if ($this->isFlush){
                array_push( $acordionItemClass , $this->acordionItemFlushClases );
        }
        $acordionItemClass = implode(' ', $acordionItemClass);
        $acordionHeaderClass = implode(' ', $acordionHeaderClass);
        $acordionButtonClass = implode(' ',$acordionButtonClass);
        $acordionColapseClass = implode(' ',$acordionColapseClass);
        $expanded = $expanded ? 'true' : 'false';
        $ac = '
    <div id="--->>" class="'.$acordionItemClass.'">
      <h2 class="'.$acordionHeaderClass.'" id="heading_'.$no.'">
        <button class="'.$acordionButtonClass.'" 
        type="button" data-bs-toggle="collapse"
        data-bs-target="#collapse_'.$no.'" aria-expanded="'.$expanded.'"
        aria-controls="collapse_'.$no.'">
          '.$title.'
        </button>
      </h2>
      <div id="collapse_'.$no.'" class="'.$acordionColapseClass.'" aria-labelledby="heading_'.$no.'" data-bs-parent="#accordion_'.$fatherId.'">
        <div class="accordion-body py-4 px-5">
          '.$body.'
        </div>
      </div>
    </div>';
        return $ac;
    }
    public function build(){
        $this->isFlush = func_get_args()[0];
        $cl = utils::load('css',get_class());
        $this->work($this->argumentos);
        $this->body = $this->buildAcordionItem(
            $this->tit,
            $this->expanded,
            $this->no,
            $this->acordionButtonClass,
            $this->body,
            $this->fatherId,
            $this->acordionColapseClass,
            $this->acordionItemClass,
            $this->acordionHeaderClass
        );
        return $this->body;
    }
    public function setTit($tit){
        $this->tit = $tit;
        return self::$instance;
    }
    public function setExpanded($expanded){
        $this->expanded = $expanded;
        return self::$instance;
    }
    public function setNo($no){
        $this->no = $no;
        return self::$instance;
    }
    public function setFatherId($fatherId)
    {
        $this->fatherId = $fatherId;
        return self::$instance;
    }




}
?>