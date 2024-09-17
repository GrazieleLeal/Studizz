@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('criaPergunta.update',$pergunta->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" id="pergunta" value="{{$pergunta->pergunta}}" >
                            </div>
                            <label for="exampleInputUsername1">Alternativa</label>
                            @foreach($alternativas as $alternativa)
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alternativa-{{ $alternativa->id }}" value="{{ $alternativa->descricao }}" >
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria_id" id="categoria" onchange="getSubcategorias(this.value)">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <select class="form-control" name="subcategoria_id" id="subcategoria">

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="nivel">Nível</label>
                                <select class="form-control" name="nivel" id="nivel">
                                    <option value="{{$pergunta->nivel}}" selected>{{ $pergunta->nivel == 1 ? 'Fácil' : ($pergunta->nivel == 2 ? 'Médio' : 'Difícil') }}</option>
                                    <option value="1">Fácil</option>
                                    <option value="2">Médio</option>
                                    <option value="3">Difícil</option>
                                </select>
                            </div>
                            <a class="btn btn-secondary mr2" href="{{route('criaPergunta.index')}}">Voltar</a>
                            <button type="submit" class="btn btn-primary mr2">Editar Pergunta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
@section('scripts')
<script>
    // Array de subcategorias
    var subcategorias = [
        @foreach($subcategorias as $subcategoria)
            { id: {{ $subcategoria->id }}, descricao: '{{ $subcategoria->descricao }}', categoria_id: {{ $subcategoria->categoria_id }} },
        @endforeach
    ];

    function getSubcategorias(categoria_id) {
        // Limpa o select da subcategoria
        $('#subcategoria').empty();

        // Popula o select da subcategoria com as subcategorias correspondentes à categoria selecionada
        $.each(subcategorias, function(index, subcategoria) {
            if (subcategoria.categoria_id == categoria_id) {
                $('#subcategoria').append('<option value="' + subcategoria.id + '">' + subcategoria.descricao + '</option>');
            }
        });
    }
</script>
@endsection
