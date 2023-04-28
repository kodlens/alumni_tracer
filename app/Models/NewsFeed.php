<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    use HasFactory;

    protected $table ='news_feeds';

    protected $primaryKey ='news_feed_id';

    protected $fillable = [
        'news'
    
    ];
}
