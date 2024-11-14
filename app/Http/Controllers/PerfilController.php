<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pergunta;

class PerfilController extends Controller{
    public function index(){
        //

    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(string $id){
        $perfil = User::find($id);
        $perguntasCriadas = Pergunta::where('users_id', $id)->count();
        $perguntasAprovadas = Pergunta::where('users_id', $id)->where('aprovada', 1)->count();
        $perguntasReprovadas = Pergunta::where('users_id', $id)->where('aprovada', 0)->count();
        $perguntasEmAnalise = Pergunta::where('users_id', $id)->whereNull('aprovada')->count();
        return view('frontend.perfil.show', compact('perfil','perguntasCriadas', 'perguntasAprovadas', 'perguntasReprovadas', 'perguntasEmAnalise'));
    }

    public function edit(string $id){
        $perfil = User::find($id);
        $perguntasCriadas = Pergunta::where('users_id', $id)->count();
        $perguntasAprovadas = Pergunta::where('users_id', $id)->where('aprovada', 1)->count();
        $perguntasReprovadas = Pergunta::where('users_id', $id)->where('aprovada', 0)->count();
        $perguntasEmAnalise = Pergunta::where('users_id', $id)->whereNull('aprovada')->count();
        return view('frontend.perfil.edit', compact('perfil','perguntasCriadas', 'perguntasAprovadas', 'perguntasReprovadas', 'perguntasEmAnalise'));
    }

    public function update(Request $request, string $id){
        $perfil = User::find($id);$perfil = User::find($id);
        if ($request->input('name') && $request->input('name') != $perfil->name) {
            $perfil->name = $request->input('name');
        }
        if ($request->input('email') && $request->input('email') != $perfil->email) {
            $perfil->email = $request->input('email');
        }

        if($request->hasFile('imagem_perfil')){
            $filenameWithExt = $request->file('imagem_perfil')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem_perfil')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imagem_perfil')->storeAs('imagem_perfil',$fileNameToStore,'public');
        } else {
            if (!$perfil->imagem) {
                $perfil->imagem = 'noimage.png';
            }
        }

        if($perfil->imagem != null){
            unlink('storage/imagem_perfil/'.$perfil->imagem);
        }

        $perfil->imagem = $fileNameToStore;

        $perfil->save();
        return redirect()->route('perfil.show', $id)->with('success', 'Perfil atualizado');
    }

    public function destroy(string $id){
        //
    }


}
