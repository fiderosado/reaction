<?php

namespace components\table_inboxlist_a;

use components\icon\icon;
use utils\components_tools;

class table_inboxlist_a{
    private $id;
    private static $instance;
    public function __construct(){

    }
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function build(){

        $JsonInvoxList = json_decode('
        {"invox":[
            {"uid":"uid_1","name":"fidel remedios rosado","email":"fiderosado@gmail.com","rol":"administrador","status":"active","image":"img/avatars/thomas-lean.png","short":"Am no an listening depending..","date":"17 April at 09.28 PM","readed":false , "favorite":false},
            {"uid":"uid_2","name":"Yosle Acosta Hernandez","email":"yosledev@gmail.com","rol":"user","status":"active","image":"img/avatars/michael-gough.png","short":"Am no an listening .","date":"17 April at 09.28 PM","readed":false , "favorite":true},
            {"uid":"uid_3","name":"Raul remedios rosado","email":"raulrosado91@gmail.com","rol":"webmaster","status":"active","image":"img/avatars/jese-leos.png","short":"Am no an listening ","date":"17 April at 09.28 PM" ,"readed":true , "favorite":false},
            {"uid":"uid_4","name":"Aurora rosado ruiz","email":"aurora.rosadoruiz@gmail.com","rol":"user","status":"active","image":"img/avatars/bonnie-green.png","short":"Am no an listening.","date":"17 April at 09.28 PM" , "readed":true , "favorite":true }
        ]}
        ');

        $itemMessage = function ($uid , $name , $email, $rol, $status, $image , $short , $date ,$readed , $favorite){

            $isreaded = function ($readed){
                if (!$readed){
                    return 'font-semibold texto-gray-900';
                }else{
                    return 'font-normal texto-gray-400';
                }
            };

            $isfav = function ($favorite){
                if ($favorite){
                    return 'texto-yellow-401 focus:texto-yellow-401';
                }else{
                    return 'texto-gray-300 focus:texto-gray-700';
                }
            };

            $a = array();
            $a['star']='<div class="hover:bg-gray-100 cursor-pointer items-center flex" style="" onclick="#">';

            $a['checkbox-star']='
            <div class="flex-none" style="max-width: 122px; ">
            <!-- space-x-1-->
            <!---->
                <div class="block w-full inline-flex items-center cursor-pointer" style="">
                    <div class="p-3">
                        <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                        class="bg-blue-500 cursor-pointer border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" onclick="">
                        <label for="checkbox-1" class="sr-only">checkbox</label>
                    </div>
                    <!---space-x-8 -->
                    <a href="#" class="hover:text-gray-900 cursor-pointer hover:bg-white rounded-full inline-flex items-center p-2 ">
                    '.components_tools::icon('star', $readed  )->setClass($isfav($readed))->build().'
                    </a>
                    <a href="#" class="hover:text-gray-900 cursor-pointer hover:bg-white rounded-full inline-flex items-center p-2 ">
                    '.components_tools::icon('bookmark', $favorite )->setClass($isfav($favorite))->build().'
                    </a>
                </div>

            </div>';

            $a['imagen-name'] = '
            <div class="flex items-center BHrWGjM1Iab_fAz0_91H space-x-4 px-2 truncate overflow-hidden flex-none w-64 " style="">
                <img class="h-7 w-7 rounded-full" src="'.$image.'" alt="'.$name.'">
                <div class="text-base capitalize '.$isreaded($readed).'">'.$name.'</div>
            </div>';
            /*max-w-sm*/
            $a['short-message']='<div class="text-base EaxKPe33bBy_Ky6mzblq truncate overflow-hidden flex-auto w-64 grow '.$isreaded($readed).'" 
            style="flex-grow: 2;">'.$short.'</div>';

            $a[]='<div class="BHrWGjM1Iab_fAz0_91H text-base px-4 flex-none truncate overflow-hidden '.$isreaded($readed).'" style=" flex-grow: 0;">'.$date.'</div>';

            $a[]='<div class="BHrWGjM1Iab_fAz0_91H text-base px-4 items-center flex-none" style="flex-grow: 0; ">
                  <a href="#" class="texto-gray-500 hover:text-gray-900 cursor-pointer p-1
                  hover:bg-gray-100 rounded inline-flex justify-center">
                  '.icon::in('trash')->build().'</a>
                  </div>';

            $a['end']='</div>';
            return implode('',$a);
        };

        $adapterItems = function ($arrayItems) use ($itemMessage) {
            $it = array();
            if (!is_null($arrayItems)){

                if (is_object($arrayItems)){
                    foreach ($arrayItems as $ix => $p ){
                        foreach ($p as $sx => $o ) {
$it[] = $itemMessage( $o->uid , $o->name , $o->email, $o->rol, $o->status, $o->image , $o->short , $o->date ,$o->readed , $o->favorite);

                        }
                    }
                }
            }else{
                $it[] = '<td>ERROR-JsonInvoxList</td>';
            }
            return implode('',$it);
        };

        return '<div class="bg-white min-w-full divide-y divide-gray-200" >
                    <div class="divide-y divide-gray-200">
                    '.$adapterItems($JsonInvoxList).'
                    </div>
                </div>';

        /*

          cellspacing="0" cellpadding="0" class="table-fixed min-w-full divide-y divide-gray-200" style="border-collapse: collapse"


         * */
    }
}
?>