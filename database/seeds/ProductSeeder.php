<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jProduct = file_get_contents(database_path('json/product.json'));
        
        foreach(json_decode($jProduct) as $row){
            Product::create([
                'id' => $row->id,
                'name' => $row->name,
                'factory_id'=> $row->factory_id,
                'product_generic_id'=> $row->product_generic_id,
                'invima_registration'=> $row->invima_registration,
                'invima_status_id'=> $row->invima_status_id,
                'sanitary_registration_id'=> $row->sanitary_registration_id,
                'storage_conditions_id'=> $row->storage_conditions_id,
                'packing_id'=> $row->packing_id,
                'code_cum_file'=> $row->code_cum_file,
                'code_cum_consecutive'=> $row->code_cum_consecutive,
                'regulated_drug'=> $row->regulated_drug,
                'high_price'=> $row->high_price,
                'maximum_dose'=> $row->maximum_dose,
                'indications'=> $row->indications,
                'contraindications'=> $row->contraindications,
                'applications'=> $row->applications,
                'value_circular'=> $row->value_circular,
                'circular'=> $row->circular,
                'unit_packing'=> $row->unit_packing,
                'refrigeration'=> $row->refrigeration,
                'useful_life'=> $row->useful_life,
                'code_cum'=> $row->code_cum,
                'date_cum'=> $row->date_cum,
            ]);
        }
    }
}