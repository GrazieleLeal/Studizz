<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Pergunta;
use App\Models\PerguntaSubcategoria;
use App\Models\Alternativa;

class CategoriaController extends Controller{

    public function index(){
        $data = Categoria::with('subcategoria')->get();
        return view('frontend.categoria.index', compact('data'));
    }

    public function create(){
        return view('frontend.categoria.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoria' => 'required',
            'descricao' => 'required',
            'imagem_categoria' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('imagem_categoria')){
            $filenameWithExt = $request->file('imagem_categoria')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem_categoria')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imagem_categoria')->storeAs('imagem_categoria',$fileNameToStore,'public');
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $categoria = new Categoria();
        $categoria->categoria = $request->input('categoria');
        $categoria->descricao = $request->input('descricao');
        $categoria->imagem = $fileNameToStore;
        $categoria->save();

        // Redirecionar para uma página de sucesso
        return redirect()->route('categoria.index')->with('success', 'Categoria criado com sucesso');
    }

    public function show(string $id){
        $categoria = Categoria::find($id);
        return view('frontend.categoria.show',compact('categoria'));
    }

    public function edit(string $id){
        $categoria = Categoria::find($id);
        return view('frontend.categoria.edit',compact('categoria'));
    }

    public function update(Request $request, string $id){
        $categoria = Categoria::find($id);

        if($request->hasFile('imagem_categoria')){
            unlink('storage/imagem_categoria/'.$categoria->imagem);
            $filenameWithExt = $request->file('imagem_categoria')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem_categoria')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imagem_categoria')->storeAs('imagem_categoria',$fileNameToStore,'public');
        } else {
            $fileNameToStore = 'noimage.png';
        }


        $categoria->categoria = $request->input('categoria');
        $categoria->descricao = $request->input('descricao');
        $categoria->imagem = $fileNameToStore;

        $categoria->save();

        // Redirecionar para uma página de sucesso
        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        unlink('storage/imagem_categoria/'.$categoria->imagem);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoria deletada com sucesso');
    }
    */
    public function destroy(string $id){
        // Buscar a categoria
        $categoria = Categoria::find($id);


        // Deletar subcategorias da categoria
        $subcategorias = Subcategoria::where('categoria_id', $categoria->id)->get();
        foreach ($subcategorias as $subcategoria) {
            // Deletar relação pergunta_subcategoria
            $perguntaSubcategorias = PerguntaSubcategoria::where('subcategoria_id', $subcategoria->id)->get();

            foreach ($perguntaSubcategorias as $perguntaSubcategoria) {
                // Deletar alternativas da pergunta
                $pergunta = Pergunta::find($perguntaSubcategoria->pergunta_id);
                Alternativa::where('pergunta_id', $pergunta->id)->delete();
                if ($pergunta->imagem && $pergunta->imagem != 'noimage.png') {
                    unlink('storage/imagem_pergunta/'.$pergunta->imagem);
                }
                // Deletar a pergunta
                $pergunta->delete();
            }

            // Deletar a relação pergunta_subcategoria
            PerguntaSubcategoria::where('subcategoria_id', $subcategoria->id)->delete();

            // Deletar a subcategoria
            $subcategoria->delete();
        }


        // Deletar a imagem da categoria
        unlink('storage/imagem_categoria/'.$categoria->imagem);

        // Deletar a categoria
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoria deletada com sucesso');
    }

}
