@extends('layouts.oleez.oleez')
@section('main')
<div class="container ">
    <h1 class="oleez-page-title wow fadeInUp ">Feedbacks</h1>
    <div class="row "  style="margin-bottom: 15%;">
        <div class="col-md-12 pl-lg-5 wow fadeInRight">
            <form action="POST " class="oleez-contact-form ">
                <div class="form-group ">
                    <label for="message ">Deixe seu Feedback!</label>
                    <textarea name="message " id="message " rows="10 " class="oleez-textarea " required></textarea>
                </div>
                <button type="submit " class="btn btn-submit ">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
