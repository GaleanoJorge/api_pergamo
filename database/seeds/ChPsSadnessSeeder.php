<?php

use App\Models\ChPsSadness;
use Illuminate\Database\Seeder;

class ChPsSadnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_sadness.json'));

        foreach (json_decode($data) as $row) {
            ChPsSadness::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
