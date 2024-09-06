@extends('layouts.oleez.oleez')
@section('main')
<div class="container">
    <h1 class="post-title wow fadeInUp">Biologia</h1>
    <div class="row">
        <div class="col-md-8 blog-post-wrapper">
            <div class="post-header wow fadeInUp">
                <img src="https://i.postimg.cc/fyTQ1L6R/Blog-single-2x.jpg" alt="blog post" class="post-featured-image" style="width:100%;">
                <p class="post-date"></p>
            </div>
            <div class="post-content wow fadeInUp">
                <blockquote class="blockquote wow fadeInUp nota">
                    <p>Biologia é a ciência natural que estuda, descreve, preserva e melhora a vida e os organismos vivos. Apesar de sua complexidade, certos conceitos unificadores a consolidam em um campo único e coerente.</p>
                </blockquote>
            </div>

        </div>
        <div class="col-md-4">
            <div class="sidebar-widget wow fadeInUp">
                <h5 class="widget-title">Nível</h5>
                <div class="widget-content d-flex justify-content-center">
                    <a href="#!" class="post-tag nav-text pl-4">Animais</a>
                    <a href="#!" class="post-tag nav-text pl-4">Plantas</a>
                    <a href="#!" class="post-tag nav-text pl-4">Células</a>
                </div>
            </div>
            <div class="sidebar-widget wow fadeInUp">
                <h5 class="widget-title">Nível</h5>
                <div class="widget-content d-flex justify-content-center">
                    <a href="#!" class="post-tag nav-text pl-4">Fácil</a>
                    <a href="#!" class="post-tag nav-text pl-4">Médio</a>
                    <a href="#!" class="post-tag nav-text pl-4">Difícil</a>
                </div>
            </div>
            <div class="sidebar-widget wow fadeInUp">
                <h5 class="widget-title">Número de perguntas</h5>
                <div class="widget-content d-flex justify-content-center">
                    <a href="#!" class="post-tag nav-text pl-4">5</a>
                    <a href="#!" class="post-tag nav-text pl-4">10</a>
                    <a href="#!" class="post-tag nav-text pl-4">15</a>
                    <a href="#!" class="post-tag nav-text pl-4">20</a>
                </div>
            </div>
            <div class="sidebar-widget wow fadeInUp">
                <a class="btn w-100" href="{{route('quiz')}}">Jogar</a>
                <!--<button id="jogar" class="btn">Jogar</button>-->
            </div>
        </div>
    </div>
</div>
@endsection
