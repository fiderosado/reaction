<?php

namespace components\table_userlist_a;

class table_userlist_a{
    private $id;
    private static $instance;
    public function __construct(){

    }
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function build(){

        $tableKeys = array('name','rol','pais','status');

        $item = function ($a){
            $ai = array();
            foreach ($a as $i => $it){
                $ai[] =  '<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">'.$it.'</th>';
            }
            return implode('',$ai);
        };

        $head = function () use ($tableKeys, $item) {
            $t = array();
            $t[] = '<thead class="bg-gray-100"><tr>';
            $t[] = '<th scope="col" class="p-4">
                    <div class="flex items-center"><input id="checkbox-all" aria-describedby="checkbox-1"
                     type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                     <label for="checkbox-all" class="sr-only">checkbox</label></div></th>';
            $t[] = $item($tableKeys);
            $t[] = '<th scope="col" class="p-4">';
            $t[] = '</tr></thead>';
            return implode('',$t);
        };

        $JsonUserList = json_decode('
        {"userlist":[
            {"uid":"uid_1","name":"fidel remedios rosado","email":"fiderosado@gmail.com","rol":"administrador","pais":"cuba","resid":"Pinar del Rio","status":"active","image":"img/avatars/thomas-lean.png"},
            {"uid":"uid_2","name":"Yosle Acosta Hernandez","email":"yosledev@gmail.com","rol":"user","pais":"cuba","resid":"Pinar del Rio","status":"active","image":"img/avatars/michael-gough.png"},
            {"uid":"uid_3","name":"Raul remedios rosado","email":"raulrosado91@gmail.com","rol":"webmaster","pais":"cuba","resid":"Pinar del Rio","status":"active","image":"img/avatars/jese-leos.png"},
            {"uid":"uid_4","name":"Aurora rosado ruiz","email":"aurora.rosadoruiz@gmail.com","rol":"user","pais":"cuba","resid":"Pinar del Rio","status":"active","image":"img/avatars/bonnie-green.png"}
        ]}
        ');

        $tableItem = function ($uid, $uname,$uemail, $urol , $pais ,$res , $ustat,$image){
            $b=array();

            $b['start']='<tr class="hover:bg-gray-100">';
            $b['checkbox']='<td class="p-4 w-4"><div class="flex items-center"><input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded"><label for="checkbox-1" class="sr-only">checkbox</label></div></td>';

            $b['avatar']='
                  <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                  <img class="h-10 w-10 rounded-full capitalize " src="'.$image.'" alt="'.$uname.'">
                  <div class="text-sm font-normal text-gray-500">
                      <div class="text-base font-semibold text-gray-900 capitalize">'.$uname.'</div>
                      <div class="text-sm font-normal text-gray-500">
                        <a href="" class="__cf_email__" data-cfemail="">'.$uemail.'</a>
                      </div>
                  </div>
                  </td>';

            $b['userol']='<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 capitalize">'.$urol.'</td>';
            $b['pais']='<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 capitalize">
                        '.$pais.'
                        <div class="text-sm font-normal text-gray-500">
                            <span class="__cf_email__" data-cfemail="">'.$res.'</span>
                        </div>
                        </td>';
            $b['status']='<td class="p-4 whitespace-nowrap text-base font-normal text-gray-900"><div class="flex items-center"><div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2 capitalize"></div>'.$ustat.'</div></td>';

            $b['editor']='<td class="p-4 whitespace-nowrap space-x-2">
<button type="button" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 float-right text-center ml-4">
<svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>Delete</button>
<button type="button" data-modal-toggle="user-modal"class="text-white bg-blue-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center float-right ml-4"><svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>Edit</button></td>';

            $b['end']='</tr>';
            return implode('',$b);
        };

        $adapterItems = function ($arrayItems) use ($tableItem) {
            $it = array();
            if (!is_null($arrayItems)){
                if (is_object($arrayItems)){
                   // $userlist = $arrayItems->userlist;
                    foreach ($arrayItems as $ix => $p ){
                        foreach ($p as $sx => $o ) {
                            $it[] = $tableItem($o->uid , $o->name ,$o->email, $o->rol, $o->pais, $o->resid, $o->status, $o->image);
                        }
                    }
                }
            }
            return implode('',$it);
        };

        return '<table class="table-fixed min-w-full divide-y divide-gray-200">
                    '.$head().'
                    <tbody class="bg-white divide-y divide-gray-200">
                    '.$adapterItems($JsonUserList).'        
                    </tbody>
                </table>';
    }
}
?>