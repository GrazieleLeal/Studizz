<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;
use App\Models\Pergunta;
use App\Models\PerguntaSubcategoria;

class SubcategoriaController extends Controller{
    public function index($id){
        $data = Subcategoria::where('categoria_id', $id)->get();
        $categoria = Categoria::find($id);
        return view('frontend.subcategoria.index', compact('data','id','categoria'));
    }

    public function create($id){
        return view('frontend.subcategoria.create', compact('id'));
    }

    public function store(Request $request, $id){
        $validatedData = $request->validate([
            'descricao' => 'required',
        ]);

        $subcategoria = new Subcategoria();
        $subcategoria->descricao = $request->input('descricao');
        $subcategoria->categoria_id = $id;
        $subcategoria->save();

        // Redirecionar para uma página de sucesso
        return redirect()->route('subcategoria.index',$id)->with('success', 'Subcategoria criado com sucesso');
    }

    public function show($id, $categoria_id){
        $subcategoria = Subcategoria::find($id);
        return view('frontend.subcategoria.show', compact('subcategoria','categoria_id'));
    }

    public function edit($id, $categoria_id){
        $subcategoria = Subcategoria::find($id);
        return view('frontend.subcategoria.edit', compact('subcategoria','categoria_id'));
    }

    public function update(Request $request, $id, $categoria_id){
        $subcategoria = Subcategoria::find($id);
        if ($subcategoria) {
            $subcategoria->descricao = $request->input('descricao');
            $subcategoria->save();
        } else {
            // Se não encontrar a subcategoria, você pode redirecionar ou exibir um erro
            return redirect()->route('subcategoria.index', $categoria_id)->with('error', 'Subcategoria não encontrada');
        }

        // Redirecionar para uma página de sucesso
        return redirect()->route('subcategoria.index',$categoria_id)->with('success', 'Subcategoria atualizada com sucesso');
    }

    public function destroy($id, $categoria_id){
        /*
        $subcategoria = Subcategoria::find($id);
        $subcategoria->delete();
        return redirect()->route('subcategoria.index',$categoria_id)->with('success', 'Subcategoria deletada com sucesso');
        */

        // Encontre a subcategoria
        $subcategoria = Subcategoria::find($id);


        // Deletar as perguntas associadas a esta subcategoria
        $perguntas = Pergunta::whereHas('pergunta_subcategoria', function ($query) use ($id) {
            $query->where('subcategoria_id', $id);
        })->get();

        // Para cada pergunta encontrada, deletar as alternativas associadas
        foreach ($perguntas as $pergunta) {
            // Deletar as alternativas associadas à pergunta
            $pergunta->alternativa()->delete();

            if ($pergunta->imagem && $pergunta->imagem != 'noimage.png') {
                unlink('storage/imagem_pergunta/'.$pergunta->imagem);
            }


            // Deletar a pergunta
            $pergunta->delete();
        }

         // Deletar o registro de pergunta_subcategoria (se existir)
         PerguntaSubcategoria::where('subcategoria_id', $id)->delete();


        // Finalmente, deletar a subcategoria
        $subcategoria->delete();

        // Redirecionar com sucesso
        return redirect()->route('subcategoria.index', $categoria_id)->with('success', 'Subcategoria deletada com sucesso');
    }

}
