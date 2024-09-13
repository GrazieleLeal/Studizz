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
                                <input type="text" class="form-control" id="pergunta" placeholder="lorem" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa correta</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa correta" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Categoria</label>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Biologia" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Subcategoria</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Plantas" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nível</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Fácil" >
                            </div>
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
