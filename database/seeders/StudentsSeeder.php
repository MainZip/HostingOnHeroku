<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory(10)->create();

        \App\Models\Student::factory()->create([
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'gender' => 'Male',
            'course' => 'BSIT',
            'yearsection' => '4th Year',
            'email' => 'test@example.com',
        ]);
    }
}
