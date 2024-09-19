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
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" id="pergunta" placeholder="{{$pergunta->pergunta}}" disabled>
                            </div>
                            <label for="alternativa">Alternativas</label>
                            @foreach($alternativas as $alternativa)
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alternativa" placeholder="{{ $alternativa->descricao }}" disabled>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputUsername1">Categoria</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $categoria->descricao }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Subcategoria</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $subcategoria->descricao }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nível</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $niveis[$pergunta->nivel] }}" disabled>
                            </div>
                            {{--<a class="btn btn-secondary mr2" href="{{route('criaPergunta.index')}}">Voltar</a>--}}
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
