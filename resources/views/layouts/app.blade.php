<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        #lab_social_icon_footer {
            padding: 20px 0 0 10px  ;
            background-color: #dedede;
        }

        #lab_social_icon_footer a {
            color: #333;
        }

        #lab_social_icon_footer .social:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
        }

        #lab_social_icon_footer .social {
            -webkit-transform: scale(0.8);
            /* Browser Variations: */

            -moz-transform: scale(0.8);
            -o-transform: scale(0.8);
            -webkit-transition-duration: 0.5s;
            -moz-transition-duration: 0.5s;
            -o-transition-duration: 0.5s;
        }
        /*
            Multicoloured Hover Variations
        */

        #lab_social_icon_footer #social-fb:hover {
            color: #3B5998;
        }

        #lab_social_icon_footer #social-tw:hover {
            color: #4099FF;
        }

        #lab_social_icon_footer #social-gp:hover {
            color: #d34836;
        }

        #lab_social_icon_footer #social-em:hover {
            color: #f39c12;
        }

        /*#page-container {*/
        /*    position: relative;*/
        /*    min-height: 100vh;*/
        /*}*/

        /*#content-wrap {*/
        /*    padding-bottom: 2.5rem;    !* Footer height *!*/
        /*}*/

        /*#footer {*/
        /*    position: absolute;*/
        /*    bottom: 0;*/
        /*    width: 100%;*/
        /*    height: 2.5rem;            !* Footer height *!*/
        /*}*/

        html{ height:100%; }
        body{ min-height:100%; padding:0; margin:0; position:relative; }
        header{ height:50px; background:lightcyan; }
        footer{ background:PapayaWhip; }

        /* Trick: */
        body {
            position: relative;
        }

        body::after {
            content: '';
            display: block;
            height: 50px; /* Set same as footer's height */
        }

        footer {
            position: absolute;
            bottom: 70px;
            width: 100%;
            height: 50px;
        }

    </style>

</head>
<body>
<div id="page-container">
    <div id="content-wrap">
        <div id="app">
            @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
                @yield('content')
            </div>
            @include('inc.foot')
        </div>

    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    try{CKEDITOR.replace( 'article-ckeditor' )}catch (e) {

    }
</script>
</body>
</html>
