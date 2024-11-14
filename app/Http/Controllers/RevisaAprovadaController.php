<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\PerguntaSubcategoria;
use App\Models\Subcategoria;
use App\Models\Categoria;

class RevisaAprovadaController extends Controller{
    public function index(){
        $data = Pergunta::with('pergunta_subcategoria.subcategoria.categoria')->get();
        $categorias = Categoria::all();
        return view('frontend.revisaAprovada.index', compact('data','categorias'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(string $id){
        //
    }

    public function edit(string $id){
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
        return view('frontend.revisaAprovada.edit', compact('pergunta', 'alternativas','niveis','categoria','subcategoria'));
    }

    public function update(Request $request, string $id){
        $pergunta = Pergunta::find($id);

        if ($pergunta) {
            $pergunta->aprovada = null;
            $pergunta->save();
        }
        return redirect()->route('revisaA.index')->with('success', 'Produto atusalizado com sucesso');
    }

    public function destroy(string $id){
        //
    }
}
