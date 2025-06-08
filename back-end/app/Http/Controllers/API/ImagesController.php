<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
           /**
     * Display a listing of the resource.
     */
    #Retorna todos os contatos da tabela
    public function index()
    {
         $image = Image::all();
         return response()->json(['message' => 'Success:', 'data' => $image], 200);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(ImageRequest $request)
    {
        $file_path = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'local' => $request->local,
            'description' => $request->description,
            'placeholder' => $request->placeholder,
            'image' => $file_path,
            'news_id' => $request->news_id
        ]);
        return response()->json(['message' => 'Image Created','data' => $image], 201);
    }


    /**
     * Display the specified resource.
     */
    #busca por um contato em específico
    public function show(string $id)
    {
        $image = Image::find($id);
        if (!$image)
            return response()->json(['message' => 'Image not found','data' => null], 404);
        return response()->json(['message' => 'Success:','data' => $image], 200);
    }


    /**
    * Update the specified resource in storage.
    */
   public function update(ImageRequest $request, string $id)
{
    $image = Image::find($id);
    if (!$image) {
        return response()->json([
            "message" => 'Imagem não encontrada',
            "data" => null 
        ], 404);
    }

    $file_path = $image->image;

    if ($request->hasFile('image')) {
        if (\Storage::disk('public')->exists($image->image)) {
            \Storage::disk('public')->delete($image->image);
        }
        $file_path = $request->file('image')->store('images', 'public');
    }

    $image->update([
        'local' => $request->local,
        'description' => $request->description,
        'placeholder' => $request->placeholder,
        'image' => $file_path,
        'news_id' => $request->news_id
    ]);

    return response()->json([
        "message" => 'Imagem atualizada',
        "data" => $image
    ], 200);
}

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
    $image = Image::find($id);
    if (!$image)
        return response()->json(['message' => 'Image not found','data' => null], 404);
    $image->delete();
    return response()->json(['message' => 'Success:','data' => $image], 200);
    }

}
