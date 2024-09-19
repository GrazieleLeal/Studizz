<header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" style="width: 10%;" href="index.html"><img src="https://i.postimg.cc/QdqPyYSf/logo.png" class="imagem" style="width: 45%;" alt="Oleez"></a>

        <ul class="nav nav-actions d-lg-none ml-auto" style="width: 18%; margin-top: 2%;">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                <a
                    href="{{ route('perfil.show', auth()->user()->id) }}"
                    class="nav-text"
                >
                    Perfil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="border: none;background-color: white;display: inline;" class="nav-text">Desconectar</button>
                </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="nav-text"
                    >
                        Entrar
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="nav-text"
                        >
                            Registrar
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
        </ul>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav" aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="width: 40%;" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0 " style="width: 60%; ">
                <li class="nav-item texto-preto ">
                    <a class="texto-preto " id="inicio " href="{{route('admin')}}">Início <span class="sr-only ">(current)</span></a>
                </li>
                <li class="nav-item texto-preto ">
                    <a class="texto-preto " href="{{route('aprova.index')}}">Perguntas</a>
                </li>
                <li class="nav-item texto-preto ">
                    <a class="texto-preto " href="{{route('revisaA.index')}}">Aprovadas</a>
                </li>
                <li class="nav-item texto-preto ">
                    <a class="texto-preto com-margin" href="{{route('revisaR.index')}}">Reprovadas</a>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ route('perfil.show', auth()->user()->id) }}"
                        class="nav-text"
                    >
                        Perfil
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="border: none;background-color: white;display: inline;" class="nav-text">Desconectar</button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="nav-text"
                    >
                        Entrar
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="nav-text"
                        >
                            Registrar
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
            </ul>
        </div>
    </nav>
</header>
