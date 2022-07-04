<?php

namespace utils;

use components\icon\icon;

class components_tools{

    public function log($v){
        switch ($v){
            case is_array($v): var_dump($v);
                break;
            case is_string($v): echo $v."<br>";
                break;
            case is_object($v): var_dump($v);
                break;
            case is_bool($v): var_dump($v);
                break;
            default: var_dump($v);
                break;
        }
    }

    public function __construct(){}
    public static function searchAndDel($st,$sa=array()){
        $ad = func_get_args();
        $are = array();
        $ak = explode(' ', ( is_array($st) )? implode( ' ', $st) : $st );
        foreach ($ak as $i => $d){
            if (!empty($d)){
                $is = function ($d) use ($sa) {
                    $o = false;
                    foreach ($sa as $j => $dh){
                        if ( is_int( stripos (  $d , $dh ) ) ) {
                            $o = ($o==false)? true : false;
                        }else{
                            $o = ($o==true)? true : false;
                        }
                    }
                    return $o;
                };
                if ( $is($d)==false ){
                    array_push($are , $d);
                }
            }
        }

        return $are;
    }

    public static function icon($name , $solid ){
        if ($solid){
            return icon::in($name.'-solid');
        }else{
            return icon::in($name);
        }
    }
}