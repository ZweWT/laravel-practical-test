<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    public function create($request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }

    public function update($request){
        $user = $request->user();   
        $user->nickname = $request->nickname;
        $user->DOB = $request->DOB;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->save();

        return $user;
    }
}