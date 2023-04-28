<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Address;

class AddressesController extends Controller
{
    //
    
    public function index(){
        return view('panel.address-page');
    }

    public function edit($id){
        
    $user = Address::where('user_id', $id)->first();
     $user;

        return view ('panel.address-page')
        ->with('user',$user);
    }
    // public function indexData(){
    //     return User::all();
    // }

    public function update(Request $req, $id){

        
        $data=Address::find($id);
        
        
        $data->country_boarding = $req->country_boarding;
        $data->province_boarding = $req->province_boarding;
        $data->city_boarding = $req->city_boarding;
        $data->district_boarding = $req->district_boarding;
        $data->brgy_boarding = $req->brgy_boarding;
        $data->zipcode_boarding = $req->zipcode_boarding;
        //work
        $data->country_work = $req->country_work;
        $data->province_work = $req->province_work;
        $data->city_work = $req->city_work;
        $data->district_work = $req->district_work;
        $data->brgy_work = $req->brgy_work;
        $data->zipcode_work = $req->zipcode_work;
        //permanent
        $data->country_perm = $req->country_perm;
        $data->province_perm = $req->province_perm;
        $data->city_perm = $req->city_perm;
        $data->district_perm = $req->district_perm;
        $data->brgy_perm = $req->brgy_perm;
        $data->zipcode_perm = $req->zipcode_perm;
        $data->save();
        return ['status' => 'updated'];
        

    }
}
