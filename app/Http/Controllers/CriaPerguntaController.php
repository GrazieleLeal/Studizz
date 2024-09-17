<?php

namespace App\Http\Controllers;
use App\Models\Pergunta;
use App\Models\Alternativa;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\PerguntaSubcategoria;

use Illuminate\Http\Request;

class CriaPerguntaController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //$data = Produto::latest()->paginate(5);//joga os ultimos 5 elementos em data
        //return view('produtos.index', compact('data'))->with('i', (request()->input('page', 1) - 1 * 5));

        //$data = Pergunta::all();//joga todos os produtos da tabela em data
        //return view('frontend.criaPergunta.index', compact('data'));

        $data = Pergunta::where('users_id', auth()->id())->get();
        return view('frontend.criaPergunta.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view('frontend.criaPergunta.create', compact('categorias','subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Validar os dados de entrada

        $validatedData = $request->validate([
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'nivel' => 'required|in:1,2,3',
            'pergunta' => 'required',
            'alternativas' => 'required|array',
            'alternativas.*.correta' => 'required|in:0,1',
        ]);

        // Criar a pergunta
        $pergunta = new Pergunta();
        $pergunta->users_id = auth()->id();
        $pergunta->nivel = $request->input('nivel');
        $pergunta->pergunta = $request->input('pergunta');
        $pergunta->imagem = $request->input('imagem');
        $pergunta->aprovada = null;
        $pergunta->save();

        // Criar a relação entre a pergunta e a subcategoria
        $perguntaSubcategoria = new PerguntaSubcategoria();
        $perguntaSubcategoria->pergunta_id = $pergunta->id;
        $perguntaSubcategoria->subcategoria_id = $request->input('subcategoria_id');
        $perguntaSubcategoria->save();

        foreach ($alternativas = $request->input('alternativas') as $alternativa) {
            if (!empty($alternativa['descricao'])) {
                // Insere a alternativa no banco de dados
                Alternativa::create([
                    'pergunta_id' => $pergunta->id,
                    'descricao' => $alternativa['descricao'],
                    'correta' => $alternativa['correta'],
                ]);
            }
        }
        // Redirecionar para uma página de sucesso
        return redirect()->route('criaPergunta.index')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
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
        return view('frontend.criaPergunta.show', compact('pergunta', 'alternativas','niveis','categoria','subcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pergunta = Pergunta::find($id);
        $alternativas = Alternativa::where('pergunta_id', $id)->get();
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view('frontend.criaPergunta.edit', compact('pergunta','alternativas','categorias','subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        // Validar os dados de entrada

        $validatedData = $request->validate([
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'nivel' => 'required|in:1,2,3',
            'pergunta' => 'required',
            'alternativas' => 'required|array',
            //'alternativas.*.descricao' => 'required|string',
            'alternativas.*.correta' => 'required|in:0,1',
        ]);

         // Atualizar a pergunta
        $pergunta->nivel = $request->input('nivel');
        $pergunta->pergunta = $request->input('pergunta');
        $pergunta->imagem = $request->input('imagem');
        $pergunta->aprovada = null;
        $pergunta->save();

        foreach ($alternativas = $request->input('alternativas') as $alternativa) {
            if (!empty($alternativa['descricao'])) {
                // Insere a alternativa no banco de dados
                Alternativa::update([
                    'pergunta_id' => $pergunta->id,
                    'descricao' => $alternativa['descricao'],
                    'correta' => $alternativa['correta'],
                ]);
            }
        }

        foreach ($alternativas = $request->input('alternativas') as $alternativa) {
            if (!empty($alternativa['descricao'])) {
                // Atualizar a alternativa existente ou criar uma nova
                $alternativaExistente = Alternativa::where('pergunta_id', $pergunta->id)
                    ->where('descricao', $alternativa['descricao'])
                    ->first();
                if ($alternativaExistente) {
                    $alternativaExistente->correta = $alternativa['correta'];
                    $alternativaExistente->save();
                } else {
                    Alternativa::create([
                        'pergunta_id' => $pergunta->id,
                        'descricao' => $alternativa['descricao'],
                        'correta' => $alternativa['correta'],
                    ]);
                }
            }
        }

        // Redirecionar para uma página de sucesso
        return redirect()->route('criaPergunta.index')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        /*
        $pergunta->delete();
        $ps->delete();
        $alternativa->delete();
        return redirect()->route('criaPergunta.index')->with('success', 'Produto deletado com sucesso');
        */

        $pergunta = Pergunta::find($id);
        //if ($pergunta) {
            $alternativas = $pergunta->alternativas;
            if ($alternativas) {
                foreach ($alternativas as $alternativa) {
                    $alternativa->delete();
                }
            }

            PerguntaSubcategoria::where('pergunta_id', $pergunta->id)->delete();

            $pergunta->delete();
            return redirect()->route('criaPergunta.index')->with('success', 'Pergunta deletada com sucesso');
        //} else {
            //return redirect()->route('criaPergunta.index')->with('error', 'Pergunta não encontrada');
        //}

    }

    public function getSubcategorias(Request $request){
        $categoria_id = $request->input('categoria_id');
        $subcategorias = Subcategoria::where('categoria_id', $categoria_id)->get();
        return response()->json($subcategorias);
    }
    public function getSubcategoriasByCategoria($categoria_id){
        $subcategorias = Subcategoria::where('categoria_id', $categoria_id)->get();
        return response()->json($subcategorias);
    }
}
