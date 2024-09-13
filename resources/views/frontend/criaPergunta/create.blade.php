@extends('layouts.regal.regal')
@section('main')

{{--
@if ($errors->any())
    <script>
        Swal.fire({
            icon: "error",
            title: "Algo deu",
            text: "Something went wrong!",
        });
    </script>

    <div class="alert alert-danger">


        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
--}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crie sua pergunta</h4>
                        <form class="forms-sample" action="{{ route('criaPergunta.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria_id" id="categoria">
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <select class="form-control" name="subcategoria_id" id="subcategoria">
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}" {{ $subcategoria->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $subcategoria->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nível</label>
                                <select class="form-control" name="nivel" id="nivel">
                                    <option value="1">Fácil</option>
                                    <option value="2">Médio</option>
                                    <option value="3">Difícil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" name="pergunta" id="pergunta" placeholder="Pergunta">
                            </div>
                            <div class="form-group">
                                <label for="imagem">Adicione uma imagem</label>
                                <input type="file" class="form-control text-center center-block file-upload" name="imagem" id="imagem">
                            </div>

                            @for($i = 0; $i < 5; $i++)
                                @if($i == 0)
                                    <input type="text" name="alternativas[{{ $i }}][descricao]" class="form-control"  id="alternativaC" placeholder="Alternativa correta" required>
                                @else
                                    <input type="text" name="alternativas[{{ $i }}][descricao]" class="form-control"  id="alternativaE" placeholder="Alternativa incorreta">
                                @endif

                                @if($i == 0)
                                    <div class="form-group">
                                        <input type="hidden" name="alternativas[{{ $i }}][correta]" value="1"> <!-- Alternativa correta -->
                                    </div>

                                @else
                                    <div class="form-group">
                                        <input type="hidden" name="alternativas[{{ $i }}][correta]" value="0"> <!-- Alternativa errada -->
                                    </div>
                                @endif
                            @endfor
                            <a class="btn btn-secondary mr2" href="{{route('criaPergunta.index')}}">Voltar</a>
                            <button type="submit" class="btn btn-primary mr2">Criar Pergunta</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    @if ($errors->any())
        <script>
            var errorMessage = '';
            @foreach ($errors->all() as $error)
                errorMessage += '{{ $error }}\n';
            @endforeach
            Swal.fire({
                icon: "error",
                title: "Algo deu errado",
                text: errorMessage,
            });
        </script>
    @endif
@endsection
