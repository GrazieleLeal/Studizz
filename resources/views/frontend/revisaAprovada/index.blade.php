@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <select class="form-control" name="categoria_id" id="categoria" onchange="getPerguntas(this.value)">
                                            <option value=""></option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <h4 class="card-title">Perguntas aprovadas</h4>
                                    <div class="table-responsive">
                                        <table class="table" id="tabela-perguntas">
                                            <thead>
                                                <tr>
                                                    <th>Pergunta</th>
                                                    <th>Nº alternativas</th>
                                                    <th>Data de criação</th>
                                                    <th><!--Aqui é o ver pergunta--></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                    @if ($value->aprovada === 1)
                                                        @php
                                                            $value->load('pergunta_subcategoria.subcategoria.categoria');
                                                        @endphp
                                                        <tr class="pergunta-{{ $value->pergunta_subcategoria->first()->subcategoria->categoria->id }}">
                                                            <td>{{ \Str::limit($value->pergunta, 100) }}</td>
                                                            <td>{{ $value->alternativa->count() }}</td>
                                                            <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                                            <td>
                                                                <a class="btn btn-primary" href="{{ route('revisaA.edit',$value->id) }}">Pergunta</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="form-group mt-5">
                                            <a href="{{route('aprova.index')}}" class="btn btn-secondary font-weight-bold">Voltar</a>
                                        </div>
                                    </div>
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
    // Função para filtrar perguntas por categoria
    function getPerguntas(categoriaId) {
        // Obtenha a tabela de perguntas
        var tabelaPerguntas = document.getElementById('tabela-perguntas');

        // Obtenha todas as linhas da tabela
        var linhas = tabelaPerguntas.getElementsByTagName('tr');

        // Esconda todas as linhas
        for (var i = 0; i < linhas.length; i++) {
            linhas[i].style.display = 'none';
        }

        // Exiba as perguntas que pertencem à categoria selecionada
        for (var i = 0; i < linhas.length; i++) {
            if (linhas[i].classList.contains('pergunta-' + categoriaId)) {
            linhas[i].style.display = 'table-row';
            }
        }
    }
</script>
@endsection
