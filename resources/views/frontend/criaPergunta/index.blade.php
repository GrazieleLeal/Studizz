@extends('layouts.regal.regal')
@section('main')
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row ">
            <div class="col-lg-12 grid-margin stretch-card ">
                <div class="card ">
                    <div class="card-body ">
                        <table style="width:90%; margin-bottom:3%;">
                            <tr>
                                <th>
                                    <h2>Crie uma pergunta</h2>
                                </th>
                                <th>
                                    <a href="{{route('criaPergunta.create')}}" class="btn btn-primary font-weight-bold " id="crie">Crie</a>
                                </th>
                            </tr>
                        </table>
                        <h4 class="card-title ">Suas perguntas</h4>
                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Pergunta</th>
                                        <th>Nº alternativas</th>
                                        <th>Data de criação</th>
                                        <th>Status</th>
                                        <th>Ver pergunta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Qual o nome do grupo dos escorpiões</td>
                                        <td>2</td>
                                        <td>26/03/2024</td>
                                        <td><label class="badge badge-danger ">Pending</label></td>
                                        <td>
                                            <a class="btn btn-primary mr-2 " href="{{route('detalhesP')}}">Pergunta</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Messsy</td>
                                        <td>53275532</td>
                                        <td>15 May 2017</td>
                                        <td><label class="badge badge-warning ">In progress</label></td>
                                        <td>
                                            <a class="btn btn-primary mr-2 " href="detalhesP.html ">Pergunta</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>53275533</td>
                                        <td>14 May 2017</td>
                                        <td><label class="badge badge-info ">Fixed</label></td>
                                        <td>
                                            <a class="btn btn-primary mr-2 " href="detalhesP.html ">Pergunta</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peter</td>
                                        <td>53275534</td>
                                        <td>16 May 2017</td>
                                        <td><label class="badge badge-success ">Completed</label></td>
                                        <td>
                                            <a class="btn btn-primary mr-2 " href="detalhesP.html ">Pergunta</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dave</td>
                                        <td>53275535</td>
                                        <td>20 May 2017</td>
                                        <td><label class="badge badge-warning ">In progress</label></td>
                                        <td>
                                            <a class="btn btn-primary mr-2 " href="detalhesP.html ">Pergunta</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
