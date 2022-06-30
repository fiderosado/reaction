<?php

namespace components\avatar_tw;
use utils\components_tools;
class avatar_tw{
    private $id;
    private $type_avatar=array();
    private $image_src='img/2.webp',
        $image_class=array('rounded-full w-32 cursor-pointer'),
        $image_altext,
        $cont=array(),
        $image_text_tit_content='Nombre',
        $image_text_desc_content='Descripción';
    private $basic = false,$squared= false,$shadow= false,$content= false;
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

    public function setTitule(){
        $this->image_text_tit_content = func_get_args()[0];
        return self::$instance;
    }

    public function setDescription(){
        $this->image_text_desc_content = func_get_args()[0];
        return self::$instance;
    }

    public function setImgScr(){
        $this->image_src = func_get_args()[0];
        return self::$instance;
    }

    public function build(){
        $this->basic = $this->gettype($this->type_avatar,'basic');
        $this->squared = $this->gettype($this->type_avatar,'squared');
        $this->shadow = $this->gettype($this->type_avatar,'shadow');
        $this->content = $this->gettype($this->type_avatar,'content');
        if ($this->basic && $this->squared) {
            echo "error-Avatar: Solo puedes seleccionar [Basic / Squared] en las propiedades.";
        }else{
            if ($this->squared){
                $this->image_class = components_tools::searchAndDel($this->image_class,['rounded-']);
                $this->image_class[] = 'rounded-lg';
            }
        }
        if ($this->shadow){
            // agrego el estilo sombra a la clase de la imagen
            $this->image_class[] = 'shadow-xl';
        }
        if ($this->content){
            // agrego los elementos de titulo descripcion debjo de la imagen
            $this->cont[] = '<h5 class="text-xl font-medium leading-tight mb-1 b mt-4 cursor-pointer">'.$this->image_text_tit_content.'</h5><p class="texto-gray-500  cursor-pointer">'.$this->image_text_desc_content.'</p>';
        }
        $body = '<div class="text-center inline-block"><img src="'.$this->image_src.'" class="'.implode(' ',$this->image_class).'" alt="'.$this->image_altext.'" />'.implode(' ',$this->cont).'</div>';
        return $body;
    }
}

?>