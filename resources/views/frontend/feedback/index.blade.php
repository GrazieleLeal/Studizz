@extends('layouts.regal.regal')
@section('main')
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row ">
            <div class="col-lg-12 grid-margin stretch-card ">
                <div class="card ">
                    <div class="card-body ">
                        @if ($papel ==  1)
                        <h4 class="card-title ">Feedbacks dos usuários</h4>
                        @else
                        <h4 class="card-title ">Seus Feedbacks</h4>
                        @endif
                        <div class="table-responsive ">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Feedback</th>
                                        <th><!--Aqui é o ver pergunta, edita e deleta--></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($papel ==  1)
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ \Str::limit($value->descricao, 50) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('feedback.show',$value->id) }}">Feedback</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ \Str::limit($value->descricao, 50) }}</td>
                                            <td>
                                                <form action="{{ route('feedback.destroy',$value->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('feedback.show',$value->id) }}">Feedback</a>
                                                    <a class="btn btn-info" href="{{ route('feedback.edit',$value->id) }}">Editar</a>
                                                    @csrf<!--token que so aceita coisas que vem dele proprio-->
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
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
