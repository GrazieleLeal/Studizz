<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pergunta;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perfil = User::find($id);
        $perguntasCriadas = Pergunta::where('users_id', $id)->count();
        $perguntasAprovadas = Pergunta::where('users_id', $id)->where('aprovada', 1)->count();
        $perguntasReprovadas = Pergunta::where('users_id', $id)->where('aprovada', 0)->count();
        $perguntasEmAnalise = Pergunta::where('users_id', $id)->whereNull('aprovada')->count();
        return view('frontend.perfil.show', compact('perfil','perguntasCriadas', 'perguntasAprovadas', 'perguntasReprovadas', 'perguntasEmAnalise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perfil = User::find($id);
        $perguntasCriadas = Pergunta::where('users_id', $id)->count();
        $perguntasAprovadas = Pergunta::where('users_id', $id)->where('aprovada', 1)->count();
        $perguntasReprovadas = Pergunta::where('users_id', $id)->where('aprovada', 0)->count();
        $perguntasEmAnalise = Pergunta::where('users_id', $id)->whereNull('aprovada')->count();
        return view('frontend.perfil.edit', compact('perfil','perguntasCriadas', 'perguntasAprovadas', 'perguntasReprovadas', 'perguntasEmAnalise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perfil = User::find($id);
        if ($request->input('name') && $request->input('name') != $perfil->name) {
            $perfil->name = $request->input('name');
        }
        if ($request->input('email') && $request->input('email') != $perfil->email) {
            $perfil->email = $request->input('email');
        }
        $perfil->imagem = $request->input('imagem');
        $perfil->save();

        return redirect()->route('perfil.show', $id)->with('success', 'Perfil atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
