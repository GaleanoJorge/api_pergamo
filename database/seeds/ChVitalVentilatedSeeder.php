<?php

use App\Models\ChVitalVentilated;
use Illuminate\Database\Seeder;

class ChVitalVentilatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/vital_ventilated.json'));

        foreach (json_decode($data) as $row) {
            ChVitalVentilated::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
