<?php

use App\Models\ProductSuppliesCom;
use Illuminate\Database\Seeder;

class ProductSuppliesComSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jProduct = file_get_contents(database_path('json/product-supplies-com.json'));
        
        foreach(json_decode($jProduct) as $row){
            ProductSuppliesCom::create([
                // 'id' => $row->id,
                'name' => $row->name,
                'factory_id'=> $row->factory_id,
                'product_supplies_id'=> $row->product_supplies_id,
                'invima_registration'=> $row->invima_registration,
                'invima_status_id'=> $row->invima_status_id,
                'sanitary_registration_id'=> $row->sanitary_registration_id,
                'packing_id'=> $row->packing_id,
                'unit_packing'=> $row->unit_packing,
                'code_udi'=> $row->code_udi,
                'useful_life'=> $row->useful_life,
                'date_cum'=> $row->date_cum,
            ]);
        }
    }
}