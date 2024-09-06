@extends('layouts.regal.regal')
@section('main')
<div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-3">
                        <!--left col-->
                        <div class="text-center" id="foto-perfil">
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" id="avatar" alt="avatar">
                            <h6>Coloque uma foto diferente</h6>
                            <input type="file" class="text-center center-block file-upload">
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
                                            <label for="first_name"><h4>Usuário</h4></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="Maira">
                                        </div>
                                    </div>
                                    <div class="form-group ml-3">
                                        <div class="col-10">
                                            <label for="last_name"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                        </div>
                                    </div>
                                    <div class="form-group ml-4">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
                                            <a class="btn btn-lg" href="{{route('perfil')}}">Cancelar</a>
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
