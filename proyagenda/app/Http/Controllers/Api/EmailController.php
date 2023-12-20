<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email_all = Email::all();
        return response($email_all , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:emails'
        ]);

        $email_created = Email::create([
            'email' => $request->email
        ]);

        return response($email_created , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $email = Email::find($id);
        
        if (!$email) {
            return response('El objeto ya no existe dentro de la base de datos', 404);
        }
        return response($email , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|unique:emails' 
        ]);
        
        $email = Email::find($id);
        
        if (!$email) {
            return response('El id no existe dentro de la base de datos', 404);
        }
        
        $email->email = $request->email;
        $email->save();
        return response('Actualizacion exitosa', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $email = Email::find($id);
        
        if (!$email) {
            return response('El id no existe dentro de la base de datos', 404);
        }        
        $email->delete();
        return response('Eliminacion exitosa', 200);
    }
}
