<?php

use App\Models\ChPsAreas;
use Illuminate\Database\Seeder;

class ChPsAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_areas.json'));

        foreach (json_decode($data) as $row) {
            ChPsAreas::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
