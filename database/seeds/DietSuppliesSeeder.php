<?php

use App\Models\DietSupplies;
use Illuminate\Database\Seeder;

class DietSuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietSupplies = file_get_contents(database_path('json/diet_supplies.json'));
        
        foreach(json_decode($jDietSupplies) as $row){
            DietSupplies::create([
                'name' => $row->name,
                'diet_supply_type_id' => $row->diet_supply_type_id,
                'measurement_units_id' => $row->measurement_units_id
            ]);
        }
    }
}
