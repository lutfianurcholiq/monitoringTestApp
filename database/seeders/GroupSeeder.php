<?php

namespace Database\Seeders;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name_group' => "Vicenzo"
        ]);
    }
}
