<?php

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/campus.json'));
        
        foreach(json_decode($jStatus) as $row){
            Campus::create([
                'name' => $row->name,
                'region_id' => $row->region_id
            ]);
        }
    }
}
