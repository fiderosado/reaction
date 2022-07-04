<?php
namespace components\bottom_toolbar_showingof_a;
class bottom_toolbar_showingof_a{
    private $id;
    private static $instance;
    private $max =0 , $step = 1 , $cant = 20;
    public function __construct($step , $max){
        $this->step = $step ;
        $this->max = $max;
    }
    private function steps(){
        $r = '';
        if ($this->step==1 and ($this->max > $this->cant)){
            $r = $this->step.'-'.$this->cant;
        }else{
            $r = ($this->step * $this->cant - $this->cant +1).'-'.($this->cant * $this->step +1);
        }
        if ( $this->step==1 and ($this->max < $this->cant) ){
            $r = ($this->step+1).'-'.($this->cant+1);
        }
        if( $this->max < $this->cant ){
            $r = $this->step.'-'.$this->max;
        }
        return $r;
    }

    public static function in($step , $max){
        self::$instance = new self($step , $max);
        return self::$instance;
    }

    public function build(){
        $b = '<div class="flex items-center mb-4 sm:mb-0">
                    <a href="#"
                       class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#"
                       class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500">
                    Showing <span class="text-gray-900 font-semibold">'.$this->steps().'</span> of <span
                            class="text-gray-900 font-semibold">'.$this->max.'</span></span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#"
                       class="flex-1 text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        <svg class="-ml-1 mr-1 h-5 w-5"
                        " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                        </svg>
                        Previous
                    </a>
                    <a href="#"
                       class="flex-1 text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Next
                        <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>';
        return $b;
    }

}