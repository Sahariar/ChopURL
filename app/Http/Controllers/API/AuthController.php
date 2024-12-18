<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function register(Request $request) {

        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name'=> $request -> name,
            'email'=> $request -> email,
            'password'=> Hash::make($request -> password),
        ]);

        return new UserResource($user);
    }

    public function login(Request $request) {

        $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',
        ]);

        $user = User::where('email' , $request->email)->first();

        if(!$user || !Hash::check($request->password , $user->password)){
            throw ValidationException::withMessages(['email' => ['The provided credential are not correct']]);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
