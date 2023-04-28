<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsFeed;

class NewsFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $news=[
            [
            'news' => 'WELCOME TO ALUMNI PORTAL'
             ],
             [
            'news' => 'ANNOUNCEMENT WILL BE POSTED HERE...'
             ]
        ];

        NewsFeed::insertOrIgnore($news);
    }
}
