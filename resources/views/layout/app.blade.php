<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href=" {{ asset('css/app.css') }}">

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
    </style>

</head>
<body>
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
    @include('inc.foot')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor1' );
    </script>
</body>
</html>
