<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrationPageController extends Controller
{
    //

    public function index(){
        return view('client.registration-page');
    }

    
    protected function store(Request $req){

        $validator = $req->validate([
            'username' => ['required' , 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'fname' => ['required' , 'string', 'max:255'],
            'lname' => ['required' , 'string', 'max:255'],
            'sex' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'max:255', 'unique:users'],
            'contact_number' => ['required' , 'string', 'max:255'],
        ]);

        User::create([
            'username' => $req->username,
            'lname' =>strtoupper($req->lname),
            'fname' =>strtoupper($req->fname),
            'mname' =>strtoupper($req->mname),
            'sex' => $req->sex,
            'role' => 'ALUMNI',
            'email' => $req->email,
            'alumni_classification' => $req->alumni_classification,
            'suffix' => strtoupper($req->suffix),
            'civil_status' => $req->civil_status,
            'contact_number' => $req->contact_number,
            'password' =>  Hash::make($req->password),
        ]);

        return ['status' => 'saved'];
    }

}
