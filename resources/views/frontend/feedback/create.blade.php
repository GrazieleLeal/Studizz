@extends('layouts.oleez.oleez')
@section('main')



<div class="container ">
    <h1 class="oleez-page-title wow fadeInUp ">Feedbacks</h1>
    <div class="row "  style="margin-bottom: 15%;">
        <div class="col-md-12 pl-lg-5 wow fadeInRight">
            <form action="{{ route('feedback.store') }}" method="POST" class="oleez-contact-form ">
                @csrf
                <div class="form-group ">
                    <label for="descricao">Deixe seu Feedback!</label>
                    <textarea name="descricao" id="descricao" rows="10 " class="oleez-textarea " required></textarea>
                </div>
                <button type="submit " class="btn btn-submit ">Enviar</button>
            </form>
        </div>
    </div>
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
