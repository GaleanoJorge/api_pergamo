<?php

use App\Models\DietDay;
use Illuminate\Database\Seeder;

class DietDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietDay = file_get_contents(database_path('json/diet_day.json'));
        
        foreach(json_decode($jDietDay) as $row){
            DietDay::create([
                'name' => $row->name
            ]);
        }
    }
}
