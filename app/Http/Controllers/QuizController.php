<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Alternativa;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $request->validate([
            'subcategorias' => 'required|array',
            'niveis' => 'required|array',
            'num_perguntas' => 'required|integer|min:1',
        ]);
        $niveis = $request->input('niveis');
        $subcategorias = $request->input('subcategorias');
        $numPerguntas = $request->input('num_perguntas');

        $perguntas = Pergunta::where('nivel', $niveis)
        ->whereHas('pergunta_subcategoria', function ($query) use ($subcategorias) {
            $query->whereIn('subcategoria_id', $subcategorias);
        })
        ->inRandomOrder()
        ->take($numPerguntas)
        ->get();

        foreach ($perguntas as $pergunta) {
            $pergunta->alternativas = Alternativa::where('pergunta_id', $pergunta->id)->get();
        }
        return view('frontend.quiz.index', compact('perguntas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
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
    public function update(Request $request/*, string $id*/)
    {

        $corretas = $request->input('corretas');
        $incorretas = $request->input('incorretas');
        $total = $corretas + $incorretas;
        // Exibe a tela com os resultados
        return view('frontend.quiz.update', compact('corretas', 'incorretas','total'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
