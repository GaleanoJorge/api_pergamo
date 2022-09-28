<?php

use App\Models\DiagnosisDms;
use Illuminate\Database\Seeder;

class DiagnosisDmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/diagnosis_dms.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            DiagnosisDms::create([
                
                'name' =>  $row->name,
                'code' =>  $row->code,
                'value' =>  $row->value,
            ]);
        }
    }
}
