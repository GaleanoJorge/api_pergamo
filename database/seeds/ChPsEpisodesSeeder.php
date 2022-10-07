<?php

use App\Models\ChPsEpisodes;
use Illuminate\Database\Seeder;

class ChPsEpisodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_episodes.json'));

        foreach (json_decode($data) as $row) {
            ChPsEpisodes::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
