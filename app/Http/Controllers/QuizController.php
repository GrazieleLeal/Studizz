<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Alternativa;

class QuizController extends Controller{

    public function index(){
        $request->validate([
            'subcategorias' => 'required|array',
            'niveis' => 'required|array',
            'num_perguntas' => 'required|integer|min:1',
        ]);

        $subcategorias = $request->input('subcategorias');
        $niveis = $request->input('niveis');
        $numPerguntas = $request->input('num_perguntas');

        return view('frontend.quiz.index'/*, compact('perguntas')*/);
    }
    public function create(){
        //
    }

    public function store(Request $request){
        $request->validate([
            'subcategorias' => 'required|array',
            'niveis' => 'required|array',
            'num_perguntas' => 'required|integer|min:1',
        ]);
        $niveis = $request->input('niveis');
        $subcategorias = $request->input('subcategorias');
        $numPerguntas = $request->input('num_perguntas');

        $perguntas = Pergunta::whereIn('nivel', $niveis) // filtrar por níveis selecionados
        ->where('aprovada', 1) // filtrar apenas perguntas aprovadas
        ->whereHas('pergunta_subcategoria', function ($query) use ($subcategorias) {
            $query->whereIn('subcategoria_id', $subcategorias); // filtrar por subcategorias selecionadas
        })
        ->inRandomOrder()
        ->take($numPerguntas)
        ->get();

        foreach ($perguntas as $pergunta) {
            $pergunta->alternativas = Alternativa::where('pergunta_id', $pergunta->id)->get();
        }
        return view('frontend.quiz.index', compact('perguntas'));
    }
    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        $corretas = $request->input('corretas');
        $incorretas = $request->input('incorretas');
        $total = $corretas + $incorretas;
        // Exibe a tela com os resultados
        return view('frontend.quiz.update', compact('corretas', 'incorretas','total'));
    }

    public function destroy(string $id){
        //
    }
}
