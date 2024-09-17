<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('frontend.perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perfil = User::find($id);
        return view('frontend.perfil.edit', compact('perfil'));
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
