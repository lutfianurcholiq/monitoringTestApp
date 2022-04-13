<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name_modul' => 'FSDP',
            'project_id' => 1,
        ]);

        Module::create([
            'name_modul' => 'Pengajuan Pelatihan',
            'project_id' => 1
        ]);
        Module::create([
            'name_modul' => 'Pengajuan Komunikasi',
            'project_id' => 2
        ]);
        Module::create([
            'name_modul' => 'Pengajuan Masakan',
            'project_id' => 3
        ]);
        Module::create([
            'name_modul' => 'Pengajuan Pinjaman Bank',
            'project_id' => 2
        ]);
    }
}
