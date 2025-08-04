<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>@yield('title', 'Flash Deal')</title>

    <meta name="fo-verify" content="da6d308a-a1e5-42e7-9d3e-1bf483f1e85d" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('flashdeal/favicon.ico') }}" />

    {{-- <link href="https://flashdeales.com/css/materialdesignicons.min.css?v=1.1.5" rel="stylesheet" type="text/css"
        media="all" />
    <link href="https://flashdeales.com/css/pe-icon-7-stroke.css?v=1.1.5" rel="stylesheet" type="text/css"
        media="all" />
    <link href="https://flashdeales.com/css/flickity.min.css?v=1.1.5" rel="stylesheet" type="text/css" media="all" />
    <link href="https://flashdeales.com/css/font-awesome.min.css?v=1.1.5" rel="stylesheet" type="text/css"
        media="all" />
    <link href="https://flashdeales.com/css/app.css?v=1.1.5" rel="stylesheet" type="text/css" media="all" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flickity.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    @yield('styles')
    <style>
        span.tranding {
            height: 20px;
            width: 20px;
            display: inline-block;
            text-align: center;
            font-size: 10px;
            line-height: 24px;
            border-radius: 50%;
            background: #f55;
            color: #fff;
            position: absolute;
            left: 15px;
            top: 15px;
        }

        span.tranding i.fas.fa-bolt {
            font-size: 10px;
            top: -2px;
        }

        .p-title {
            font-size: 13px;
        }

        .ml-auto,
        .mx-auto {
            margin-left: auto !important;
        }
    </style>
</head>

<body class="">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/js/flickity.js') }}"></script>
    @yield('scripts')
</body>

</html>
