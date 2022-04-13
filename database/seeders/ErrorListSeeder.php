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
            'note' => "test",
            'image' => 'testing.jpg',
            'status' => 'progress'
        ]);
    }
}
