<?php

use App\Models\ProductGeneric;
use Illuminate\Database\Seeder;

class ProductGenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-generic.json'));

        foreach (json_decode($data) as $row) {
            ProductGeneric::create([
                'drug_concentration_id' =>  $row->drug_concentration_id,
                'measurement_units_id' =>  $row->measurement_units_id,
                'product_presentation_id' =>  $row->product_presentation_id,
                'description' =>  $row->description,
                'pbs_type_id' =>  $row->pbs_type_id,
                'nom_product_id' =>  $row->nom_product_id,
                'administration_route_id' =>  $row->administration_route_id,
                'special_controller_medicine' =>  $row->special_controller_medicine,
                'code_atc' =>  $row->code_atc,
                'minimum_stock' =>  $row->minimum_stock,
                'maximum_stock' =>  $row->maximum_stock,
                'product_dose_id' =>  $row->product_dose_id,
                'dose' =>  $row->dose,
                'multidose_concentration_id' =>  $row->multidose_concentration_id,
            ]);
        }
    }
}
