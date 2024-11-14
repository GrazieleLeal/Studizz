@extends('layouts.regal.regal')
@section('main')

{{--
@if ($errors->any())
    <script>
        Swal.fire({
            icon: "error",
            title: "Algo deu",
            text: "Something went wrong!",
        });
    </script>

    <div class="alert alert-danger">


        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
--}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crie a subcategoria</h4>
                        <form class="forms-sample" action="{{ route('subcategoria.store', $id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="descricao">Nome</label>
                                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="ex.: Plantas">
                            </div>
                            <a class="btn btn-secondary mr2" href="{{route('categoria.index')}}">Voltar</a>
                            <button type="submit" class="btn btn-primary mr2">Criar subcategoria</button>
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

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    @if ($errors->any())
        <script>
            var errorMessage = '';
            @foreach ($errors->all() as $error)
                errorMessage += '{{ $error }}\n';
            @endforeach
            Swal.fire({
                icon: "error",
                title: "Algo deu errado",
                text: errorMessage,
            });
        </script>
    @endif
@endsection
