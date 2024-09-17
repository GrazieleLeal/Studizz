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
                                <input type="text" class="form-control" id="pergunta" placeholder="lorem" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa correta</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa correta" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Alternativa</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Alternativa" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Tema</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Biologia" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Assunto</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Plantas" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nível</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Fácil" disabled>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="aprovarP.html" class="btn btn-danger font-weight-bold" id="recusar">Recusar</a>
                                <a href="aprovarP.html" class="btn btn-success font-weight-bold ml-5" id="aprovar">Aprovar</a>
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
 