<?php

use App\Models\ChPsParaphasias;
use Illuminate\Database\Seeder;

class ChPsParaphasiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_paraphasias.json'));

        foreach (json_decode($data) as $row) {
            ChPsParaphasias::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
