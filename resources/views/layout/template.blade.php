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
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PVG5WWK');

    </script>
    <!-- End Google Tag Manager -->

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
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=453643279248109&ev=PageView&noscript=1" /></noscript>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVG5WWK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <navbar-component current="{{ Route::currentRouteName() }}" img-logo="{{ asset('img/navbar/logo.png') }}">
        </navbar-component>
        {{-- <whatsapp-component></whatsapp-component> --}}
        <backtop-component></backtop-component>
        <btnwhatsapp-component></btnwhatsapp-component>

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
