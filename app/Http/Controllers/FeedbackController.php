<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.feedback.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
        ]);

        //Feedback::create($request->all());//pega todos os dados

        Feedback::create([
            'descricao' => $request["descricao"],
            'usuario_id' => auth()->user()->id
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descricao' => 'required',

        ]);

        //Produto::update($request->all());//pega todos os dados

        Feedback::create([
            'descricao' => $request["descricao"],
            'usuario_id' => auth()->user()->id
        ]);
        return redirect()->route('feedback.index')->with('success', 'Produto atusalizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso');
    }
}
