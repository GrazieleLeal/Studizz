@extends('layouts.oleez.oleez')
@section('main')
<div class="container " style="margin-bottom: 10%;">
    <div class="row ">
        <div class="col-md-12 pl-lg-5 wow  ">
            <form action="POST" class="oleez-contact-form ">
                <h3 class="pergunta card p-5" id="perguntaQuizz">Qual é o maior mamífero terrestre? </h3>
                <div class="mt-5">
                    <input type="button" class="btn botao" style="width: 20%;height: 200px; white-space: normal;" id="alt1" value="Girafa">
                    <input type="button" class="btn botao ml-5" style="width: 20%;height: 200px; white-space: normal;" id="alt2" value="Baleia">
                    <input type="button" class="btn botao ml-5" style="width: 20%;height: 200px; white-space: normal;" id="alt3" value="Cachorro">
                    <input type="button" class="btn botao ml-5" style="width: 20%;height: 200px; white-space: normal;" id="alt4" value="Gato">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
