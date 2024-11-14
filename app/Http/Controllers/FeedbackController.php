<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller{

    public function index(){
        if(auth()->user()->papel_id == 1){
            $papel = auth()->user()->papel_id;
            $data = Feedback::all();
            return view('frontend.feedback.index', compact('data','papel'));
        }else{
            $papel = auth()->user()->papel_id;
            $data = Feedback::where('usuario_id', auth()->id())->get();
            return view('frontend.feedback.index', compact('data','papel'));
        }
    }

    public function create(){
        return view('frontend.feedback.create');
    }

    public function store(Request $request){
        $request->validate([
            'descricao' => 'required',
        ]);

        //Feedback::create($request->all());//pega todos os dados

        Feedback::create([
            'descricao' => $request["descricao"],
            'usuario_id' => auth()->user()->id
        ]);

        return redirect()->route('feedback.create')->with('success', 'Feedback criado com sucesso');
    }

    public function show(string $id){
        $feedback = Feedback::find($id);
        return view('frontend.feedback.show', compact('feedback'));
    }

    public function edit(string $id){
        $feedback =  Feedback::find($id);
        return view('frontend.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, string $id){
        $request->validate([
            'descricao' => 'required',
        ]);
        $feedback = Feedback::find($id);
        $feedback->descricao = $request->input('descricao');
        $feedback->save();
        return redirect()->route('feedback.index')->with('success', 'Feedback atualizado com sucesso');
    }

    public function destroy(Feedback $feedback){
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deletado com sucesso');
    }
}
