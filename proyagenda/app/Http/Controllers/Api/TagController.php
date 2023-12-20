<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag_all = Tag::all();
        return response($tag_all , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

        $tag_created = Tag::create([
            'name' => $request->name
        ]);

        return response($tag_created , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::find($id);
        
        if (!$tag) {
            return response('El objeto ya no existe dentro de la base de datos', 404);
        }
        return response($tag , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:tags' 
        ]);
        
        $tag = Tag::find($id);
        
        if (!$tag) {
            return response('El id no existe dentro de la base de datos', 404);
        }
        
        $tag->name = $request->name;
        $tag->save();
        return response('Actualizacion exitosa', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        
        if (!$tag) {
            return response('El id no existe dentro de la base de datos', 404);
        }        
        $tag->delete();
        return response('Eliminacion exitosa', 200);
    }
}
