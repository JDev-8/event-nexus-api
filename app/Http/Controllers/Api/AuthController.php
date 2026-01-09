<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'nullable|string',
      ]);

      $user = User::where('email', $request->email)->first();

      if(!$user || !Hash::check($request->password, $user->password)){
        throw ValidationException::withMessages([
          'email' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
      }

      $token = $user->createToken($request->device_name ?? 'api-client')->plainTextToken;

      return response()->json([
        'message' => 'Login exitoso',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $user->email,
          'role' => $user->role,
        ]
      ]);
    }

    public function logout(Request $request){
      $request->user()->currentAccessToken()->delete();

      return response()->json([
        'message' => 'Sesión cerrada con éxito'
      ]);
    }
}
