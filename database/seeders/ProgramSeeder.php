<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        $programs=[
            [
                'program' => 'AB POLSCI',
                'program_desc' => 'Bachelor of Arts in Political Science'
            ],
            [
                'program' => 'AB ENGLISH',
                'program_desc' => 'Bachelor of Arts in English Language'
            ],
            [
                'program' => 'AB COMM',
                'program_desc' => 'Bachelor of Arts in Communication'
            ],
            [
                'program' => 'BEED',
                'program_desc' => 'Bachelor of Science in Elementary Education'
            ],
            [
                'program' => 'BSED-MATH',
                'program_desc' => 'Bachelor of Science in Secondary Education Major in Mathematics'
            ],
            [
                'program' => 'BSCS',
                'program_desc' => 'Bachelor of Science in Computer Science'
            ],
            [
                'program' => 'GEN MID',
                'program_desc' => 'DIPLOMA IN MIDWIFERY'
            ],
            [
                'program' => 'BS CRIM',
                'program_desc' => 'Bachelor of Science in Criminology'
            ],
            [
                'program' => 'BS ISM',
                'program_desc' => 'Bachelor of Science in Industrial Security Management'
            ],
            [
                'program' => 'BSBA-HRDM',
                'program_desc' => 'Bachelor of Science in Business Administration (Human Resource Development Management)'
            ],
            [
                'program' => 'BSBA-HRM',
                'program_desc' => 'Bachelor of Science in Business Administration (Human Resource Management)'
            ],
        ];

        Program::insertOrIgnore($programs);
    }
}
