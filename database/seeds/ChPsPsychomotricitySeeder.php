<?php

use App\Models\ChPsPsychomotricity;
use Illuminate\Database\Seeder;

class ChPsPsychomotricitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_psychomotricity.json'));

        foreach (json_decode($data) as $row) {
            ChPsPsychomotricity::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
