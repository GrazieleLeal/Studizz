@extends('layouts.oleez.oleez')
@section('main')
<div class="container">
    <h1 class="oleez-page-title wow fadeInUp">Categorias</h1>
    <div class="row">
        @foreach ($data as $key => $value)
            <div class="col-md-4">
                <div class="blog-post-card wow fadeInUp"  style="margin-top:10%;">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="storage/imagem_categoria/{{$value->imagem}}" style="width:320px; height:180px" alt="blog">
                    </div>
                    <a href="{{ route('opcao.show',$value->id) }}" class="blog-post-title categoria">{{ $value->categoria }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 pb-5 mb-5">
            <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp" style="margin-top:10%;">
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                    <a href="{{ $data->url($i) }}" class="{{ $i == $data->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                @endfor

                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="next">&rarr;</a>
                @endif
            </nav>
        </div>
    </div>
    <!--
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
-->
</div>
@endsection
