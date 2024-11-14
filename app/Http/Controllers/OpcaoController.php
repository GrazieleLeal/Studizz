<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Pergunta;

class OpcaoController extends Controller{
    public function index(){
        $data = Categoria::paginate(6);
        //$data = Categoria::all();//joga todos os produtos da tabela em data
        return view('frontend.opcao.index')->with('data', $data);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(string $id){
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
        return view('frontend.opcao.show', compact('id', 'categoria','subcategoria','numPerguntas','perguntas'));
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
}
