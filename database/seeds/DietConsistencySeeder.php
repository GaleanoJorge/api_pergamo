<?php

use App\Models\DietConsistency;
use Illuminate\Database\Seeder;

class DietConsistencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietConsistency = file_get_contents(database_path('json/diet_consistency.json'));
        
        foreach(json_decode($jDietConsistency) as $row){
            DietConsistency::create([
                'name' => $row->name
            ]);
        }
    }
}
