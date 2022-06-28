<?php

namespace components\button_tw;
use utils\utils;
use utils\components_tools;

class button_tw{

    const off = 0;
    private $id;
    private $texto;
    private $class=array();
    private $style=array('min-width:105px');
    private $cc;
    private $disabled;
    private static $instance;
    private $enableRipple = false;
    private static $ripple = array('
    bg-blue-600 
    texto-white 
    hover:bg-blue-700 
    focus:bg-blue-700 
    active:bg-blue-800
    ');

    private $color;
    private $defclass = array('inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out texto-white');
    public static function in(){
    self::$instance = new button_tw(func_get_args());
        return self::$instance;
    }
    public function __construct(){
        $args = func_get_args()[0];
        if ( count($args) > 0){
            $this->texto = $args[0];
        }else{
            $this->texto = 'Boton';
        }
        $this->primary();
        return self::$instance;
    }
    private function colored($c){
        switch ($c){
            case 'danger':
                $this->color = 'red';
                array_push($this->class ,'bg-red-600 hover:bg-red-700 active:bg-red-800 focus:bg-red-700 texto-white');
                break;
            case 'primary':
                $this->color = 'blue';
                array_push($this->class ,'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 texto-white');
                break;
            case 'secundary':
                $this->color = 'purple';
                array_push($this->class ,'bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-purple-700 texto-white');
                break;
            case 'sucess':
                $this->color = 'green';
                array_push($this->class ,'bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-700 texto-white');
                break;
            case 'warning':
                $this->color = 'yellow';
                array_push($this->class ,'bg-yellow-500 focus:bg-yellow-600 active:bg-yellow-700 hover:bg-yellow-600 texto-white');
                break;
            case 'info':
                $this->color = 'blue';
                array_push($this->class ,'bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-600 texto-white');
                break;
            case 'light':
                $this->color = 'gray';
                array_push($this->class , 'bg-gray-200 texto-gray-700 focus:bg-gray-300 hover:bg-gray-300 active:bg-gray-400 texto-gray-700');
                break;
            case 'dark':
                $this->color = 'gray';
                array_push($this->class , 'bg-gray-800 texto-white hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900');
                break;
        }
    }
    public function rounded(){
        $this->class = components_tools::searchAndDel($this->class,array('rounded'));
        $this->setClass('rounded-full');
        return self::$instance;
    }
    public function small(){
        $this->class = components_tools::searchAndDel($this->class,array('px-','py-','font-','text-','leading-'));
        $this->setClass('px-4 py-1.5 font-medium text-xs leading-tight');
        return self::$instance;
    }
    public function medium(){
        $this->class = components_tools::searchAndDel($this->class,array('px-','py-','font-','text-','leading-'));
        $this->setClass('px-6 py-2.5 font-medium text-xs leading-tight');
        return self::$instance;
    }
    public function larger(){
        $this->class = components_tools::searchAndDel($this->class,array('px-','py-','font-','text-','leading-'));
        $this->setClass('px-7 py-3 font-medium text-sm leading-snug');
        return self::$instance;
    }
    public function block(){
        $this->class = components_tools::searchAndDel($this->class,array('mb-','w-full'));
        $this->setClass('mb-2 w-full');
        return self::$instance;
    }
    public function disable($d=false){
        if ($d){
            $this->disabled = $d;
            $this->class = components_tools::searchAndDel($this->class,array('pointer-events-','hover:','active:','focus'));
            $this->setClass('pointer-events-none opacity-60');
        }
        return self::$instance;
    }
    public function outline(){
        $this->class = components_tools::searchAndDel($this->class,array('bg-','texto-'));
        $x = function ($c){
            switch ($c){
                case 'yellow':
                        return '-yx';
                    break;
            }
        };
        $co = str_replace ( 'color', $this->color ,
            '
            border-2 
            texto-color'.$x($this->color).'
            active:texto-color'.$x($this->color).'
            bg-color'.$x($this->color).'
            active:bg-color'.$x($this->color).' 
            border-color'.$x($this->color).' 
            active:border-color'.$x($this->color).' 
            hover:bg-color'.$x($this->color).' 
            focus:bg-color'.$x($this->color).'
            hover:bg-opacity-5'
             );
        $this->setClass( $co );
        return self::$instance;
    }
    public function primary(){
        $this->setClass($this->defclass);
        $this->colored('primary');
        return self::$instance;
    }
    public function secundary(){
        $this->setClass($this->defclass);
        $this->colored('secundary');
        return self::$instance;
    }
    public function danger(){
        $this->setClass($this->defclass);
        $this->colored('danger');
        return self::$instance;
    }
    public function sucess(){
        $this->setClass($this->defclass);
        $this->colored('sucess');
        return self::$instance;
    }
    public function warning(){
        $this->setClass($this->defclass);
        $this->colored('warning');
        return self::$instance;
    }
    public function info(){
        $this->setClass($this->defclass);
        $this->colored('info');
        return self::$instance;
    }
    public function light(){
        $this->setClass($this->defclass);
        $this->colored('light');
        return self::$instance;
    }
    public function dark(){
        $this->setClass($this->defclass);
        $this->colored('dark');
        return self::$instance;
    }
    public function build(){
        $cl = utils::load('css',get_class());
        // $this->getRipple()
        return '<style>'.$cl.'</style>
        <button '.$this->getId().$this->getClass().$this->getStyle().' href="#" role="button" disabled >'.$this->texto.'</button>';
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
        }else{
            array_push( $this->style , $s);
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
    public function ripple( $en = false){
        $this->enableRipple = $en;
        return self::$instance;
    }
    private function getRipple(){
        return ( $this->enableRipple ) ? ' data-mdb-ripple="true" data-mdb-ripple-color="light"' : '';
    }

    private function getStyle(){
        return (empty($this->style))? '' : ' style="'.implode(' ',$this->style).'"';
    }
}