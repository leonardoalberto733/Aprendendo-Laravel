<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewRequest;

class NewsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    #Retorna todos os contatos da tabela
    public function index()
    {
         $new = News::all();
         return response()->json(['message' => 'Success:', 'data' => $new], 200);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(NewRequest $request)
    {
        $new = News::create($request->all());
        return response()->json(['message' => 'New Created','data' => $new], 201);
    }


    /**
     * Display the specified resource.
     */
    #busca por um contato em específico
    public function show(string $id)
    {
        $new = News::find($id);
        if (!$new)
            return response()->json(['message' => 'New not Found','data' => null], 404);
        return response()->json(['message' => 'Success:','data' => $new], 200);
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(NewRequest $request, string $id)
    {
    $new = News::find($id);
    if (!$new)
        return response()->json(['message' => 'New not Found','data' => null], 404);
    $new->update($request->all());
    return response()->json(['message' => 'Success:','data' => $new], 200);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
    $new = News::find($id);
    if (!$new)
        return response()->json(['message' => 'New not Found','data' => null], 404);
    $new->delete();
    return response()->json(['message' => 'Success:','data' => $new], 200);
    }
}
