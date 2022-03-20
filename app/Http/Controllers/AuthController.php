<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Data\UserData;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, UserRepository $userRepository)
    {
        $user = $userRepository->create($request);

        return UserData::from($user);
     
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Model not found'
            ],404);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ],404);
        }

        $data = UserData::from($user);

        return response()->json([
            'data' => $data,
            'token' => $user->createToken('User-Token')->plainTextToken,
        ]);
    }

}


