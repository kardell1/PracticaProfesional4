<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $contact_all = Contact::all();
        $contact_all = Contact::with(['tags', 'emails', 'phones'])->get();
        return response($contact_all , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $contacto_created = Contact::create([
            'direction' => $request->direction,
            'gener' => $request->gener
        ]);
        $tags = $request->tags;
        $contacto_created->tags()->attach($tags);

        $email = $request->email;
        $contacto_created->emails()->create(['email' => $email]);

        $phones = $request->phones;
        $contacto_created->phones()->createMany($phones);

        return response($contacto_created , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $contact = Contact::find($id);
        $contact = Contact::with(['tags', 'emails', 'phones'])->find($id);        
        if (!$contact) {
            return response('El objeto ya no existe dentro de la base de datos', 404);
        }
        return response($contact , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'direction' => 'sometimes|string',
            'gener' => 'sometimes|in:male,famale,other',
            'tags' => 'sometimes|array',
            'email' => 'sometimes|string|email',
            'phones' => 'sometimes|array',
        ]);
        
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response('El id no existe dentro de la base de datos', 404);
        }
        // se supone que recibire un json con todos los datos requeridos para actualizar la base de datos
        
        $contact->update([
            'direction' => $request->direction,
            'gener' => $request->gener,
        ]);
        $contact->phones()->delete();
        // Actualizar tags asociados al contacto (relación muchos a muchos)
        if ($request->has('tags')) {
            $tags = $request->tags;
            $contact->tags()->sync($tags);
        }

        // Actualizar email asociado al contacto (relación uno a uno)
        if ($request->has('emails')) {
            $email = $request->email;
            $contact->email()->update(['email' => $email]);
        }

        // Actualizar phones asociados al contacto (relación uno a muchos)
        if ($request->has('phones')) {
            $phonesData = $request->phones;
            foreach ($phonesData as $phoneData) {
                $contact->phones()->updateOrCreate(
                    ['cellphone' => $phoneData['cellphone']], 
                );
            }            
        }

        $contact->save();
        return response('Actualizacion exitosa', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response('El id no existe dentro de la base de datos', 404);
        }        
        $contact->delete();
        return response('Eliminacion exitosa', 200);
    }
}
