<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Role::create(['name'=> 'teacher', 'display_name'=> 'teacher', 'description'=>'Teacher']);
        \App\Role::create(['name'=> 'student', 'display_name'=> 'student', 'description'=>'Student']);

    }
}
