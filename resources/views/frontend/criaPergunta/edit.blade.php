@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('criaPergunta.update',$pergunta->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" id="pergunta" value="{{$pergunta->pergunta}}" name="pergunta">
                                <div class="form-group">
                                    @if ($pergunta->imagem != null)
                                    <label for="pergunta">Imagem antiga</label>
                                    <img src="{{ asset('storage/imagem_pergunta/' . $pergunta->imagem) }}" alt="imagem categoria" class="testimonial-card-img mt-3 mb-3" style="display: block; margin: 0 auto; ">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagem">Adicione uma imagem</label>
                                <input type="file" class="form-control text-center center-block file-upload" name="imagem_pergunta" id="imagem_pergunta">
                            </div>

                            <label for="exampleInputUsername1">Alternativas</label>
                            @foreach ($alternativas as $index => $alternativa)
                                @if($index == 0)
                                    <!-- Alternativa correta -->
                                    <label for="exampleInputUsername1">Correta</label>
                                    <input type="text" name="alternativas[{{ $index }}][descricao]" class="form-control"  id="alternativaC" value="{{$alternativa->descricao}}" required>
                                    <div class="form-group">
                                        <input type="hidden" name="alternativas[{{ $index }}][correta]" value="1"> <!-- Alternativa correta -->
                                    </div>
                                @else
                                    <!-- Alternativa incorreta -->
                                    <label for="exampleInputUsername1">Incorreta</label>
                                    <input type="text" name="alternativas[{{ $index }}][descricao]" class="form-control"  id="alternativaE" value="{{$alternativa->descricao}}">
                                    <div class="form-group">
                                        <input type="hidden" name="alternativas[{{ $index }}][correta]" value="0"> <!-- Alternativa errada -->
                                    </div>
                                @endif
                            @endforeach

                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria_id" id="categoria" onchange="getSubcategorias(this.value)">
                                    <option value="{{ $categoriaSelecionada->id }}">{{ $categoriaSelecionada->categoria }}</option>
                                    @foreach($categorias as $categoria)
                                    @if ($categoria != $categoriaSelecionada)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endif
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

    // ID da subcategoria selecionada
    var subcategoriaSelecionadaId = {{ $subcategoriaSelecionada->id }};

    function getSubcategorias(categoria_id) {
        // Limpa o select da subcategoria
        var subcategoriaSelect = document.getElementById('subcategoria');
        subcategoriaSelect.innerHTML = ''; // Limpa as opções existentes

        // Popula o select da subcategoria com as subcategorias correspondentes à categoria selecionada
        subcategorias.forEach(function(subcategoria) {
            if (subcategoria.categoria_id == categoria_id) {
                var option = document.createElement('option');
                option.value = subcategoria.id;
                option.textContent = subcategoria.descricao;

                // Define a subcategoria selecionada
                if (subcategoria.id === subcategoriaSelecionadaId) {
                    option.selected = true; // Marca como selecionada
                }

                subcategoriaSelect.appendChild(option);
            }
        });
    }

    // Chama a função para preencher as subcategorias ao carregar a página
    document.addEventListener('DOMContentLoaded', function() {
        getSubcategorias({{ $categoriaSelecionada->id }});
    });
</script>
@endsection
