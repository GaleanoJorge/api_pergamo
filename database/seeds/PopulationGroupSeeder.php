<?php

use App\Models\PopulationGroup;
use Illuminate\Database\Seeder;

class PopulationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/population-group.json'));

        foreach (json_decode($data) as $row) {
            PopulationGroup::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
