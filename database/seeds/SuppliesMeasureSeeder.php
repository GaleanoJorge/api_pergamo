<?php

use App\Models\Base\BaseChDiagnosisClass;
use App\Models\Base\SuppliesMeasure;
use Illuminate\Database\Seeder;

class SuppliesMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/supplies-measure.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            SuppliesMeasure::create([
                'name' =>  $row->name,
            ]);
        }
    }
}

