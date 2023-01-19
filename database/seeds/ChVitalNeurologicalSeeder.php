<?php

use App\Models\ChVitalNeurological;
use Illuminate\Database\Seeder;

class ChVitalNeurologicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/vital_neurological.json'));

        foreach (json_decode($data) as $row) {
            ChVitalNeurological::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
