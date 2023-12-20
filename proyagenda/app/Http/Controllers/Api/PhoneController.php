<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phone_all = Phone::all();
        return response($phone_all , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cellphone' => 'required|unique:phones'
        ]);

        $phone_created = Phone::create([
            'cellphone' => $request->cellphone
        ]);

        return response($phone_created , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phone = Phone::find($id);
        
        if (!$phone) {
            return response('El objeto ya no existe dentro de la base de datos', 404);
        }
        return response($phone , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cellphone' => 'required|unique:phones' 
        ]);
        
        $phone = Phone::find($id);
        
        if (!$phone) {
            return response('El id no existe dentro de la base de datos', 404);
        }
        
        $phone->cellphone = $request->cellphone;
        $phone->save();
        return response('Actualizacion exitosa', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phone = Phone::find($id);
        
        if (!$phone) {
            return response('El id no existe dentro de la base de datos', 404);
        }        
        $phone->delete();
        return response('Eliminacion exitosa', 200);
    }
}
