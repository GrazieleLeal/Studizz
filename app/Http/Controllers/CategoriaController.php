<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Pergunta;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categoria::all();//joga todos os produtos da tabela em data
        return view('frontend.categoria.index')->with('data', $data);
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
        $categoria = Categoria::where('id', $id)->first();
        $subcategoria = Subcategoria::where('categoria_id', $id)->get();
        //$numPerguntas = Pergunta::count();
        $numPerguntas = Pergunta::whereHas('pergunta_subcategoria', function ($query) use ($id) {
            $query->whereHas('subcategoria', function ($query) use ($id) {
                $query->whereHas('categoria', function ($query) use ($id) {
                    $query->where('id', $id);
                });
            });
        })->count();
        $perguntas = Pergunta::all()->toArray();
        return view('frontend.categoria.show', compact('id', 'categoria','subcategoria','numPerguntas','perguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
