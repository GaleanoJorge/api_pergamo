<?php

use App\Models\ChExternalCause;
use Illuminate\Database\Seeder;

class ChExternalCauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/external_cause.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
        ChExternalCause::create([               
                'name' =>  $row->name, 
            ]);
        }
    }
}
