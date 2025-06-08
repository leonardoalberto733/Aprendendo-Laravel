<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jornalist;
use App\Http\Requests\JornalistRequest;
use App\Models\News;

class JornalistsController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    #Retorna todos os contatos da tabela
    public function index()
    {
         $jornalist = Jornalist::all();
         return response()->json(['message' => 'Success:', 'data' => $jornalist], 200);
    }


    /**
    * Store a newly created resource in storage.
    */
 public function store(JornalistRequest $request)
{
    // Verifica se o campo 'news_id' existe e é um array
    if (!$request->has('news_id') || !is_array($request->news_id)) {
        return response()->json(["message" => 'Notícia(s) não encontrada(s)'], 404);
    }

    // Valida se cada news_id existe no banco
    foreach ($request->news_id as $news_id) {
        if (!News::find($news_id)) {
            return response()->json(["message" => 'Notícia não encontrada: ID ' . $news_id], 404);
        }
    }

    // Cria o jornalista
    $jornalist = Jornalist::create($request->all());

    // Faz o vínculo na tabela pivô
    $jornalist->news()->attach($request->news_id);

    return response()->json([
        'message' => 'Jornalista criado com sucesso',
        'data' => $jornalist
    ], 201);
}



    /**
     * Display the specified resource.
     */
    #busca por um contato em específico
    public function show(string $id)
    {
        $jornalist = Jornalist::find($id);
        if (!$jornalist)
            return response()->json(['message' => 'Jornalist not found','data' => null], 404);
        return response()->json(['message' => 'Success:','data' => $jornalist], 200);
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(JornalistRequest $request, string $id)
    {
        $jornalist = Jornalist::find($id);
        if (!$jornalist)
            return response()->json(['message' => 'Jornalist not Found','data' => null], 404);
        $jornalist->update($request->all());
        return response()->json(['message' => 'Success:','data' => $jornalist], 200);
    }

    public function updte(JornalistRequest $request, string $id){
        if(!$request->news_id)
            return response()->json(["message" => 'Noticia nao encontrada'], 404);

        foreach($request->news_id as $news_id){
            if(!$News::find($news_id))
                return response()->json(["message" => 'Noticia nao encontrada'], 404);
        }
        $jornalist->update($request->all());
        $jornalist->news()->sync($request->news_id);
        return response()->json(["message" => 'Jornalista atualizado', "data" => $jornalist], 200);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
    $jornalist = Jornalist::find($id);
    if (!$jornalist)
        return response()->json(['message' => 'Jornalist not found','data' => null], 404);
    $jornalist->delete();
    return response()->json(['message' => 'Success:','data' => $jornalist], 200);
    }
}
