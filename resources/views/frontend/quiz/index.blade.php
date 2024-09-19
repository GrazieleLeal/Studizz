@extends('layouts.oleez.oleez')
@section('main')
<div class="container">
    <h1 class="oleez-page-title wow fadeInUp">Categorias</h1>
    <div class="row">
        @foreach ($data as $key => $value)
            <div class="col-md-4">
                <div class="blog-post-card wow fadeInUp"  style="margin-top:10%;">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="https://i.postimg.cc/Mpg31T5j/Captura-de-tela-2024-05-17-154736.png" style="width:100%;" alt="blog">
                    </div>
                    <a href="{{route('opcaoQuiz')}}" class="blog-post-title categoria">{{ $value->descricao }}</a>
                </div> 
            </div>

        @endforeach
    </div>
    <div class="row">
        <div class="col-12 pb-5 mb-5">
            <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp"  style="margin-top:10%;">
                <a href="#!" class="active">01</a>
                <a href="#!">02</a>
                <a href="#!">03</a>
                <a href="#!" class="next">&rarr;</a>
            </nav>
        </div>
    </div>
</div>
@endsection
