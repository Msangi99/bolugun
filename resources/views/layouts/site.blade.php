<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        >
        <link rel="stylesheet" href="https://builder.bootstrapmade.com/static/vendors/bootstrap/css/bootstrap.css?v=19">
        <link rel="stylesheet" href="https://builder.bootstrapmade.com/static/vendors/aos/aos.css?v=19">
        <link rel="stylesheet" href="https://builder.bootstrapmade.com/static/vendors/glightbox/css/glightbox.min.css?v=19">
        <link rel="stylesheet" href="https://builder.bootstrapmade.com/static/vendors/swiper/swiper-bundle.min.css?v=19">
        <link rel="stylesheet" href="https://builder.bootstrapmade.com/assets/css/builder.css?v=19">
        @vite(['resources/css/home.css'])
    </head>
    <body class="index-page" data-aos-easing="ease-in-out" data-aos-duration="600" data-aos-delay="0">
        @yield('content')

        <x-home.floating-whatsapp />

        <script src="https://builder.bootstrapmade.com/static/vendors/bootstrap/js/bootstrap.bundle.min.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/aos/aos.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/purecounter/purecounter_vanilla.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/imagesloaded/imagesloaded.pkgd.min.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/isotope-layout/isotope.pkgd.min.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/glightbox/js/glightbox.min.js?v=19"></script>
        <script src="https://builder.bootstrapmade.com/static/vendors/swiper/swiper-bundle.min.js?v=19"></script>
        @vite(['resources/js/constructify-page.js'])
    </body>
</html>
