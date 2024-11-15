@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="pergunta">Categoria</label>
                                <input type="text" class="form-control" id="pergunta" placeholder="{{$categoria->categoria}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">imagem</label>
                                <br>
                                <img src="{{ asset('storage/imagem_categoria/' . $categoria->imagem) }}" alt="imagem categoria" style="display: block; margin: 0 auto; heigh: 80%; width:80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Descrição</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $categoria->descricao }}" disabled>
                            </div>
                            <a class="btn btn-secondary mr2" href="{{route('categoria.index')}}">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
</div>
@endsection
