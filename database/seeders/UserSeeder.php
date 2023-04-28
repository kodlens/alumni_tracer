<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'username' => 'eshen',
                'lname' => 'AMPZ',
                'fname' => 'ETIENNE',
                'mname' => '',
                'email' => 'admin@admin.com',
                'role' => 'ADMIN',
                'sex' => 'MALE',
                'contact_number' => '9167789585',
                'program' => 'BSCS',
                'year_graduated' => null,
                'password' => Hash::make('@lumni-112233'),

            ],
            [
                'username' => 'anacion',
                'lname' => 'NACION',
                'fname' => 'ALEXANDER',
                'mname' => '',
                'email' => 'nacion@admin.com',
                'role' => 'ADMIN',
                'sex' => 'MALE',
                'contact_number' => '',
                'program' => 'ADMIN',
                'year_graduated' => null,
                'password' => Hash::make('g@dtc-nacion'),
            ],
            [
                'username' => 'cherryl',
                'lname' => 'MINA',
                'fname' => 'CHERRYL',
                'mname' => 'S',
                'email' => 'cmina@admin.com',
                'role' => 'ADMIN',
                'sex' => 'FEMALE',
                'contact_number' => '',
                'program' => 'ADMIN',
                'year_graduated' => null,
                'password' => Hash::make('g@dtc-mina'),
            ]

        ];

        User::insertOrIgnore($users);
    }
}
