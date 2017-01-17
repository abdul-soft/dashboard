<?php

use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\AcademicSession::class,10)->create()->each(function ($session){
            $class = factory(\App\AcademicClass::class, 1)->create([
                'session_id' => $session->id
            ]);
            factory(\App\Dashboard::class)->create([
                'class_id' => $class->id,
                'session_id' => $session->id,
            ])->each(function ($dashboard) {
                factory(\App\DashboardPost::class,5)->create([
                    'dashboard_id' => $dashboard->id,
                    'user_id'   =>  1
                ]);
            });
        });



        $teacher = factory(\App\User::class,1)->create([
            'email'=> 'teacher@mail.com'
        ]);
        $teacher->roles()->attach(1);

        $student = factory(\App\User::class,1)->create([
            'email'=> 'student@mail.com', 'class_id'=>1, 'session_id'=>1
        ]);
        $student->roles()->attach(2);
    }
}
