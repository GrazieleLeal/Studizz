<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\PerguntaSubcategoria;
use App\Models\Subcategoria;
use App\Models\Categoria;

class RevisaReprovadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Pergunta::latest()->paginate(5);//joga os ultimos 5 elementos em data
        $data = Pergunta::with('pergunta_subcategoria.subcategoria.categoria')->get();
        //$data = Pergunta::all();
        $categorias = Categoria::all();
        return view('frontend.revisaReprovada.index', compact('data','categorias'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pergunta = Pergunta::find($id);
        $alternativas = $pergunta->alternativa;
        $niveis = [
            1 => 'Fácil',
            2 => 'Médio',
            3 => 'Difícil',
        ];
        $subcategoria = Subcategoria::find(
            PerguntaSubcategoria::where('pergunta_id', $pergunta->id)
                ->first()
                ->subcategoria_id
        );
        $categoria = Categoria::find($subcategoria->categoria_id);
        return view('frontend.revisaReprovada.edit', compact('pergunta', 'alternativas','niveis','categoria','subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pergunta = Pergunta::find($id);

        if ($pergunta) {
            $pergunta->aprovada = null;
            $pergunta->save();
        }
        return redirect()->route('revisaR.index')->with('success', 'Produto atusalizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
