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
                                    <h2>Crie subcategorias para {{$categoria->categoria}}</h2>
                                </th>
                                <th>
                                    <a href="{{ route('subcategoria.create', $id) }}" class="btn btn-primary font-weight-bold " id="crie">Crie</a>
                                </th>
                            </tr>
                        </table>
                        <h4 class="card-title ">Subcategorias criadas</h4>
                        <div class="table-responsive ">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Criado em</th>
                                        <th><!--Aqui é o ver pergunta, edita e deleta--></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->descricao }}</td>
                                            <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <form action="{{ route('subcategoria.destroy', ['id' => $value->id, 'categoria_id' => $id]) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('subcategoria.show',['id' => $value->id, 'categoria_id' => $id]) }}">Subcategoria</a>
                                                    <a class="btn btn-info" href="{{ route('subcategoria.edit',['id' => $value->id, 'categoria_id' => $id]) }}">Editar</a>
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
