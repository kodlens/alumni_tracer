<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    //
    public function index (){
        $data=Dashboard::all();
        return view("dashboard")->with("dashboards",$data);
        
    }
    public function store (Request $req){
       Dashboard::create([
           "name"=>$req->name
       ]);

       return redirect("/dashboard");
    }

    public function create (){
        return view("dashboard-create");
    }
    public function show (){
        return view("dashboard");
    }
    public function edit ($id){
        $data=Dashboard::find($id);
        return view("dashboard-edit")->with("data",$data);
    }
    public function update (Request $req,$id){
        $data = Dashboard::find($id);

        $data->name = $req->name;
        $data->save();

        return redirect('/dashboard');
    }
    public function destroy ($id){
        Dashboard::destroy($id);

        return redirect()->back();
    }
}
