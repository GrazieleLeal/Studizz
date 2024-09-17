@extends('layouts.regal.regal')
@section('main')
<div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    <div class="text-center" id="foto-perfil">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" id="avatar" alt="avatar">
                    </div>
                    </hr><br>
                    <ul class="list-group">
                        <li class="list-group-item text-muted">Atividade <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-left"><span class="pull-left"><strong>Perguntas postadas</strong></span>
                            <p class="pull-right">125</p>
                        </li>
                        <li class="list-group-item text-left"><span class="pull-left"><strong>Perguntas aprovadas</strong></span>
                            <p class="pull-right">125</p>
                        </li>
                        <li class="list-group-item text-left"><span class="pull-left"><strong>Perguntas reprovadas</strong></span>
                            <p class="pull-right">125</p>
                        </li>
                        <li class="list-group-item text-left"><span class="pull-left"><strong>Perguntas sendo avaliadas</strong></span>
                            <p class="pull-right">125</p>
                        </li>
                    </ul>

                </div>
                <!--/col-3-->
                <div class="col-sm-9" style="margin-top: 2%;">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group ml-3">
                                    <div class="col-10">
                                        <label for="nome"><h4>Usuário</h4></label>

                                        <input type="text" class="form-control" name="nome" id="nome"
                                            value="{{ $perfil->name }}" title="Maira" disabled>
                                    </div>
                                </div>

                                <div class="form-group ml-3">
                                    <div class="col-10">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $perfil->email }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group ml-4">
                                    <div class="col-xs-12">
                                        <br>
                                        <a class="btn btn-lg btn-info" href="{{route('perfil.edit', auth()->user()->id)}}">Editar</a>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/tab-content-->
            </div>
            <!--/col-9-->
        </div>
@endsection
