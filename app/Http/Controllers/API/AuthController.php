<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'email|required|unique:users|max:255',
            'password' => 'required|min:4'
        ]);

        User::query()->create($validatedData);

        return response()->json([
            'message'=>'User successfully registered'],201);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'email|required|exists:users,email|max:255',
            'password' => 'required|min:4'
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect'], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'User successfully logged in',
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'User successfully logged out'],200);
    }
}
