<?php
    require ".autoload.php";

    use components\app\app;
    use components\head\head;
    use components\body\body;
    use components\header\header;
    use components\text\text;
    use components\container\container;
    use components\button_tw\button_tw;
    use components\accordion_tw\accordion_tw;
    use components\accordion_tw\accordion_item_tw;
    use components\avatar_tw\avatar_tw;
    use components\navbar_tw\navbar_tw;
    use components\navbar_twui\navbar_twui;
    use components\cta_seccion_tw\cta_seccion_tw;
    use components\login_tw_a\login_tw_a;
    use components\login_tw_b\login_tw_b;
    use components\register_imput_tw_a\register_imput_tw_a;
    use components\user_list_tw_a\user_list_tw_a;
    use components\dropzone_upload_tw_a\dropzone_upload_tw_a;
    use components\register_input_tw_b\register_input_tw_b;
    use components\pricing_plan_tw_a\pricing_plan_tw_a;
    use components\carucel_tw_a\carucel_tw_a;
    use components\stats_tw_a\stats_tw_a;
    use components\recent_news_tw_a\recent_news_tw_a;
    use components\contact_popup_widget_tw_a\contact_popup_widget_tw_a;

    include '.styles/stylesheets.php';

    $head = (object) [
        "metas"=>[
            "charset"=>"<meta charset=\"UTF-8\">",
            "viewport"=>'<meta name="viewport" content="width=device-width, initial-scale=1.0">'
        ],
        "stylesheet"=>[
            "tailwind"=>"css/tailw.style.min.css",
            "Font Awesome"=>"css/fa-all.css",
            "Font Awesome"=>"css/tailw.2.2.19.min.css"
        ],
        "scripts"=>[
            "tail.ui.script"=>'<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>'

        ]
    ];
    /*

 "Font Awesome"=>"css/tailw.ui.comp.css?id=36719b7475716ea2433ecd917ac839a9",

            "tail.ui.script"=>'<script defer src="https://unpkg.com/@alpinejs/collapse@3.10.2/dist/cdn.min.js"></script>',
            "tail.ui.script"=>'<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>'
      "tail.ui.script"=>'<script type="text/javascript" src="js/ailw.ui.inertia.js?id=dd3f614f34fa41b8e2382d2e6819a153"></script>',
            "tail.ui.script"=>'<script type="text/javascript" src="js/tailw.ui.prism.js?id=2ad3aef3e01491b7ef6557982d442aa4"></script>',
            "tail.ui.script"=>'<script type="text/javascript" src="js/tailw.ui.components.js?id=04b6e66ea653b6e4103cba0bd678003d"></script>',
     * */
    //            "tail.ui.script"=>'<script type="text/javascript" src="js/tail.ui.iframe.js?id=165e0af3d723efd6d5d88c7ff17ca86a"></script>'
//  "tailscript"=>'<script type="text/javascript" src="js/tail.min.js"></script>',
    // <script type="text/javascript" src="js/tail.min.js"></script>
// "boostrap"=>"css/bootstrap.min.css",

    $navigation = array(
        ["name"=>"Dashboard","href"=>"#", "current"=>"true"] ,
        ["name"=>"Team", "href"=> "#", "current"=> "false"],
        ["name"=>"Projects", "href"=> "#", "current"=> "false"],
        ["name"=> "Calendar", "href"=> "#", "current"=> "false" ]
    );


    $app = function() use ( $head , $stylesheet ) {
        app::in(
            head::in($head),
            body::in(

                navbar_twui::in(),

                stats_tw_a::in(),

                recent_news_tw_a::in(),

                /*login_tw_b::in(),*/

                /*login_tw_a::in(),*/

                /*container::in(
                    avatar_tw::in()
                        ->type(['shadow','content'])
                        ->setTitule('Fidel')
                        ->setDescription('Administrador')
                        ->setImgScr('img/avatars/2.webp')
                )->setClass(['box-content container-fluid w-full pt-5'])*/

                cta_seccion_tw::in(),
                /*register_imput_tw_a::in(),

                user_list_tw_a::in(),
                dropzone_upload_tw_a::in(),
                register_input_tw_b::in(),*/
               /* pricing_plan_tw_a::in(),*/
                /*carucel_tw_a::in(),*/

                contact_popup_widget_tw_a::in()



/*squared*/
                /*accordion_tw::in(

                    accordion_item_tw::in(

                        text::in('<strong>This is the third items accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. Its also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.'),

                        button_tw::in('NEXT')->rounded()->block()->setClass('mt-6')->larger()

                    )->setNo(1)->setId(1)->setTit('YOSLE')->setFatherId('ac1')->setExpanded(true),
                    accordion_item_tw::in(

                        text::in('<strong>This is the third items accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. Its also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.')

                    )->setNo(2)->setId(2)->setTit('FIDE')->setFatherId('ac1'),
                    accordion_item_tw::in(

                        text::in('<strong>This is the third items accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. Its also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.')

                    )->setNo(3)->setId(3)->setTit('RILO')->setFatherId('ac1')

                )->setId('ac1')*/

                /*button_tw::in()*/
                /*header::in(
                    container::in(
                        text::in('holaa'),
                        text::in('mundo'),
                        text::in('rilo')
                    )
                )->setStyle($stylesheet->miheader),
                header::in(
                    container::in(
                        text::in('kee'),
                        text::in('bolaa'),
                        text::in('fidelito')
                    )
                )*/
            )->setStyle(['background-color'=>'#FFF','padding'=>'0px','display'=>'flex','flex-direction'=>'column'])->setClass('text-center box-content container-fluid w-full')
        )->build();
    };

    $app();

?>