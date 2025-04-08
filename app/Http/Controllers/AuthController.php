<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMiquiz;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user_miquiz',
            'password' => 'required|min:6',
        ]);

        $user = UserMiquiz::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user // Tambahkan data user
        ], 201);
        
    }

    public function login(Request $request)
    {
    $user = UserMiquiz::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Login berhasil',
            'user' => [
                'name' => $user->name, // Mengembalikan nama pengguna
                'email' => $user->email,
            ],
        ]);
    } else {
        return response()->json(['message' => 'Email atau password salah'], 401);
    }
    }
}

//     public function login(Request $request)
//     {
//         $user = UserMiquiz::where('email', $request->email)->first();

//         if (!$user || !Hash::check($request->password, $user->password)) {
//             return response()->json(['message' => 'Invalid email or password'], 401);
//         }

//         return response()->json(['message' => 'Login successful', 'user' => $user], 200);
//     }


