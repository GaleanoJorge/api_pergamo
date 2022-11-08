<?php

use App\Models\ChPsPerception;
use Illuminate\Database\Seeder;

class ChPsPerceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_perception.json'));

        foreach (json_decode($data) as $row) {
            ChPsPerception::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
