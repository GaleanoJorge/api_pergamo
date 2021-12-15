<?php

use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/diagnosis.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Diagnosis::create([
                
                'name' =>  $row->name,
                'code' =>  $row->code,
            ]);
        }
    }
}
