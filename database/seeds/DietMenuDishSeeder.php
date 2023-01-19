<?php

use App\Models\DietMenuDish;
use Illuminate\Database\Seeder;

class DietMenuDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietMenuDish = file_get_contents(database_path('json/diet_menu_dish.json'));
        
        foreach(json_decode($jDietMenuDish) as $row){
            DietMenuDish::create([
                'diet_menu_id' => $row->diet_menu_id,
                'diet_dish_id' => $row->diet_dish_id,
            ]);
        }
    }
}
