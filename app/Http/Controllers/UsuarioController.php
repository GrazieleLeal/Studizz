<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return 'index';
    } 

    public function create(){
        return 'create';
    }

    public function view(){
        return 'view';
    }

    public function update(){
        return 'update';
    }

    public function delete(){
        return 'delete';
    }
}
