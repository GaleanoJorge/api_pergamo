<?php

use App\Models\NeighborhoodOrResidence;
use Illuminate\Database\Seeder;

class NeighborhoodOrResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/neighborhood-or-residence.json'));

        foreach (json_decode($data) as $row) {
            NeighborhoodOrResidence::create([
            
                'name' =>  $row->name,
                'municipality_id' =>  $row->municipality_id,
            ]);

        }
    }
}
