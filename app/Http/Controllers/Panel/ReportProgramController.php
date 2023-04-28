<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Education;
use App\Models\Eligibility;
use App\Models\Employment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class ReportProgramController extends Controller
{
    //

    public function __construct(){
       
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $programs = Program::all();
        return view('panel.report.report-program')
            ->with('programs', $programs);
    }

    public function userByProgram(Request $req){
        $sortkey = explode(".",$req->sort_by);
        $data = DB::table('users as a')
            ->leftJoin('addresses as b', 'a.user_id', 'b.user_id')
            ->where('a.lname', 'like', $req->lname . '%')
            ->where('a.program', 'like', $req->program . '%')
            ->where('a.year_graduated', 'like', $req->year_grad . '%')
            ->where('b.city_boarding', 'like', $req->search_city . '%')
            ->where('a.role', '=', 'ALUMNI')
            ->select('a.user_id', 'a.username', 'a.lname', 'a.fname', 'a.mname', 'a.suffix', 'a.civil_status', 'a.sex', 'a.contact_number', 'a.email',
                'a.role', 'a.program', 'a.year_graduated', 'b.country_boarding', 'b.province_boarding', 'b.city_boarding', 'b.district_boarding',
                'b.brgy_boarding', 'b.zipcode_boarding', 'b.country_work', 'b.province_work', 'b.city_work', 'b.district_work', 'b.brgy_work', 'b.zipcode_work',
                'b.country_perm', 'b.province_perm', 'b.city_perm', 'b.district_perm', 'b.brgy_perm', 'b.zipcode_perm')
            ->orderBy($sortkey[0], $sortkey[1])
            ->paginate($req->perpage);
        return $data;

        // return User::orderBy($sortkey[0], $sortkey[1])
        //     ->where('lname', 'like', $req->lname . '%')
        //     ->paginate($req->perpage);
    }

    public function show($id){
        $user = User::find($id);
        $educations = Education::where('user_id', $id)->get();
        $eligibilities = Eligibility::where('user_id', $id)->get();
        $addresses = Address::where('user_id', $id)->first();
        $emp = Employment::where('user_id', $id)->first();

        return view('panel.report.report-print-info')
            ->with('user', $user)
            ->with('educations', $educations)
            ->with('eligibilities', $eligibilities)
            ->with('address', $addresses)
            ->with('emp', $emp);
    }


}
