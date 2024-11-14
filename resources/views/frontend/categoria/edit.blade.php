@extends('layouts.regal.regal')
@section('main') 
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('categoria.update',$categoria->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <input type="text" class="form-control" id="categoria" value="{{$categoria->categoria}}" name="categoria" >
                            </div>
                            <div class="form-group">
                                <label for="pergunta">Imagem antiga</label>
                                <br>
                                <img src="{{ asset('storage/imagem_categoria/' . $categoria->imagem) }}" alt="imagem categoria" style="display: block; margin: 0 auto; heigh: 80%; width:80%;">
                            </div>
                            <div class="form-group">
                                <label for="imagem_categoria">Adicione uma nova imagem(Favor colocar uma imagem de tamanho 1.280 px por 720 px)</label>
                                <input type="file" class="form-control text-center center-block file-upload" name="imagem_categoria" id="imagem_categoria" name="imagem_categoria">
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" value="{{$categoria->descricao}}" name="descricao" >
                            </div>
                            <a class="btn btn-secondary mr2" href="{{route('categoria.index')}}">Voltar</a>
                            <button type="submit" class="btn btn-primary mr2">Editar Categoria</button>
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
