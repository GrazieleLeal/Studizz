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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Pergunta</th>
                                        <th>Nº alternativas</th>
                                        <th>Data de criação</th>
                                        <th>Status</th>
                                        <th><!--Aqui é o ver pergunta, edita e deleta--></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ \Str::limit($value->pergunta, 100) }}</td>
                                            <td>2</td>
                                            <td>{{ $value->created_at }}</td>
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
