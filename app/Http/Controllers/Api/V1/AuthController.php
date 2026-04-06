<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8'
        ]);

        $authenticated = Auth::attempt($validated);

        if(!$authenticated) 
            {
                return response()->json(['message' => 'Credenciais Inválidas'], 422);
            }
            
        $user = Auth::user();
        $token = $user->createToken('login_token')->plainTextToken;

        return response()->json([
            'user' => $user->name,
            'token' => $token
        ], 200);

     }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
