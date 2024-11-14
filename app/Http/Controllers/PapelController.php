<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pergunta;

class PerfilApiController extends Controller{

    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(/*string $id*/){
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }
        $perguntasCriadas = Pergunta::where('users_id', $user->id)->count();
        $perguntasAprovadas = Pergunta::where('users_id', $user->id)->where('aprovada', 1)->count();
        $perguntasReprovadas = Pergunta::where('users_id', $user->id)->where('aprovada', 0)->count();
        $perguntasEmAnalise = Pergunta::where('users_id', $user->id)->whereNull('aprovada')->count();

        return response()->json([
            'user' => $user,
            'perguntasCriadas' => $perguntasCriadas,
            'perguntasAprovadas' => $perguntasAprovadas,
            'perguntasReprovadas' => $perguntasReprovadas,
            'perguntasEmAnalise' => $perguntasEmAnalise,
        ]);
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        //
    }
}
