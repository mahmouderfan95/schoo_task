<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            ['id' => 1,'name' => 'school 1 '],
            ['id' => 2,'name' => 'school 2 '],
            ['id' => 3,'name' => 'school 3 '],
            ['id' => 4,'name' => 'school 4 '],
        ];
        foreach ($schools as $school){
            $schoolCreate = \App\Models\School::create($school);
        }
    }
}
