<?php

namespace Database\Seeders;
use App\Models\errorList;
use Illuminate\Database\Seeder;

class ErrorListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ErrorList::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 1,
            'test_id' => 1,
            'cased' => "test",
            'note' => "test",
            'image' => 'testing.jpg',
            'status' => 'progress'
        ]);

        ErrorList::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 1,
            'test_id' => 2,
            'cased' => "test",
            'note' => "test",
            'image' => 'testing.jpg',
            'status' => 'progress'
        ]);

        ErrorList::create([
            'user_id' => 1,
            'project_id' => 1,
            'module_id' => 1,
            'test_id' => 2,
            'cased' => "test",
            'note' => "test",
            'image' => 'testing.jpg',
            'status' => 'progress'
        ]);
    }
}
