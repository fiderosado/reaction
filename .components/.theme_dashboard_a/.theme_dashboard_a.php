<?php

namespace components\theme_dashboard_a;

use components\breadcrumb_a\breadcrumb_a;
use components\hx\hx;
use components\icon\icon;
use components\session_tools_navbar_a\session_tools_navbar_a;
use components\table_userlist_a\table_userlist_a;
use components\toggle_sidebar_mobile_a\toggle_sidebar_mobile_a;
use components\toolbar_users_list_a\toolbar_users_list_a;
use components\toolbar_inbox_a\toolbar_inbox_a;
use components\view\view;
use components\aside\aside;
use components\container\container;
use components\main\main;
use components\navbar_thdashboard_a\navbar_thdashboard_a;
use components\text\text;
use components\menu_vert_alink_icon_a\menu_vert_alink_icon_a;
use components\bottom_toolbar_showingof_a\bottom_toolbar_showingof_a;
use components\pager_view\pager_view;
use components\table_inboxlist_a\table_inboxlist_a;
use components\bottom_inbox_info_a\bottom_inbox_info_a;

class theme_dashboard_a{
    private $id;
    private $type_avatar = array();
    private static $instance;
    public function __construct(){

    }
    public static function in(){
        self::$instance = new self(func_get_args());
        return self::$instance;
    }
    public function type()
    {
        if (count(func_get_args()) > 0) {
            $this->type_avatar = func_get_args()[0];
        }
        return self::$instance;
    }
    private function gettype($art, $t)
    {
        $r = false;
        foreach ($art as $i => $ti) {
            if ($ti === $t) {
                $r = true;
            }
        }
        return $r;
    }

    private function pagerView($p){
        switch ($p){
            case 'users':
                return main::in(
                       container::in(
                                    container::in(

                                        container::in(
                                            breadcrumb_a::in('home/users/list')
                                        )->setClass('mb-4'),

                                        container::in(
                                            hx::in('All users')->setX(1)->setClass('text-xl sm:text-2xl font-semibold text-gray-900 mr-6'),
                                            toolbar_users_list_a::in()
                                        )->setClass('sm:flex items-center')

                                    )->setClass('mb-1 w-full')
                                )->setId('breadcrumb-container')->setClass('p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5'),
                       container::in(
                                    container::in(
                                        container::in(
                                            container::in(
                                                table_userlist_a::in()
                                            )->setClass('shadow overflow-hidden')
                                        )->setClass('align-middle inline-block min-w-full')
                                    )->setClass('overflow-x-auto')
                                )->setClass('flex flex-col'),
                       container::in(
                                    bottom_toolbar_showingof_a::in( 2 , 100 )
                                )->setClass('bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4')
                       )->build();
            break;
            case 'inbox':
                return main::in(
                            toolbar_inbox_a::in(),
                            table_inboxlist_a::in(),
                            bottom_inbox_info_a::in( 0.200 , 1 )
                       )->build();
            break;
        }
    }

    public function build(){


        $theme = function (){

            $main = array(
                ["name"=>"Dashboard","href"=>"#", "current"=>"true", "icon"=>"template"] ,
                ["name"=>"Apps", "href"=> "#", "current"=> "false", "icon"=>"desktop-computer"],
                ["name"=>"Usuarios", "href"=> "#", "current"=> "false", "icon"=>"users"],
                ["name"=>"Mensajes", "href"=> "#", "current"=> "false", "icon"=>"inbox-in"],
            );
            $conf = array(
                ["name"=>"Notificaciones", "href"=> "#", "current"=> "false", "icon"=>"bell"],
                ["name"=>"API","href"=>"#", "current"=>"true", "icon"=>"cube-transparent"] ,
                ["name"=>"Configuracion", "href"=> "#", "current"=> "false", "icon"=>"adjustments"],
                ["name"=>"Cerrar sesion", "href"=> "#", "current"=> "false", "icon"=>"logout"],
                ["name"=>"Ayuda", "href"=> "#", "current"=> "false", "icon"=>"support"],
            );

            return view::in(
                 /* nav bar */
                navbar_thdashboard_a::in(
                    view::in(
                        container::in(
                            toggle_sidebar_mobile_a::in()
                                ->setId('toggleSidebarMobile')
                                ->setClass('texto-blue-600'),
                            text::in('SERPROTEAM')
                                ->setClass('font-bold w-full cursor-pointer px-2 py-2 texto-blue-600')
                        )->setClass('w-64 px-3 py-3 lg:px-5 lg:pl-3 flex items-center ')
                    )->forView('viewLeft'),

                    view::in(
                        session_tools_navbar_a::in()
                    )->forView('viewRigth')
                ),

                container::in(

                    aside::in(
                        container::in(
                            container::in(
                                container::in(

                                    menu_vert_alink_icon_a::in($main),

                                    menu_vert_alink_icon_a::in($conf)

                                )->setClass(['flex-1 px-3 bg-white divide-y space-y-1'])
                            )->setClass(['flex-1 flex flex-col pt-5 pb-4 overflow-y-auto'])
                        )->setClass(['relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0'])
                    )->setId('sidebar')
                        ->setClass(['fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75'])
                        ->setAdd(['aria-label="Sidebar"']),

                    container::in(

                        $this->pagerView('inbox')

                    )->setId('main-content')
                       ->setClass(['h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64'])

                )->setClass('flex overflow-hidden bg-white pt-16')

            )->build();

        };



        return $theme();

    }
}
?>