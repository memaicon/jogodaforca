<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('name', 'asc')->paginate();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'name'  => 'required|unique:categories,name'
        ];

        $nicenames = [
            'name'  => 'Nome'
        ];

        $this->validate($request, $rules, [], $nicenames);

        $categorie = Categorie::create($data);

        flash('Categoria adicionada com sucesso.')->success()->important();

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('dashboard.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->request->all();

        $rules = [
            'name'  => 'required|unique:categories,name,'.$id
        ];

        $nicenames = [
            'name'  => 'Nome'
        ];

        $messages = [
            'name.unique'  => 'Já existe uma categoria com este nome.'
        ];

        $this->validate($request, $rules, $messages, $nicenames);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($data);

        flash('Categoria atualizada com sucesso.')->success()->important();

        return redirect()->route('categorias.index');
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

            $categorie = Categorie::findOrFail($id);
            $categorie->delete();

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
