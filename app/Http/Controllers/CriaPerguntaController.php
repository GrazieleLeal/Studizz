<?php

namespace App\Http\Controllers;
use App\Models\Pergunta;
use App\Models\Alternativa;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\PerguntaSubcategoria;

use Illuminate\Http\Request;

class CriaPerguntaController extends Controller{

    public function index(){
        $data = Pergunta::where('users_id', auth()->id())->get();
        return view('frontend.criaPergunta.index', compact('data'));
    }

    public function create(){
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view('frontend.criaPergunta.create', compact('categorias','subcategorias'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'nivel' => 'required|in:1,2,3',
            'pergunta' => 'required',
            'alternativas' => 'required|array',
            'alternativas.*.correta' => 'required|in:0,1',
        ]);

        if($request->hasFile('imagem_pergunta')){
            $filenameWithExt = $request->file('imagem_pergunta')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem_pergunta')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imagem_pergunta')->storeAs('imagem_pergunta',$fileNameToStore,'public');
        } else {
            $fileNameToStore = null;
        }

        // Criar a pergunta
        $pergunta = new Pergunta();
        $pergunta->users_id = auth()->id();
        $pergunta->nivel = $request->input('nivel');
        $pergunta->pergunta = $request->input('pergunta');
        $pergunta->imagem = $fileNameToStore;
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
        return redirect()->route('criaPergunta.index')->with('success', 'Pergunta criada com sucesso');
    }

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

    public function edit(string $id){
        $pergunta = Pergunta::find($id);
        $alternativas = Alternativa::where('pergunta_id', $id)->get();
        $numAlternativa = $alternativas->count();
        $categorias = Categoria::all();
        $subcategoriaSelecionada = $pergunta->pergunta_subcategoria->first()->subcategoria;
        $categoriaSelecionada = $subcategoriaSelecionada->categoria;
        $subcategorias = Subcategoria::all();
        return view('frontend.criaPergunta.edit', compact('pergunta','alternativas','categorias','subcategorias','numAlternativa','categoriaSelecionada','subcategoriaSelecionada'));
    }

    public function update(Request $request, string $id){
        $pergunta = Pergunta::find($id);
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

        if($request->hasFile('imagem_pergunta')){
            // Verifique se já existe uma imagem e exclua-a
            if ($pergunta->imagem && $pergunta->imagem != 'noimage.png') {
                unlink('storage/imagem_pergunta/'.$pergunta->imagem);
            }
            $filenameWithExt = $request->file('imagem_pergunta')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem_pergunta')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('imagem_pergunta')->storeAs('imagem_pergunta', $fileNameToStore, 'public');
        } else {
            $fileNameToStore = $pergunta->imagem; // Mantém a imagem antiga se não houver nova
        }

         // Atualizar a pergunta
        $pergunta->nivel = $request->input('nivel');
        $pergunta->pergunta = $request->input('pergunta');
        $pergunta->imagem = $fileNameToStore;
        $pergunta->aprovada = null;
        $pergunta->save();

        foreach ($request->input('alternativas') as $alternativa) {
            if (!empty($alternativa['descricao'])) {
                // Verifica se a alternativa já existe
                $alternativaExistente = Alternativa::where('pergunta_id', $pergunta->id)
                    ->where('descricao', $alternativa['descricao'])
                    ->first();

                if ($alternativaExistente) {
                    // Atualiza a alternativa existente
                    $alternativaExistente->correta = $alternativa['correta'];
                    $alternativaExistente->save();
                } else {
                    // Cria uma nova alternativa
                    Alternativa::create([
                        'pergunta_id' => $pergunta->id,
                        'descricao' => $alternativa['descricao'],
                        'correta' => $alternativa['correta'],
                    ]);
                }
            }

        }

        // Redirecionar para uma página de sucesso
        return redirect()->route('criaPergunta.index')->with('success', 'Pergunta atualizada com sucesso');
    }

    public function destroy(string $id){

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
