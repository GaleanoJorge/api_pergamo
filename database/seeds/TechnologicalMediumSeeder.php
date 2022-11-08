<?php

use App\Models\TechnologicalMedium;
use Illuminate\Database\Seeder;

class TechnologicalMediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jTechnologicalMedium = file_get_contents(database_path('json/technological_medium.json'));
        
        foreach(json_decode($jTechnologicalMedium) as $row){
            TechnologicalMedium::create([
                'name' => $row->name
            ]);
        }
    }
}
