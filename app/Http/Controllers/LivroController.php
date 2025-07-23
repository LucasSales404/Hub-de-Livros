<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        return view("index", compact("livros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
public function store(LivroRequest $request)
{
    $pdfPath = null;
    $capaPath = null;

    if ($request->hasFile('arquivo')) {
        $pdfPath = $request->file('arquivo')->store('books', 'public');
    }

    if ($request->hasFile('capa')) {
        $capaPath = $request->file('capa')->store('images', 'public');
    }

    Livro::create([
        'titulo' => $request->titulo,
        'arquivo' => $pdfPath,
        'capa' => $capaPath,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Livro cadastrado com sucesso!',
    ]);
}



    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livro $livro)
    {
        $livro->fill($request->except(['capa', 'arquivo']));
        if($request->hasFile('capa')){
            $capaPath = $request->file('capa')->store('images', 'public');
            $livro->capa = $capaPath;
        }

        if($request->hasFile('arquivo')){
            $pdfPath = $request->file('arquivo')->store('books', 'public');
            $livro->arquivo = $pdfPath;
        }
        $success = $livro->save();

        return response()->json([
            'success'=> $success,
            'message'=> $success ? 'Livro atualizado com sucesso!' : 'Erro ao atualizar livro',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return response()->json([
        'success' => true,
        'message' => 'Livro deletado com sucesso!'
    ]);
    }
}
