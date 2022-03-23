<?php

use App\Models\Base\BaseChDiagnosisType;
use App\Models\ChDiagnosisType;
use Illuminate\Database\Seeder;

class ChDiagnosisTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/diagnosis_type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ChDiagnosisType::create([               
                'name' =>  $row->name, 
            ]);
        }
    }
}
