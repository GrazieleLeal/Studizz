@extends('layouts.oleez.oleez')
@section('main')
<div class="container">
    <h1 class="post-title wow fadeInUp">{{$categoria->descricao}}</h1>
    <div class="row">
        <div class="col-md-8 blog-post-wrapper">
            @if ($categoria->descricao == 'Biologia')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <p>Biologia é a ciência natural que estuda, descreve, preserva e melhora a vida e os organismos vivos. Apesar de sua complexidade, certos conceitos unificadores a consolidam em um campo único e coerente.</p>
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Química')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Física')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Matemática')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Português')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Inglês')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'História')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao == 'Geografia')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @elseif($categoria->descricao ==  'Sociologia')
                <div class="post-header wow fadeInUp">
                    <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                    <p class="post-date"></p>
                </div>
                <div class="post-content wow fadeInUp">
                    <blockquote class="blockquote wow fadeInUp nota">
                        <!-- Colocar uma descrição sobre a categoria -->
                    <blockquote>
                </div>
            @else
                <p>Categoria não existente</p>
            @endif
        </div>
        <div class="col-md-4">
            <form class="forms-sample" action="{{ route('quiz.store') }}" method="post">
                @csrf
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Subcategoria</h5>
                    <div class="widget-content d-flex justify-content-center">
                        {{--
                            <select class="select-state" name="state[]" multiple placeholder="Selecione as subcategorias" autocomplete="off" style="width:100%;">
                                @foreach($subcategoria as $subcategoria)
                                    <option value="{{ $subcategoria->id }}">{{$subcategoria->descricao}}</option>
                                @endforeach
                            </select>
                        --}}
                        <select class="select-state" name="subcategorias[]" multiple placeholder="Selecione as subcategorias" autocomplete="off" style="width:100%;">
                            @foreach($subcategoria as $subcategoria)
                                <option value="{{ $subcategoria->id }}">{{$subcategoria->descricao}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Nível</h5>
                        {{--
                            <select class="select-state" name="state[]" multiple placeholder="Selecione os níveis" autocomplete="off">
                                <option value="1">Fácil</option>
                                <option value="2">Médio</option>
                                <option value="3">Difícil</option>
                            </select>
                        --}}
                        <select class="select-state" name="niveis[]" multiple placeholder="Selecione os níveis" autocomplete="off">
                            <option value="1">Fácil</option>
                            <option value="2">Médio</option>
                            <option value="3">Difícil</option>
                        </select>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Número de perguntas</h5>
                        <select class="" id="select-beast" name="num_perguntas" placeholder="Select a person..." autocomplete="off" >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        {{--<a class="btn w-100" href="{{route('quiz')}}">Jogar</a>--}}
                        <button type="submit" id="jogar" class="btn">Jogar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    const selects = document.querySelectorAll('.select-state');

    selects.forEach((select) => {
        new TomSelect(select, {});
    });
</script> 

<script>
    new TomSelect("#select-beast", {
        sortField: {
            field: "text",
            direction: "desc"
        },
    });
</script>

@endsection
