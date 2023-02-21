<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthenticationRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    public function login(Request $request) {
        $request->validate([
            "password" => "required",
            "name" => "required"
        ]);

        $user = User::where('name', $request->name)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 403);
        }
        $expiry = Carbon::now()->addHours(8);
        $token = $user->createToken($user->name.'-'.time(), ["*"], $expiry)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function register(AuthenticationRequest $request) {
        $validated = $request->validated();
        
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->success('', 'Registration successful. You can now login.');
    }

    public function update(Request $request, $id) {
        $user = $request->user();
        
        if ($request->has('key_for_accounts')) {
            $user->key_for_accounts = $request->key_for_accounts;
        }
        if ($request->has('tutorials')) {
            $user->tutorials = $request->tutorials;
        }
        
        $user->save();
        return response()->success('', 'User data updated.');
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->success('', 'You have logged out.');
    }
}
