@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crie sua pergunta</h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="pergunta">Pergunta</label>
                                <input type="text" class="form-control" id="pergunta" placeholder="Pergunta">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Número de alternativas</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Tema</label>
                                <select class="form-control" id="exampleSelectGender">
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
                                <label for="exampleSelectGender">Assunto</label>
                                <select class="form-control" id="exampleSelectGender">
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
                                <label for="exampleSelectGender">Nível</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>Fácil</option>
                                    <option>Médio</option>
                                    <option>Difícil</option>
                                </select>
                            </div>
                            <!--<input type="submit" href="criaA.html" class="btn btn-primary mr-2" value="Próximo">-->
                            <a href="{{route('criaA')}}" class="btn btn-primary mr-2">Próximo</a>
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

