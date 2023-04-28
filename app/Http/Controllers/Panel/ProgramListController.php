<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;


class ProgramListController extends Controller
{
    //

    public function __construct(){
       
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        return view('panel.program-list');
    }

    public function index_data(Request $req){

        $sortKey = explode('.',$req->sort_by);

        return Program::orderBy($sortKey[0], $sortKey[1])
        ->paginate($req->perpage);
    }

    public function store(Request $req){
        return Program::create([
            'program'=> strtoupper($req->program),
            'program_desc'=> strtoupper($req->program_desc)
        ]);
    }

    public function destroy($id){
        Program::destroy($id);
    }

    public function update(Request $req, $id){
        $data = Program::find($id);
        $data->program = strtoupper($req->program);
        $data->program_desc = strtoupper($req->program_desc);

        $data->save();
    }

    public function show($id){
        return Program::find($id);
    }
}
