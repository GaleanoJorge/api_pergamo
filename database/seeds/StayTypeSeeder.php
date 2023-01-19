<?php

use App\Models\StayType;
use Illuminate\Database\Seeder;

class StayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStayType = file_get_contents(database_path('json/stay_type.json'));
        
        foreach(json_decode($jStayType) as $row){
            StayType::create([
                'name' => $row->name
            ]);
        }
    }
}
