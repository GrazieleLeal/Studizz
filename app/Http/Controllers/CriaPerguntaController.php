<?php

namespace App\Http\Controllers;
use App\Models\Pergunta;
use App\Models\Alternativa;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CriaPerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Produto::latest()->paginate(5);//joga os ultimos 5 elementos em data
        //return view('produtos.index', compact('data'))->with('i', (request()->input('page', 1) - 1 * 5));

        $data = Pergunta::all();//joga todos os produtos da tabela em data
        return view('frontend.criaPergunta.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.criaPergunta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pergunta' => 'required',
            'nivel' => 'required',
            'descricao' => 'required',
            'correta' => 'required'
        ]);

        //Produto::create($request->all());//pega todos os dados

        Pergunta::create([
            'usuario_id' => auth()->user()->id,
            'pergunta' => $request["pergunta"],
            'nivel' => $request["nivel"],
            'aprovada' => 0
        ]);

        $alternativas = [];
        foreach ($request->input('alternativas') as $alternativa) {

            $alternativas[] = Alternativa::create([
                'pergunta_id' => $pergunta->id,
                'descricao' => $alternativa['descricao'],
                'correta' => $alternativa['correta'],
            ]);
        }
/*
        Alternativa::create([
            'pergunta_id' => $pergunta->id,
            'descricao' => $request["pergunta"],
            'correta' => $request["nivel"],
        ]);
*/
        return redirect()->route('criapergunta.index')->with('success', 'Produto criado com sucesso');
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
