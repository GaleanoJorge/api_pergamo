<?php

use App\Models\Ethnicity;
use Illuminate\Database\Seeder;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ethnicity.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Ethnicity::create([
                
                'name' =>  $row->name,
                'code' =>  $row->code,
            ]);
        }
    }
}
