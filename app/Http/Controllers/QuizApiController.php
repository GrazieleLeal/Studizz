<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Pergunta;
use App\Models\Alternativa;
use Illuminate\Http\JsonResponse;

class QuizApiController extends Controller{
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
        //
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

    public function categoria(Request $request) {
        $user = auth()->user(); // ou $request->user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        // Obtém todas as categorias
        $categorias = Categoria::all();

        return response()->json($categorias);
    }


    public function subcategoria(Request $request, $categoria_id){

        $user = auth()->user(); // ou $request->user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        // Obtém todas as categorias
        $categoria = Categoria::find($categoria_id);
        $subcategorias = Subcategoria::where('categoria_id', $categoria_id)->get();

        return response()->json([
            'categoria' => $categoria,
            'subcategorias' => $subcategorias
        ]);

    }


    public function perguntas(Request $request){
        $request->validate([
            'numeroDePerguntas' => 'required|integer|min:1',
            'nivel' => 'required|integer',
            'subcategoria_id' => 'required|integer',
        ]);

        $numeroDePerguntas = $request->input('numeroDePerguntas');
        $nivel = $request->input('nivel');
        $subcategoriaId = $request->input('subcategoria_id');

        // Obter as perguntas aleatórias com base no nível e subcategoria
        $perguntas = Pergunta::where('nivel', $nivel)
            ->where('aprovada', 1) // Filtra apenas perguntas aprovadas
            ->whereIn('id', function ($query) use ($subcategoriaId) {
                $query->select('pergunta_id')
                    ->from('pergunta_subcategoria')
                    ->where('subcategoria_id', $subcategoriaId);
            })
            ->inRandomOrder()
            ->take($numeroDePerguntas)
            ->get();

        /*
        $resultado = $perguntas->map(function ($pergunta) {
            $pergunta->alternativas = Alternativa::where('pergunta_id', $pergunta->id)->get();
            return $pergunta;
        });
        */

        $resultado = $perguntas->map(function ($pergunta) {
            return [
                'pergunta' => [
                    'id' => $pergunta->id,
                    'imagem' => $pergunta->imagem,
                    'pergunta' => $pergunta->pergunta,
                    'nivel' => $pergunta->nivel,
                ],
                'alternativas' => Alternativa::where('pergunta_id', $pergunta->id)->get()->map(function ($alternativa) {
                    return [
                        'id' => $alternativa->id,
                        'pergunta_id' => $alternativa->pergunta_id,
                        'descricao' => $alternativa->descricao,
                        'correta' => $alternativa->correta,
                    ];
                }),
            ]; 
        });

        return response()->json($resultado);
    }

}
