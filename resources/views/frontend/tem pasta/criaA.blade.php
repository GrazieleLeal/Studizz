@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Faça suas alternativas</h4>
                        <form class="forms-sample">
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
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa">
                            </div>

                            <!--<input type="submit" href="criaA.html" class="btn btn-primary mr-2" value="Próximo">-->
                            <a href="{{route('criaP')}}" class="btn btn-light">Voltar</a>
                            <a href="{{route('minhaP')}}" class="btn btn-primary mr-2" id="criaP">Criar pergunta</a>
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
