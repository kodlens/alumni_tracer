<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsFeed;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('client.home');
    }

    public function getNewsFeeds(){
       return NewsFeed::orderBy('news_feed_id', 'desc')
       ->get();
    }
}
