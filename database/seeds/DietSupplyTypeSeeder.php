<?php

use App\Models\DietSupplyType;
use Illuminate\Database\Seeder;

class DietSupplyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietSupplyType = file_get_contents(database_path('json/diet_supply_type.json'));
        
        foreach(json_decode($jDietSupplyType) as $row){
            DietSupplyType::create([
                'name' => $row->name
            ]);
        }
    }
}
