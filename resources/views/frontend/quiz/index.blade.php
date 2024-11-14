@extends('layouts.oleez.oleez')
@section('main')
<div class="container " style="margin-bottom: 10%;">
    <div class="row ">
        <div class="col-md-12 pl-lg-5 wow  ">
            <form action="{{ route('quiz.update',0) }}" method="POST" class="oleez-contact-form ">
                @csrf
                @method('PUT')
                <input type="hidden" name="corretas" id="corretas" value="0">
                <input type="hidden" name="incorretas" id="incorretas" value="0">
                @foreach($perguntas as $pergunta)
                    <div class="card">
                        <h3 class="pergunta p-5" id="perguntaQuizz">{{ $pergunta->pergunta }}</h3>
                        @if ($pergunta->imagem != null)
                        <img src="{{ asset('storage/imagem_pergunta/' . $pergunta->imagem) }}" class="mx-auto d-block" style="width:90%;">
                        @endif
                    </div>
                    <div class="mt-5 mb-3">
                    @php
                        $alternativas = $pergunta->alternativas->all();
                        shuffle($alternativas);
                    @endphp
                    @foreach($alternativas as $alternativa)
                        <input type="button" class="btn botao {{ $loop->index > 0 ? 'ml-5' : '' }}" style="width: 20%;height: 200px; white-space: normal;" id="alt{{ $alternativa->id }}" value="{{ $alternativa->descricao }}" data-correct="{{ $alternativa->correta ? 'true' : 'false' }}">
                    @endforeach
                    </div>
                @endforeach
                <div class="mt-5 mb-3">
                    <button class="btn btn-primary" type="submit">Enviar respostas</button>
                </div>
                {{--
                    @foreach($perguntas as $pergunta)
                        <h3 class="pergunta card p-5" id="perguntaQuizz">{{ $pergunta->pergunta }}</h3>
                        <div class="mt-5">
                            @php
                                $alternativas = Alternativa::where('pergunta_id', $pergunta->id)->get();
                                shuffle($alternativas);
                            @endphp
                            @foreach($alternativas as $index => $alternativa)
                                <input type="button" class="btn botao {{ $index > 0 ? 'ml-5' : '' }}" style="width: 20%;height: 200px; white-space: normal;" id="alt{{ $alternativa->id }}" value="{{ $alternativa->descricao }}">
                            @endforeach
                        </div>
                    @endforeach
                --}}
            </form>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const alternativas = document.querySelectorAll('.botao');

    alternativas.forEach(alternativa => {
        alternativa.addEventListener('click', (e) => {
            const correct = e.target.dataset.correct === 'true';
            const answerText = correct ? 'Acertou!' : 'Errou!';
            if (correct) {
                e.target.style.backgroundColor = 'green';
                document.getElementById('corretas').value = parseInt(document.getElementById('corretas').value) + 1;
            } else {
                e.target.style.backgroundColor = 'red';
                document.getElementById('incorretas').value = parseInt(document.getElementById('incorretas').value) + 1;
            }

            const questionButtons = e.target.parentNode.querySelectorAll('.botao');
            questionButtons.forEach(button => {
                button.disabled = true;
            });
        });
    });
</script>
@endsection
