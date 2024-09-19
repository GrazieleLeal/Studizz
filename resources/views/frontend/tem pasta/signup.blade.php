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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/regal/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="https://i.postimg.cc/QdqPyYSf/logo.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="https://i.postimg.cc/QdqPyYSf/logo.png" alt="logo">
                            </div>
                            <h4>Novo aqui?</h4>
                            <h6 class="font-weight-light">Se junte a nós!</h6>
                            <form class="pt-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" placeholder="User">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-email-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg border-left-0" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../../../urbanui-oleez/index.html">Registrar</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Já tem uma conta? <a href="{{route('entrar')}}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 register-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020 All rights reserved.</p>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('js/regal/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('js/regal/off-canvas.js')}}"></script>
    <script src="{{asset('js/regal/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/regal/template.js')}}"></script>
    <!-- endinject -->
</body>

</html>