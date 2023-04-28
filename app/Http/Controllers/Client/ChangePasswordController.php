<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\User;

class ChangePasswordController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('client.account-panel');
    }

    public function store(Request $req){
        $id = Auth::user()->user_id;

        $req->validate([
            'old_password' => ['required', 'string', new MatchOldPassword],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
        ]);

        $data = User::find($id);
        $data->password = Hash::make($req->password);
        $data->save();
    }
}
