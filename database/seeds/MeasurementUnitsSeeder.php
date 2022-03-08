<?php

use App\Models\MeasurementUnits;
use Illuminate\Database\Seeder;

class MeasurementUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jMeasurementUnits = file_get_contents(database_path('json/measurement_units.json'));
        
        foreach(json_decode($jMeasurementUnits) as $row){
            MeasurementUnits::create([
                'name' => $row->name,
                'code' => $row->code
            ]);
        }
    }
}
