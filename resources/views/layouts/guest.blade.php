<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="{{asset('obs/img/favicon.png')}}" rel="icon">
        <link href="{{asset('obs/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <link href="{{asset('obs/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('obs/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">


        <link href="{{asset('obs/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('obs/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('obs/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        {{-- <link href="{{asset('obs/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> --}}

        <!-- Main CSS File -->
        <link href="{{asset('obs/css/main.css')}}" rel="stylesheet">
    </head>
    <body class="index-page">
        <header id="header" class="header sticky-top">
            <div class="topbar d-flex align-items-center">
                <div class="container d-flex justify-content-center justify-content-md-between">
                  <div class="d-none d-md-flex align-items-center">
                    <i class="bi bi-clock me-1"></i> 
                    {{__('Call us now +1 5589 55488 55')}}
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-phone me-1"></i> {{__('Senin - Sabtu, Jam 08:00 s/d 22:00 WIB')}}
                  </div>
                </div>
              </div>
        </header>
        <main class="main">
            <div class="col-12">
                {{$slot}}
                
            </div>
        </main>
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        {{-- <div id="preloader"></div> --}}

        <!-- Vendor JS Files -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
        {{-- <script src="{{asset('obs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
        <script src="{{asset('obs/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{asset('obs/vendor/aos/aos.js')}}"></script>
        <script src="{{asset('obs/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('obs/vendor/purecounter/purecounter_vanilla.js')}}"></script>
        {{-- <script src="{{asset('obs/vendor/swiper/swiper-bundle.min.js')}}"></script> --}}

        <!-- Main JS File -->
        <script src="{{asset('obs/js/main.js')}}"></script>
        
    </body>
</html>
