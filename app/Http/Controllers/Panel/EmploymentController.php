<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employment;

class EmploymentController extends Controller
{

    public function __construct()
    {
        # code...
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(){
        return view('panel.employment-page');
    }

    public function edit($id){
        
    $user = Employment::where('user_id', $id)->first();
     $user;

        return view ('panel.employment-page')
        ->with('user',$user);
    }
    // public function indexData(){
    //     return User::all();
    // }

    public function update(Request $req, $id){

        
        $data=Employment::find($id);
        
        
        $data->is_employed = $req->is_employed;
        $data->organization = $req->organization;
        $data->designation = $req->designation;
        $data->year_from = $req->year_from;
        $data->year_to = $req->year_to;
        $data->current_job = $req->current_job;
        //work
        $data->employment_type = $req->employment_type;
        $data->occupation_type = $req->occupation_type;
        $data->is_first_job = $req->is_first_job;
        $data->take_job = $req->take_job;
        $data->monthly_range = $req->monthly_range;

        $data->satisfy_job = $req->satisfy_job;
        $data->growth = $req->growth;
        $data->degree_earned = $req->degree_earned;
        
        $data->save();
        return ['status' => 'updated'];
        

    }
}
