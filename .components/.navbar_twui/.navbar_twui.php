<?php

namespace components\navbar_twui;

class navbar_twui{

    private $id;
    private $type_avatar=array();
    private static $instance;
    public function __construct(){

    }
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function type(){
        if ( count(func_get_args())>0 ){
            $this->type_avatar = func_get_args()[0];
        }
        return self::$instance;
    }
    private function gettype($art,$t){
        $r = false;
        foreach ($art as $i => $ti){
            if($ti === $t) {
                $r = true;
            }
        }
        return $r;
    }
    public function build(){
        $body ='<nav class="container flex justify-around py-8 mx-auto bg-white">
  <div class="flex items-center">
    <h3 class="text-2xl font-medium text-blue-500">LOGO</h3>
  </div>
  <!-- left header section -->
  <div class="items-center hidden space-x-8 lg:flex">
    <a href="">Home</a>
    <a href="">About Us</a>
    <a href="">Blogs</a>
    <a href="">Our Team</a>
    <a href="">Contact Us</a>
  </div>
  <!-- right header section -->
  <div class="flex items-center space-x-2">
    <button class="px-4 py-2 text-blue-100 bg-blue-800 rounded-md">
      Sign in
    </button>
    <button class="px-4 py-2 text-gray-200 bg-gray-400 rounded-md">
      Sign up
    </button>
  </div>
</nav>';

        return $body;
    }


}
?>