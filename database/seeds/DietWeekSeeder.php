<?php

use App\Models\DietWeek;
use Illuminate\Database\Seeder;

class DietWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietWeek = file_get_contents(database_path('json/diet_week.json'));
        
        foreach(json_decode($jDietWeek) as $row){
            DietWeek::create([
                'name' => $row->name
            ]);
        }
    }
}
