@extends('layouts.oleez.oleez')
@section('main')
<div class="container">
    <h1 class="post-title wow fadeInUp">{{$categoria->categoria}}</h1>
    <div class="row">
        <div class="col-md-8 blog-post-wrapper">
            <div class="post-header wow fadeInUp">
                <img src="{{ asset('storage/imagem_categoria/'.$categoria->imagem) }}" alt="{{$categoria->categoria}}" class="post-featured-image" style="width:640px;height:360px;">
                <!--<p class="post-date"></p>-->
            </div>
            <br>
            <div class="post-content wow fadeInUp">
                <blockquote class="blockquote wow fadeInUp nota">
                    <p>{{$categoria->descricao}}</p>
                <blockquote>
            </div>
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
                            <option value="5">05</option>
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
            searchField: null,
            direction: "asc"
        },
        render:{
                no_results:null,
        }
    });
</script>


@endsection
