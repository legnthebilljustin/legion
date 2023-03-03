<?php

namespace App\Http\Controllers\Megatalking;

use App\Http\Controllers\Controller;
use App\Models\Megatalking\MegatalkingUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'username' => 'min:8|max:16|required',
            'password' => 'min:8|max:16|required'
        ]);

        // make a request to this before login for x-srf '/sanctum/csrf-cookie'
        $user = MegatalkingUser::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->error('User records not found in the database.', 404);
        }

        $abilities = $this->attach_abilities($user->role);
        $expiry = Carbon::now()->addHours(8);
        $token = $user->createToken($user->username, $abilities, $expiry)->plainTextToken;
        
        return response()->success(['user' => $user, 'token' => $token]);
    }

    private function attach_abilities($role) {
        $abilities = [
            'dev' => ['server:*', 'data:*', 'user:*'],
            'admin' => ['data:delete', 'data:create', 'data:update', 'user:*'],
            'editor' => ['data:*'],
            'guest' => ['data:read']
        ];

        return $abilities[$role];
    }
}
