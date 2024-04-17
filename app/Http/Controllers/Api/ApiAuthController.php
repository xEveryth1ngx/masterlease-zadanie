<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiAuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->safe()->only(['name', 'email', 'password']);

        if (User::where('email', $validated['email'])->exists()) {
            return response()->json([
                'message' => 'Email already exists!',
            ], Response::HTTP_CONFLICT);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'User registration failed!',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'User registered successfully!',
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->safe()->only(['email', 'password']);

        if (!auth()->attempt($validated)) {
            return response()->json([
                'message' => 'Invalid credentials!',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $validated['email'])->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'token' => $authToken,
        ]);
    }
}
