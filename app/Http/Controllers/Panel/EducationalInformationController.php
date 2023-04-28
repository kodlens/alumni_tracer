<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationalInformationController extends Controller
{
    //
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        return view ('panel.education-page');
    }

   

    public function getEducations($id){
        $data = Education::where('user_id', $id)->get();
        return view ('panel.education-page')
        ->with('educations', $data)
        ->with('id',$id);
        
        

    }
    public function store(Request $req){
        Education::create([

        ]);
    }

    public function update(Request $req, $id){
       
        $data=Education::find($id);
        $data->level = $req->level;
        $data->school_name = $req->school_name;
        $data->remark = $req->remark;
        $data->unit = $req->unit;
        $data->year_graduated = $req->year_graduated;
        $data->save();
        
        return ['status' => 'updated'];
    }

    public function edit($id){
        $ed = Education::find($id);
        return view ('panel.education-page-edit')
        ->with('educations', $ed);
        
    }
    public function destroy($id){
        Education::destroy($id);

        return ['status' => 'deleted'];
    }
}
