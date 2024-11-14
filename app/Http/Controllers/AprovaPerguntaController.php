<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\PerguntaSubcategoria;

class AprovaPerguntaController extends Controller{

    public function index(){
        //$data = Pergunta::latest()->paginate(5);//joga os ultimos 5 elementos em data
        $data = Pergunta::with('pergunta_subcategoria.subcategoria.categoria')->get();
        //$data = Pergunta::all();
        $categorias = Categoria::all();
        return view('frontend.aprovaPergunta.index', compact('data','categorias'))/*->with('i', (request()->input('page', 1) - 1 * 5))*/;
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
        return view('frontend.aprovaPergunta.edit', compact('pergunta', 'alternativas','niveis','categoria','subcategoria'));
    }

    public function update(Request $request, string $id){
        $pergunta = Pergunta::find($id);
        if ($pergunta) {
            $aprova = $request->input('aprova');
            if ($aprova == 1) {
                $pergunta->aprovada = 1;
            } else {
                $pergunta->aprovada = 0;
            }
            $pergunta->save();
        }
        return redirect()->route('aprova.index')->with('success', 'Produto atusalizado com sucesso');
    }

    public function destroy(string $id){
        //
    }
}
