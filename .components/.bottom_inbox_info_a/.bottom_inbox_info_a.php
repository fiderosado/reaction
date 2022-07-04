<?php

namespace components\bottom_inbox_info_a;

use components\container\container;
use components\icon\icon;
use components\text\text;

class bottom_inbox_info_a{
    private $id;
    private static $instance;
    private $used = 0, $max = 0;

    public function __construct($used, $max){
        $this->used = $used;
        $this->max = $max;
    }

    public static function in($used, $max){
        self::$instance = new self($used, $max);
        return self::$instance;
    }

    private function calc(){
        $porcentaje = ( $this->used * 100 ) / $this->max; // Regla de tres
        //$porcentaje = round($porcentaje, 0);  // Quitar los decimales
        return $porcentaje.'%';
    }

    public function build(){

        $storageInf = function (){
            return container::in(
                container::in(
                    text::in($this->used.'Kb of '.$this->max.'GB used')->setClass('font-medium texto-gray-500')
                ),
                container::in(
                    container::in()->setClass('bg-blue-500 h-2 rounded-full')->setStyle(["width"=>$this->calc()])
                )->setClass('w-full bg-gray-200 rounded-full h-2')

            )->setClass('w-full w-64 w-96')->build();
        };

        $lastConect = function (){
            return container::in(
                text::in('Last account activity: 2 hours ago'),
                icon::in('eye')->setClass('mx-2')
            )->setClass('flex items-center text-sm font-medium texto-gray-500 flex-none pl-6')->build();
        };

        $t = function () use ($storageInf, $lastConect) {
            return container::in(
                $storageInf(),
                $lastConect()
            )->setClass('bg-white sticky flex items-center w-full sm:justify-between 
            border-t border-gray-200 p-4 space-y-5')->build();
        };

        return $t( $this->used, $this->max );
    }
}
?>