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
    use components\theme_dashboard_a\theme_dashboard_a;

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

    $app = function() use ( $head , $stylesheet ) {
        app::in(
            head::in($head),
            body::in(
                theme_dashboard_a::in()
            )->setClass(['bg-gray-50'])
        )->build();
    };

    $app();

?>