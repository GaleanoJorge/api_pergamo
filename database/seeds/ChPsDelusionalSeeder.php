<?php

use App\Models\ChPsDelusional;
use Illuminate\Database\Seeder;

class ChPsDelusionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_delusional.json'));

        foreach (json_decode($data) as $row) {
            ChPsDelusional::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
