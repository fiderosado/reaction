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

    include '.styles/stylesheets.php';

    $head = (object) [
        "metas"=>[
            "charset"=>"<meta charset=\"UTF-8\">",
            "viewport"=>'<meta name="viewport" content="width=device-width, initial-scale=1.0">'
        ],
        "stylesheet"=>[
            "tailwind"=>"css/tailw.style.min.css",
            "Font Awesome"=>"css/fa-all.css"
        ],
        "scripts"=>[
            "tailscript"=>'<script type="text/javascript" src="js/tail.min.js"></script>'
        ]
    ];

    // <script type="text/javascript" src="js/tail.min.js"></script>
// "boostrap"=>"css/bootstrap.min.css",

    $app = function() use ( $head , $stylesheet ) {
        app::in(
            head::in($head),
            body::in(

                avatar_tw::in()->type(['shadow','content'])
                    ->setTitule('Fidel')
                    ->setDescription('Administrador')
                    ->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')
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
            )->setStyle(['background-color'=>'#FFF','padding'=>'100px',])->setClass('text-center')
        )->build();
    };

    $app();

?>