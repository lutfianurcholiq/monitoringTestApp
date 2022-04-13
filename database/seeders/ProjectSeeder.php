<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'DigiTrain',
            'group_id' => 1
        ]);

        Project::create([
            'name' => 'Aplikasi Vicenzo',
            'group_id' => 1
        ]);

        Project::create([
            'name' => 'Aplikasi Jirisan',
            'group_id' => 1
        ]);
    }
}
