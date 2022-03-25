<?php

use App\Models\Base\BaseChDiagnosisClass;
use App\Models\ChDiagnosisClass;
use Illuminate\Database\Seeder;

class ChDiagnosisClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/diagnosis_class.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ChDiagnosisClass::create([
                'name' =>  $row->name,
            ]);
        }
    }
}

