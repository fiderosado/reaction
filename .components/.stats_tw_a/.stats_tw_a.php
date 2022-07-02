<?php

namespace components\stats_tw_a;


class stats_tw_a{
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
        $b='
<div class="py-6" style="">
<h1 class="xl:text-5xl md:text-4xl text-2xl font-semibold leading-tight text-center text-gray-800 sm:mb-0 mb-12">
            More Than 10 Years We Provide Service <br class="md:block hidden" />
            in Real State Industry
        </h1>
        <div class="md:mt-14 mt-4 relative sm:flex items-center justify-center">
            <img src="https://i.ibb.co/KjrPCyW/map.png" alt="world map image" class="w-full xl:h-full h-96 object-cover object-fill sm:block hidden" />
            <img src="https://i.ibb.co/SXKj9Mf/map-bg.png" alt="mobile-image" class="sm:hidden -mt-10 block w-full h-96 object-cover object-fill absolute z-0" />

            <div class="shadow-lg xl:p-6 p-4 sm:w-auto w-full bg-white sm:absolute relative z-20 sm:mt-0 mt-4 left-0 xl:ml-56 sm:ml-12 xl:-mt-40 sm:-mt-12">
                <p class="text-3xl font-semibold text-gray-800">20K+</p>
                <p class="text-base leading-4 xl:mt-4 mt-2 text-gray-600">Recently Property Listed</p>
            </div>
            <div class="shadow-lg xl:p-6 p-4 w-48 sm:w-auto w-full bg-white sm:absolute relative z-20 sm:mt-0 mt-4 xl:mt-80 sm:mt-56 xl:-ml-0 sm:-ml-12">
                <p class="text-3xl font-semibold text-gray-800">8K+</p>
                <p class="text-base leading-4 xl:mt-4 mt-2 text-gray-600">Active Listening</p>
            </div>
            <div class="shadow-lg xl:p-6 p-4 sm:w-auto w-full bg-white sm:absolute relative z-20 md:mt-0 sm:-mt-5 mt-4 right-0 xl:mr-56 sm:mr-24">
                <p class="text-3xl font-semibold text-gray-800">15K+</p>
                <p class="text-base leading-4 xl:mt-4 mt-2 text-gray-600">Recently Sold Lands</p>
            </div>
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        </div>
     </div>';
        return $b;
    }
}
?>