<?php

use App\Models\ChPsProspecting;
use Illuminate\Database\Seeder;

class ChPsProspectingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_prospecting.json'));

        foreach (json_decode($data) as $row) {
            ChPsProspecting::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
