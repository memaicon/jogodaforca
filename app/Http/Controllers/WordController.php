<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::orderBy('name', 'asc')->paginate();
        return view('dashboard.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();

        $rules = [
            'name'  => 'required',
            'tip_phrase'  => 'required',
            'categorie_id'  => 'required',
        ];

        $nicenames = [
            'name'  => 'Nome',
            'tip_phrase'  => 'Frase de Dica',
            'categorie_id'  => 'Categoria',
        ];

        $this->validate($request, $rules, [], $nicenames);

        $categorie = Word::create($data);

        flash('Palavra adicionada com sucesso.')->success()->important();

        return redirect()->route('palavras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::findOrFail($id);

        return view('dashboard.words.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->request->all();

        $rules = [
            'name'  => 'required',
            'tip_phrase'  => 'required',
            'categorie_id'  => 'required',
        ];

        $nicenames = [
            'name'  => 'Nome',
            'tip_phrase'  => 'Frase de Dica',
            'categorie_id'  => 'Categoria',
        ];

        $this->validate($request, $rules, [], $nicenames);

        $word = Word::findOrFail($id);
        $word->update($data);

        flash('Palavra atualizada com sucesso.')->success()->important();

        return redirect()->route('palavras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $word = Word::findOrFail($id);
            $word->delete();

            return response()->json([
                'code' => 200,
                'message' => 'Removido com sucesso!'
            ]);

        } catch(Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => $e->getMessage()
            ]);
        }
    }
}
