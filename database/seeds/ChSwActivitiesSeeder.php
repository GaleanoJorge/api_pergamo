<?php

use App\Models\ChSwActivities;
use Illuminate\Database\Seeder;

class ChSwActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_activities.json'));

        foreach (json_decode($data) as $row) {
            ChSwActivities::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
