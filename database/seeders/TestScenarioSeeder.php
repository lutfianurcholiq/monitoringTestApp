<?php

namespace Database\Seeders;

use App\Models\TestScenario;
use Illuminate\Database\Seeder;

class TestScenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestScenario::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 1,
            'scenario' => "Testing",
            'type' => "Positive",
            'step' => "1. testing 2. testing ",
            'result' => 'success',
            'status' => 'Done'
        ]);

        TestScenario::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 2,
            'scenario' => "data ngga masuk",
            'type' => "Positive",
            'step' => "1. testing 2. testing ",
            'result' => 'bug',
            'status' => 'Failed'
        ]);

        TestScenario::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 2,
            'scenario' => "hijau kurang",
            'type' => "Positive",
            'step' => "1. testing 2. testing ",
            'result' => 'bug',
            'status' => 'Failed'
        ]);

        TestScenario::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 2,
            'scenario' => "button ke hide",
            'type' => "Positive",
            'step' => "1. testing 2. testing ",
            'result' => 'bug',
            'status' => 'Failed'
        ]);
    }
}
