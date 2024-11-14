@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('subcategoria.update', ['id' => $subcategoria->id, 'categoria_id' => $categoria_id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="categoria_id" value="{{$categoria_id}}">
                            <div class="form-group">
                                <label for="descricao">Subcategoria</label>
                                <input type="text" class="form-control" id="descricao" value="{{$subcategoria->descricao}}" name="descricao">
                            </div>
                            <a class="btn btn-secondary mr2" href="{{route('subcategoria.index',$categoria_id)}}">Voltar</a>
                            <button type="submit" class="btn btn-primary mr2">Editar subcategoria</button>
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