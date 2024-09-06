@extends('layouts.regal.regal')
@section('main')

<!--
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
-->

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
                                <select class="form-control" name="categoria" id="categoria">
                                    <option>DW</option>
                                    <option>Mat</option>
                                    <option>Bio</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <select class="form-control" name="subcategoria" id="subcategoria">
                                    <option>Plantas</option>
                                    <option>Orgãos</option>
                                    <option>Animais</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
                                    <option>Mat</option>
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
                            <div class="form-group">
                                <label for="alternativa1">Alternativa correta</label>
                                <input type="text" name="alternativas[0][descricao]" class="form-control" name="descricao" id="alternativa1" placeholder="Alternativa correta">
                                <input type="hidden" name="alternativas[0][correta]" value="1"> <!-- Alternativa correta -->
                            </div>
                            <div class="form-group">
                                <label for="alternativa2">Alternativa</label>
                                <input type="text" name="alternativas[1][descricao]" class="form-control" name="descricao" id="alternativa2" placeholder="Alternativa">
                                <input type="hidden" name="alternativas[1][correta]" value="0"> <!-- Alternativa incorreta -->
                            </div>
                            <div class="form-group">
                                <label for="alternativa3">Alternativa</label>
                                <input type="text" name="alternativas[2][descricao]" class="form-control" name="descricao" id="alternativa3" placeholder="Alternativa">
                                <input type="hidden" name="alternativas[2][correta]" value="0"> <!-- Alternativa incorreta -->
                            </div>
                            <div class="form-group">
                                <label for="alternativa4">Alternativa</label>
                                <input type="text" name="alternativas[3][descricao]" class="form-control" name="descricao" id="alternativa4" placeholder="Alternativa">
                                <input type="hidden" name="alternativas[3][correta]" value="0"> <!-- Alternativa incorreta -->
                            </div>
                            <div class="form-group">
                                <label for="alternativa5">Alternativa</label>
                                <input type="text" name="alternativas[4][descricao]" class="form-control" name="descricao" id="alternativa5" placeholder="Alternativa">
                                <input type="hidden" name="alternativas[4][correta]" value="0"> <!-- Alternativa incorreta -->
                            </div>
                            <!--<input type="submit" href="criaA.html" class="btn btn-primary mr-2" value="Próximo">-->
                            <button type="submit" class="btn btn-primary mr2">Criar Pergunta</button>
                            <!--<a href="{{route('criaA')}}" class="btn btn-primary mr-2">Próximo</a>-->
                        </form>
                        <form class="forms-sample" action="{{ route('criaPergunta.store') }}" method="POST">
                            <!--
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa correta</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa correta">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa(opicional)">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa(opicional)">
                            </div>
                            -->
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
