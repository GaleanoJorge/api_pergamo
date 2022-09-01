<?php

use App\Models\FixedAssets;
use Illuminate\Database\Seeder;

class FixedAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jFixedAssets = file_get_contents(database_path('json/fixed_assets.json'));
        
        foreach(json_decode($jFixedAssets) as $row){
            FixedAssets::create([
                'id' => $row->id,
                'fixed_clasification_id'=> $row-> fixed_clasification_id,
                'fixed_type_id'=> $row-> fixed_type_id,
                'fixed_stock_id'=> $row-> fixed_stock_id,
                'fixed_property_id'=> $row-> fixed_property_id,
                'obs_property'=> $row-> obs_property,
                'plaque'=> $row-> plaque,
                'company_id'=> $row-> company_id,
                'model'=> $row-> model,
                'mark'=> $row-> mark,
                'serial'=> $row-> serial,
                'fixed_nom_product_id'=> $row-> fixed_nom_product_id,
                'detail_description'=> $row-> detail_description,
                'color'=> $row-> color,
                'status_prod'=> $row-> status_prod,
                'fixed_condition_id'=> $row-> fixed_condition_id,
                'accessories'=> $row-> accessories,
                'calibration_certificate'=> $row-> calibration_certificate,
                'health_register'=> $row-> health_register,
                'warranty'=> $row-> warranty,
                'cv'=> $row-> cv,
                'last_maintenance'=> $row-> last_maintenance,
                'last_pame'=> $row-> last_pame,
                'interventions_carriet'=> $row-> interventions_carriet,
                'type'=> $row-> type,
                'mobile_fixed'=> $row-> mobile_fixed,
                'clasification_risk_id'=> $row-> clasification_risk_id,
                'biomedical_classification_id'=> $row-> biomedical_classification_id,
                'code_ecri'=> $row-> code_ecri,
                'form_acquisition'=> $row-> form_acquisition,
                'date_adquisicion'=> $row-> date_adquisicion,
                'date_warranty'=> $row-> date_warranty,
                'useful_life'=> $row-> useful_life,
                'cost'=> $row-> cost,
                'maker'=> $row-> maker,
                'phone_maker'=> $row-> phone_maker,
                'email_maker'=> $row-> email_maker,
                'power_supply'=> $row-> power_supply,
                'predominant_technology'=> $row-> predominant_technology,
                'volt'=> $row-> volt,
                'stream'=> $row-> stream,
                'power'=> $row-> power,
                'frequency_rank'=> $row-> frequency_rank,
                'temperature_rank'=> $row-> temperature_rank,
                'humidity_rank'=> $row-> humidity_rank,
                'manuals'=> $row-> manuals,
                'guide'=> $row-> guide,
                'periodicity_frequency_id'=> $row-> periodicity_frequency_id,
                'calibration_frequency_id'=> $row-> calibration_frequency_id,
           ]);
        }
    }
}   