<?php

use App\Models\DietDish;
use Illuminate\Database\Seeder;

class DietDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietDish = file_get_contents(database_path('json/diet_dish.json'));
        
        foreach(json_decode($jDietDish) as $row){
            DietDish::create([
                'name' => $row->name
            ]);
        }
    }
}
