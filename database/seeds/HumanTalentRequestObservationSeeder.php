<?php

use App\Models\HumanTalentRequestObservation;
use Illuminate\Database\Seeder;

class HumanTalentRequestObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/human_talent_request_observation.json'));

        foreach (json_decode($data) as $row) {
            HumanTalentRequestObservation::create([
                'name' =>  $row->name,
                'category' =>  $row->category,
            ]);
        }
    }
}
