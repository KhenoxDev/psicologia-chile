<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @toastr_css
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-470819153"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-470819153');
    </script>

    <!-- Facebook Tag Manager -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '453643279248109');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=453643279248109&ev=PageView&noscript=1" /></noscript>
</head>

<body>
    <div id="app">
        <navbar-component current="{{ Route::currentRouteName() }}" img-logo="{{ asset('img/navbar/logo.png') }}">
        </navbar-component>
        <whatsapp-component></whatsapp-component>
        <backtop-component></backtop-component>

        @yield('content')

        <footer-component url-base="{{ env('APP_URL') }}"></footer-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function() {
            $('html').animate({
                scrollTop: 0
            }, 'slow'); // para IE, FF
            $('body').animate({
                scrollTop: 0
            }, 'slow'); // Para Chrome

            $(window).load(function() {
                $('html').animate({
                    scrollTop: 0
                }, 'slow'); // para IE, FF
                $('body').animate({
                    scrollTop: 0
                }, 'slow'); // Para Chrome
            });
        });
    </script>
</body>

</html>