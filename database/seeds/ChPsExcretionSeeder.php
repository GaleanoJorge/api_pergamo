<?php

use App\Models\ChPsExcretion;
use Illuminate\Database\Seeder;

class ChPsExcretionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_excretion.json'));

        foreach (json_decode($data) as $row) {
            ChPsExcretion::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
