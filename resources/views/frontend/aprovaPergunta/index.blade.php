@extends('layouts.regal.regal')
@section('main')
<div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Perguntas para aprovar</h4>
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Pergunta</th>
                                                    <th>Nº alternativas</th>
                                                    <th>Data de criação</th>
                                                    <th>Tema</th>
                                                    <th><!--Aqui é o ver pergunta, edita e deleta--></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                    <tr>
                                                        <td>{{ \Str::limit($value->pergunta, 100) }}</td>
                                                        <td>{{ $value->alternativa->count() }}</td>
                                                        <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                                        <td>{!! $value->aprovada_badge !!}</td>

                                                        <td>
                                                            <form action="{{ route('criaPergunta.destroy',$value->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('criaPergunta.show',$value->id) }}">Pergunta</a>
                                                                <a class="btn btn-info" href="{{ route('criaPergunta.edit',$value->id) }}">Editar</a>
                                                                @csrf<!--token que so aceita coisas que vem dele proprio-->
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Deletar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--
                                            <tbody>
                                                <tr>
                                                    <td>Qual o nome do grupo dos escorpiões</td>
                                                    <td>2</td>
                                                    <td>26/03/2024</td>
                                                    <td><label class="badge badge-danger">Bio</label></td>
                                                    <td>
                                                        <a class="btn btn-primary mr-2" href="{{route('aprovaP')}}">Pergunta</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Messsy</td>
                                                    <td>53275532</td>
                                                    <td>15 May 2017</td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                    <td>
                                                        <a href="{{route('aprovada')}}" class="btn btn-primary mr-2">Pergunta</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>John</td>
                                                    <td>53275533</td>
                                                    <td>14 May 2017</td>
                                                    <td><label class="badge badge-info">Fixed</label></td>
                                                    <td>
                                                        <a href="aprovaP.html" class="btn btn-primary mr-2">Pergunta</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Peter</td>
                                                    <td>53275534</td>
                                                    <td>16 May 2017</td>
                                                    <td><label class="badge badge-success">Completed</label></td>
                                                    <td>
                                                        <a href="aprovaP.html" class="btn btn-primary mr-2">Pergunta</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td>20 May 2017</td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                    <td>
                                                        <a href="aprovaP.html" class="btn btn-primary mr-2">Pergunta</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            -->
                                        </table>
                                    </div>
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
