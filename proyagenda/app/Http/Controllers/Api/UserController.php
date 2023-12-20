<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
          $username = $request->input('name');
          $password = $request->input('password');
  
          $user = User::where('name', $username)->first();
  
          if (!$user || !Hash::check($password, $user->password)) {
              return response()->json(['error' => 'Credenciales inválidas'], 401);
          }
          return response()->json(['message' => 'Usuario registrado con éxito' , 'result' =>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
