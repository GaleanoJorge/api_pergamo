<?php

use App\Models\DietDishStock;
use Illuminate\Database\Seeder;

class DietDishStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietDishStock = file_get_contents(database_path('json/diet_dish_stock.json'));
        
        foreach(json_decode($jDietDishStock) as $row){
            DietDishStock::create([
                'diet_dish_id' => $row->diet_dish_id,
                'diet_supplies_id' => $row->diet_supplies_id,
            ]);
        }
    }
}
