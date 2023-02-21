<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\Controller;
use App\Models\Persona\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
    private $userId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->key_for_accounts == NULL) {
                abort(403, "Key has not been set up yet.");   
            }
            $this->userId = Auth::user()->id;

            return $next($request);
        });
    }

    public function index() {
        $accounts = Account::where('user_id', $this->userId)->get();
        $grouped = $accounts->mapToGroups(function($item) {
            return [$item['type'] => $item];
        });
        
        return response()->success($grouped);
    }

    public function store(Request $request) {
        $account = new Account();
        Validator::make($request->all(), $account->rules);
        
        $request->request->add([ 'user_id' => $this->userId ]);
        $account = Account::create($request->all());

        return response()->success($account);
    }

    public function update(Request $request, $id) {
        $account = new Account();
        // Validator::make($request->all(), $account->rules);
        $account = Account::findOrFail($id);
        if ($request->has('username')) {
            $account->username = $request->username;
        }
        if ($request->has('password')) {
            $account->password = $request->password;
        }
        $account->save();

        return response()->success($account);
    }

    public function destroy($id) {
        Account::destroy($id);
        
        return response()->success(null, 'Account deleted.');
    }
}
