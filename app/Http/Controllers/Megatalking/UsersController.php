<?php

namespace App\Http\Controllers\Megatalking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\UserRequest;
use App\Models\Megatalking\MegatalkingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = MegatalkingUser::all();
        return response()->success($users);
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $user = MegatalkingUser::create($validated->all());
        return response()->success('', "An account for <b> $user->firstname $user->lastname </b> has been created.");
    }

    public function show($id)
    {
        $user = MegatalkingUser::findOrFail($id);
        return response()->success($user);
    }

    public function update(Request $request, $id)
    {
        // this is only used to update user status
        $user = MegatalkingUser::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return response()->success('', "User $id status has been updated.");
    }

    public function destroy($id)
    {
        MegatalkingUser::destroy($id);
        return response()->success('', "User $id has been deleted.");
    }
}
