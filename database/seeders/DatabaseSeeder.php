<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => "Upiland",
            'level' => "Quality Assurance",
            'group_id' => 1,
            'email' => "qa@gmail.com",
            'password' => bcrypt(123456)
            
        ]);
        User::create([
            'name' => "Udin",
            'level' => "System Analyst",
            'group_id' => 2,
            'email' => "sa@gmail.com",
            'password' => bcrypt(123456)
            
        ]);
        User::create([
            'name' => "septiadi",
            'level' => "Admin",
            'group_id' => 1,
            'email' => "admin@gmail.com",
            'password' => bcrypt(123456)
            
        ]);

        User::create([
            'name' => "indra",
            'level' => "Technical Writing",
            'group_id' => 1,
            'email' => "tw@gmail.com",
            'password' => bcrypt(123456),
            
        ]);

        User::create([
            'name' => "gunawan",
            'level' => "BE/DM",
            'group_id' => 2,
            'email' => "be@gmail.com",
            'password' => bcrypt(123456),
            
        ]);
    
        $this->call([
            ModuleSeeder::class,
            ProjectSeeder::class,
            TestScenarioSeeder::class,
            GroupSeeder::class,
            ErrorListSeeder::class
        ]);
    }
}
