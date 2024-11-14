@extends('layouts.admin.admin')
@section('main')
<section class="oleez-landing-section oleez-landing-section-testimonials ">
    <div class="container ">
        <div class="oleez-landing-section-content ">
            <div class="d-md-flex justify-content-between wow fadeInUp ">
                <div class="testimonial-section-content ">
                    <h2 class="section-title ">Feedbacks</h2>
                    <p class="section-subtitle ">dos usuários</p>
                </div>
                <div class="testimonial-carousel-navbtn-wrapper ">
                    
                </div>
            </div>
            <div class="landing-testimonial-carousel wow fadeInUp ">
                @foreach($feedback as $feedback)
                    <div class="landing-testimonial-card ">
                        <div class="media ">
                            @if ($feedback->user->imagem== null)
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="testimonial-card-img " id="avatar" alt="avatar">
                            @else
                            <img src="{{ asset('storage/imagem_perfil/' . $feedback->user->imagem) }}" alt="imagem categoria" class="testimonial-card-img ">
                            @endif
                            {{--
                            <img src="{{ asset('storage/' . $feedback->usuario->imagem) }}" alt="client " class="testimonial-card-img ">
                            --}}
                            <div class="media-body ">
                                <p class="testimonial-card-content ">
                                    {{ $feedback->descricao }}
                                </p>
                                <h6 class="testimonial-card-name ">{{ $feedback->user->name }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container wow fadeIn ">
        <button class="new-admin btn-primary ">Adicionar novo admin</button>
    </div>
</section>
@endsection
