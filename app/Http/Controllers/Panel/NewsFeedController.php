<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsFeed;

class NewsFeedController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('panel.news-feed');
    }

    public function index_data(Request $req){
           
        $sortKey = explode('.',$req->sort_by);
       
        return NewsFeed::orderBy($sortKey[0], $sortKey[1])
        ->paginate($req->perpage);
    }

    public function store(Request $req){
        return NewsFeed::create([
            'news'=> $req->news
        ]);
    }

    public function destroy($id){
        NewsFeed::destroy($id);
    }

    public function update(Request $req, $id){
        $data = NewsFeed::find($id);
        $data->news = $req->news;
        $data->save();
    }

    public function show($id){
        return NewsFeed::find($id);
    }
}
