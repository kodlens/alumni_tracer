<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Education;
use App\Models\Eligibility;
use App\Models\Address;
use App\Models\Employment;
use App\Models\Program;



class ProfilePageController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $programs = Program::all();
        return view('client.profile-page')
            ->with('programs', $programs);
    }

    public function getProfile(){
        return Auth::user();
    }

    public function getEducation(){
        $id = Auth::user()->user_id;

        return Education::where('user_id', $id)
        ->get();
    }

    public function getEligibility(){
        $id = Auth::user()->user_id;
        return Eligibility::where('user_id', $id)
        ->get();
    }
    public function getAddress(){

        $id = Auth::user()->user_id;

        return Address::where('user_id', $id)
        ->get();
    }

    public function getEmployment(){


        $id = Auth::user()->user_id;

        return Employment::where('user_id', $id)
        ->get();
    }

    public function updateMyInfo(Request $req){

        $file = $req->file('profile_image');
        if($file){
            $req->validate([
                'lname' => ['required', 'string', 'max: 100'],
                'fname' => ['required', 'string', 'max: 100'],
                'sex' => ['required', 'string', 'max: 15'],
                'profile_image' => ['mimes:jpg,png']
            ]);
        }else{
            $req->validate([
                'lname' => ['required', 'string', 'max: 100'],
                'fname' => ['required', 'string', 'max: 100'],
                'sex' => ['required', 'string', 'max: 15'],
            ]);
        }

        if($file){
            $file_path = $file->store('public/profile_image');
            $file_explode = explode('/', $file_path);
            $file_path = 'storage/' . $file_explode[1] . '/' .$file_explode[2];
        }

        $id = Auth::user()->user_id;

        $data=User::find($id);
        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->sex = $req->sex;
        $data->ins_name = $req->ins_name;
        $data->civil_status = $req->civil_status;
        $data->suffix = $req->suffix;
        $data->alumni_classification = $req->alumni_classification;
        if($file){
            $data->profile_image = $file_path;
            //if data has a file,, save
        }
        $data->email = $req->email;
        $data->fb_account = $req->fb_account;
        $data->contact_number = $req->contact_number;
        $data->program = $req->program;
        $data->year_graduated = $req->year_graduated;
        $data->save();

        return ['status' => 'updated'];
    }

    public function storeEducation(Request $req){
       // $educArray = array();

        $id = Auth::user()->user_id;

        foreach($req->all() as $row){
            if($row['education_id'] == null){
                Education::create([
                    'user_id' => $id,
                    'level' => $row['level'],
                    'school_name' => $row['school_name'],
                    'remark' => $row['remark'],
                    'unit' => $row['unit'],
                    'year_graduated' => $row['year_graduated'],
                ]);
            }else{
                Education::where('education_id', $row['education_id'])
                ->update([
                    'user_id' => $id,
                    'level' => $row['level'],
                    'school_name' => $row['school_name'],
                    'remark' => $row['remark'],
                    'unit' => $row['unit'],
                    'year_graduated' => $row['year_graduated'],
                ]);
            }
        }

        return ['status' => 'saved'];
    }

    public function storeEligibility(Request $req){
           // return $req;
           $id = Auth::user()->user_id;

        foreach($req->all() as $row){
            if($row['eligibility_id'] == null){
                Eligibility::create([
                    'user_id' => $id,
                    'eligible' => $row['eligible'],
                    'date_acquired' => $row['date_acquired'],
                    'rating' => $row['rating'],
                    'license_id' => $row['license_id'],
                ]);
            }else{
                Eligibility::where('eligibility_id', $row['eligibility_id'])
                ->update([
                    'user_id' => $id,
                    'eligible' => $row['eligible'],
                    'date_acquired' => $row['date_acquired'],
                    'rating' => $row['rating'],
                    'license_id' => $row['license_id'],
                ]);
            }
        }
        return ['status' => 'saved'];


    }
    public function storeAddress(Request $req){

        $id = Auth::user()->user_id;

        if($req->address_id == null){
            Address::create([
                'user_id' => $id,
                'country_boarding' => $req->country_boarding,
                'province_boarding' => $req->province_boarding,
                'city_boarding' => $req->city_boarding,
                'district_boarding' => $req->district_boarding,
                'brgy_boarding' => $req->brgy_boarding,
                'zipcode_boarding' => $req->zipcode_boarding,
                //work
                'country_work' => $req->country_work,
                'province_work' => $req->province_work,
                'city_work' => $req->city_work,
                'district_work' => $req->district_work,
                'brgy_work' => $req->brgy_work,
                'zipcode_work' => $req->zipcode_work,
                //permanent
                'country_perm' => $req->country_perm,
                'province_perm' => $req->province_perm,
                'city_perm' => $req->city_perm,
                'district_perm' => $req->district_perm,
                'brgy_perm' => $req->brgy_perm,
                'zipcode_perm' => $req->zipcode_perm,


            ]);
        }else{
            Address::where('address_id', $req['address_id'])
            ->update([
                'user_id' => $id,
                'country_boarding' => $req->country_boarding,
                'province_boarding' => $req->province_boarding,
                'city_boarding' => $req->city_boarding,
                'district_boarding' => $req->district_boarding,
                'brgy_boarding' => $req->brgy_boarding,
                'zipcode_boarding' => $req->zipcode_boarding,
                //work
                'country_work' => $req->country_work,
                'province_work' => $req->province_work,
                'city_work' => $req->city_work,
                'district_work' => $req->district_work,
                'brgy_work' => $req->brgy_work,
                'zipcode_work' => $req->zipcode_work,
                //permanent
                'country_perm' => $req->country_perm,
                'province_perm' => $req->province_perm,
                'city_perm' => $req->city_perm,
                'district_perm' => $req->district_perm,
                'brgy_perm' => $req->brgy_perm,
                'zipcode_perm' => $req->zipcode_perm,

            ]);
        }

        return ['status' => 'saved'];

    }

    public function storeEmployment(Request $req){

        //return $req;
        $id = Auth::user()->user_id;


        if($req->employment_id == null){
            Employment::create([
                'user_id' => $id,
                'is_employed' => $req->is_employed,
                'organization' => $req->organization,
                'designation' => $req->designation,
                'year_from' => $req->year_from,
                'year_to' => $req->year_to,
                'current_job' => $req->current_job,
                'employment_type' => $req->employment_type,
                'occupation_type' => $req->occupation_type,
                'is_first_job' => $req->is_first_job,
                'work_category' => $req->work_category,
                'take_job' => $req->take_job,
                'monthly_range' => $req->monthly_range,
                'satisfy_job' => $req->satisfy_job,
                'growth' => $req->growth,
                'degree_earned' => $req->degree_earned,

            ]);
        }else{
            Employment::where('employment_id', $req['employment_id'])
            ->update([
                'user_id' => $id,
                'is_employed' => $req->is_employed,
                'organization' => $req->organization,
                'designation' => $req->designation,
                'year_from' => $req->year_from,
                'year_to' => $req->year_to,
                'current_job' => $req->current_job,
                'employment_type' => $req->employment_type,
                'occupation_type' => $req->occupation_type,
                'is_first_job' => $req->is_first_job,
                'work_category' => $req->work_category,
                'take_job' => $req->take_job,
                'monthly_range' => $req->monthly_range,
                'satisfy_job' => $req->satisfy_job,
                'growth' => $req->growth,
                'degree_earned' => $req->degree_earned,
            ]);
        }

        return ['status' => 'saved'];
    }


}
