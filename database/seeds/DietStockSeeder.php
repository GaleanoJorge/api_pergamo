<?php

use App\Models\DietStock;
use Illuminate\Database\Seeder;

class DietStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietStock = file_get_contents(database_path('json/diet_stock.json'));
        
        foreach(json_decode($jDietStock) as $row){
            DietStock::create([
                'amount' => $row->amount,
                'diet_supplies_id' => $row->diet_supplies_id,
            ]);
        }
    }
}
