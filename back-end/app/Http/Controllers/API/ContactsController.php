<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #Retorna todos os contatos da tabela
    public function index()
    {
         $contact = Contacts::all();
         return response()->json(['message' => 'Success:', 'data' => $contact], 200);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(ContactRequest $request)
    {
        $contact = Contacts::create($request->all());
        return response()->json(['message' => 'Contact Created','data' => $contact], 201);
    }


    /**
     * Display the specified resource.
     */
    #busca por um contato em específico
    public function show(string $id)
    {
        $contact = Contacts::find($id);
        if (!$contact)
            return response()->json(['message' => 'Contact not found','data' => null], 404);
        return response()->json(['message' => 'Success:','data' => $contact], 200);
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(ContactRequest $request, string $id)
    {
    $contact = Contacts::find($id);
    if (!$contact)
        return response()->json(['message' => 'Contact not Found','data' => null], 404);
    $contact->update($request->all());
    return response()->json(['message' => 'Success:','data' => $contact], 200);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
    $contact = Contacts::find($id);
    if (!$contact)
        return response()->json(['message' => 'Contact not found','data' => null], 404);
    $contact->delete();
    return response()->json(['message' => 'Success:','data' => $contact], 200);
    }
}
