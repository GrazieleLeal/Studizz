@extends('layouts.oleez.oleez')
@section('main')
<section>
    <div class="container wow fadeIn ">
        <div id="oleezLandingCarousel " class="oleez-landing-carousel carousel slide " data-ride="carousel ">
            <div class="carousel-inner " role="listbox ">
                <div class="carousel-item active ">
                    <img src="https://i.postimg.cc/kgSBX1pP/banner-1.jpg" alt="First slide " class="w-100 ">
                    <div class="carousel-caption ">
                        <h2 data-animation="animated fadeInRight "><span>Studizz</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    @if ($errors->any())
        <script>
            var successMessage = '';
            @if (session('status'))
                $successMessage = {{ session('status') }};
            @endif
            Swal.fire({
                icon: "success",
                title: "Você está logado!",
                text: successMessage,
            });
        </script>
    @endif
@endsection
