<?php

use App\Models\MunicipalityIca;
use Illuminate\Database\Seeder;

class MunicipalityIcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jMunicipalityIca = file_get_contents(database_path('json/municipality_ica.json'));
        
        foreach(json_decode($jMunicipalityIca) as $row){
            MunicipalityIca::create([
                'value' => $row->value,
                'municipality_id' => $row->municipality_id,
            ]);
        }
    }
}
