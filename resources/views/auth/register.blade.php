@extends('layouts.app')

@section('content')
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
                        <form id="formRegistro" class="pt-3" method="POST" action="{{ route('register') }}">
                            <!-- User -->
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-account-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input id="name" type="text" class="form-control form-control-lg border-left-0 @error('name') is-invalid @enderror" name="name" placeholder="User" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-email-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" name="password" placeholder="Senha" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirmar Senha -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control form-control-lg border-left-0" name="password_confirmation" placeholder="Confirme a senha" required autocomplete="new-password">
                                </div>
                            </div>
                            <input type="hidden" name="papel_id" id="papel_id" value="2">
                            <script>
                                // Função para obter parâmetros da URL
                                function getQueryParam(param) {
                                    const urlParams = new URLSearchParams(window.location.search);
                                    return urlParams.get(param);
                                }

                                // Define o valor de papel_id se estiver presente na URL
                                document.getElementById('papel_id').value = getQueryParam('papel_id') || '2';
                            </script>

                            <!-- Registro -->
                            <div class="mt-3">
                                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="{{route('index')}}">Registrar</a> -->
                                <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
<!--
                            <script>
                                document.getElementById('formRegistro').addEventListener('submit', function(event) {
                                    event.preventDefault();

                                    let formData = new FormData(this);

                                    fetch('/register', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            window.location.href = data.redirect_url;
                                        } else {
                                            // Exibir erros de validação
                                            console.log(data.errors);
                                        }
                                    })
                                    .catch(error => console.error('Erro:', error));
                                });
                            </script>
-->
                            <!-- Já tem uma conta -->
                            <div class="text-center mt-4 font-weight-light">
                                Já tem uma conta?
                                @if (Route::has('login'))
                                    <a class="text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
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
@endsection
