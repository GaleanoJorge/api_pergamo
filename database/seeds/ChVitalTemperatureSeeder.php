<?php

use App\Models\ChVitalTemperature;
use Illuminate\Database\Seeder;

class ChVitalTemperatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/vital_temperature.json'));

        foreach (json_decode($data) as $row) {
            ChVitalTemperature::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
