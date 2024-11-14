@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('revisaR.update', $pergunta->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" id="pergunta" placeholder="{{ $pergunta->pergunta }}" disabled>
                            </div>
                            @if ($pergunta->imagem == null)

                            @else
                            <img src="{{ asset('storage/imagem_pergunta/' . $pergunta->imagem) }}" alt="imagem categoria" class="testimonial-card-img" style="display: block; margin: 0 auto; ">
                            <br><br>
                            @endif
                            <label for="alternativa">Alternativas</label>
                            @foreach($alternativas as $alternativa)
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alternativa" placeholder="{{ $alternativa->descricao }}" disabled>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputUsername1">Categoria</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $categoria->categoria }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Subcategoria</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $subcategoria->descricao }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nível</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{ $niveis[$pergunta->nivel] }}" disabled>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary font-weight-bold">Mandar para análise</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer ">
        <div class="d-sm-flex justify-content-center justify-content-sm-between ">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block ">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center "> Free <a href="https://www.bootstrapdash.com/ " target="_blank ">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
