<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAPIRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends ApiBaseController
{
    public function register(RegisterAPIRequest $request)
    {

        $postData = $request->validated();

        $user = User::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'password' => Hash::make($postData['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        $responseData = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->sendResponse($responseData, "Registered successfully");
    }

    public function login(Request $request)
    {
        if (!\Auth::attempt($request->only('email', 'password'))) {
            return $this->sendError('Login information is invalid.', [], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;

        $responseData = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->sendResponse($responseData, "Logged-in");
    }
}
