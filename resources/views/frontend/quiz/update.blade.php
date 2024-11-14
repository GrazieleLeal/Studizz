@extends('layouts.oleez.oleez')
@section('main')
<div class="container ">
    <div class="row ">
        @if ($corretas >= $total / 2)
        <div class="col-md-12 pl-lg-5 wow  ">
            <form action="POST" class="oleez-contact-form ">
                <div style="margin-top: 10%; margin-bottom: 5%;">
                    <h3 class="pergunta p-5 d-flex justify-content-center" id="perguntaQuizz">Parabéns!</h3>
                    <h5 class="pergunta p-5 d-flex justify-content-center" id="perguntaQuizz">Você acertou {{$corretas}} de {{$total}} questões</h5>
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <a href="{{route('opcao.index')}}" class="btn btn-primary w-25">Voltar aos quizzes</a>
                </div>
            </form>
        </div>
        @else
        <div class="col-md-12 pl-lg-5 wow  ">
            <form action="POST" class="oleez-contact-form ">
                <div style="margin-top: 10%; margin-bottom: 5%;">
                    <h3 class="pergunta p-5 d-flex justify-content-center" id="perguntaQuizz">Mais sorte da próxima vez!</h3>
                    <h5 class="pergunta p-5 d-flex justify-content-center" id="perguntaQuizz">Você acertou {{$corretas}} de {{$total}} questões</h5>
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <a href="{{route('opcao.index')}}" class="btn btn-primary w-25">Voltar aos quizzes</a>
                </div>
            </form>
        </div> 
        @endif
    </div>
</div>
@endsection
