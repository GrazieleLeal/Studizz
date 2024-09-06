<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studizz</title>
    <link rel="stylesheet" href="{{asset('css/oleez/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/oleez/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/oleez/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/oleez/style.css')}}">
    <script src="{{asset('js/oleez/jquery.min.js')}}"></script>
    <script src="{{asset('js/oleez/loader.js')}}"></script>
    <link rel="shortcut icon" href="https://i.postimg.cc/QdqPyYSf/logo.png">

</head>

<body>
    <div class="oleez-loader "></div>
    @include('layouts.admin.header')

    <main>
        @yield('main')
    </main>

    @include('layouts.oleez.footer')

    <!-- Full screen search box -->
    <div id="searchModal " class="search-modal ">
        <button type="button " class="close " aria-label="Close " data-dismiss="searchModal ">
            <span aria-hidden="true ">&times;</span>
        </button>
        <form action="index.html " method="get " class="oleez-overlay-search-form ">
            <label for="search " class="sr-only ">Search</label>
            <input type="search " class="oleez-overlay-search-input " id="search " name="search " placeholder="Search here ">
        </form>
    </div>
    <script src="{{asset('js/oleez/popper.min.js')}}"></script>
    <script src="{{asset('js/oleez/wow.min.js')}}"></script>
    <script src="{{asset('js/oleez/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/oleez/slick.min.js')}}"></script>
    <script src="{{asset('js/oleez/main.js')}}"></script>
    <script src="{{asset('js/oleez/landing.js')}}"></script>
    <script>
        new WOW({
            mobile: false
        }).init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')
</body>


</html>
