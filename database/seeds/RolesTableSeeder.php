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
        $role = new \App\Models\Role();
        $role->name         = 'admin';
        $role->display_name = 'Admin';
        $role->description  = 'IT Tracker project Admin';
        $role->save();

        $role = new \App\Models\Role();
        $role->name         = 'employee';
        $role->display_name = 'Employee';
        $role->description  = 'IT Tracker Employee';
        $role->save();
    }
}
