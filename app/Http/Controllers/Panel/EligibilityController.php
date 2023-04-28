<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eligibility;


class EligibilityController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        return view ('panel.eligibility-page');
    }

    public function getEligibilities($id){
        $data = Eligibility::where('user_id', $id)->get();
        return view ('panel.eligibility-page')
        ->with('eligibilities', $data)
        ->with('id',$id);
        
    }

    public function update(Request $req, $id){
      
        $data=Eligibility::find($id);
        $data->eligible = $req->eligible;
        $data->date_acquired = $req->date_acquired;
        $data->rating = $req->rating;
        $data->license_id = $req->license_id;
        
        $data->save();
        
        return ['status' => 'updated'];
    }

    public function edit($id){
        $ed = Eligibility::find($id);
        return view ('panel.eligibility-page-edit')
        ->with('eligibilities', $ed);
        
    }
    public function destroy($id){
        Eligibility::destroy($id);

        return ['status' => 'deleted'];
    }
}
