<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\ResponseResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $data = $request->data();
        $user = User::query()
            ->where('email', $data['email'])
            ->first();

        if(!Hash::check($data['password'], $user->password)) {
            return new ResponseResource([
                'message' => 'Akun tidak ditemukan'
            ]);
        }

        $token = $user->createToken('kelaskiwari');

        return new ResponseResource([
            'token' => $token->plainTextToken,
            'user' => $user
        ]);
    }
}
