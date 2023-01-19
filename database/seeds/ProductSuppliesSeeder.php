<?php

use App\Models\ProductSupplies;
use Illuminate\Database\Seeder;

class ProductSuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-supplies.json'));

        foreach (json_decode($data) as $row) {
            ProductSupplies::create([
                'size' =>  $row->size,
                'size_supplies_measure_id' =>  $row->size_supplies_measure_id,
                'measure' =>  $row->measure,
                'measure_supplies_measure_id' =>  $row->measure_supplies_measure_id,
                'description' =>  $row->description,
                'stature' =>  $row->stature,
            ]);
        }
    }
}
