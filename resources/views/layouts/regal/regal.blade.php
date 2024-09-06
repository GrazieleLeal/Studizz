<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Studizz</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('css/regal/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/regal/feather.css')}}">
    <link rel="stylesheet" href="{{asset('css/regal/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('select2-bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/regal/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="https://i.postimg.cc/QdqPyYSf/logo.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('layouts.regal.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="display: flex; justify-content: center; align-items: center; width: 110%; margin-left: -5%;">
            <!-- partial:../../partials/_sidebar.html -->
            @yield('main')
            <!-- partial -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('js/regal/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('off-canvas.js')}}"></script>
    <script src="{{asset('hoverable-collapse.js')}}"></script>
    <script src="{{asset('template.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('select2.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('file-upload.js')}}"></script>
    <script src="{{asset('typeahead.js')}}"></script>
    <script src="{{asset('select2.js')}}"></script>



    <!-- End custom js for this page-->
    @yield('scripts')
</body>

</html>
