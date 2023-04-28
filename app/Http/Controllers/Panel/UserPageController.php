<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Program;
use Illuminate\Support\Facades\Hash;

class UserPageController extends Controller
{
    //
    public function __construct(){
       
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $programs = Program::all();
        return view('panel.user-page')
        ->with('programs', $programs);
    }

    public function indexData(Request $req){
        $sortkey = explode(".",$req->sort_by);
        return User::orderBy($sortkey[0], $sortkey[1])
        ->where('lname', 'like', $req->lname . '%')
        ->paginate($req->perpage);
    }

    public function resetPassword(Request $req, $id){
        $data = User::find($id);
        $data->password = Hash::make($req->password);
        $data->save();
        return ['status' => 'updated'];

    }

    public function create(){
        return view('panel.user-page-create');
    }

    public function destroy($id){
        User::destroy($id);

        return ['status' => 'deleted'];
    }

    public function store(Request $req){

        //validator

        $validator = $req->validate([
            'username' => ['required' , 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'fname' => ['required' , 'string', 'max:255'],
            'lname' => ['required' , 'string', 'max:255'],
            'sex' => ['required' , 'string', 'max:255'],
            'role' => ['required' , 'string', 'max:255'],            
            'civil_status' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'max:255', 'unique:users'],
            'contact_number' => ['required' , 'string', 'max:255'],
        ]);

        //insert database

        User::create([
            'username' => $req->username,
            'lname' =>strtoupper($req->lname),
            'fname' =>strtoupper($req->fname),
            'mname' =>strtoupper($req->mname),
            'sex' => $req->sex,
            'role' => $req->role,
            'suffix' => strtoupper($req->suffix),
            'civil_status' => $req->civil_status,
            'email' => $req->email,
            'fb_account'  => $req->fb_account,
            'alumni_classification' => $req->alumni_classification,
            'contact_number' => $req->contact_number,
            'password' =>  Hash::make($req->password),
        ]);

    }

    public function edit($id){
        $programs = Program::all();
        $user = User::find($id);
        return view ('panel.user-edit')
        ->with('user',$user)
        ->with('programs', $programs);
    }

//    public function updateWithImage(Request $req){
//        return $req;
//    }

    public function updateWithImage(Request $req, $id){

        $file = $req->file('profile_image');

        if($file){
            $file_path = $file->store('public/profile_image');
            $file_explode = explode('/', $file_path);
            $file_path = 'storage/' . $file_explode[1] . '/' .$file_explode[2];
        }

        $data = User::find($id);
        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->sex = $req->sex;
        $data->role = $req->role;
        $data->alumni_classification = $req->alumni_classification;
        $data->fb_account = $req->fb_account;
        $data->civil_status = $req->civil_status;
        $data->suffix = $req->suffix;
        $data->email = $req->email;

        if($file){
            $data->profile_image = $file_path;
        }

        $data->contact_number = $req->contact_number;
        $data->program = $req->program;
        $data->year_graduated = $req->year_graduated;
        $data->save();

        return ['status' => 'updated'];
    }

}
