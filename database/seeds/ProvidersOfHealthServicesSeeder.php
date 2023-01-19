<?php

use App\Models\ProvidersOfHealthServices;
use Illuminate\Database\Seeder;

class ProvidersOfHealthServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jProvidersOfHealthServices = file_get_contents(database_path('json/providers_of_health_services.json'));
        
        foreach(json_decode($jProvidersOfHealthServices) as $row){
            ProvidersOfHealthServices::create([
                'name' => $row->name,
                'country_id' => $row->country_id,
                'region_id' => $row->region_id,
                'municipality_id' => $row->municipality_id,
            ]);
        }
    }
}
