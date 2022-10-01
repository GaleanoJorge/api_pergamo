<?php

use App\Models\ChPsMemory;
use Illuminate\Database\Seeder;

class ChPsMemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_attention.json'));

        foreach (json_decode($data) as $row) {
            ChPsMemory::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
