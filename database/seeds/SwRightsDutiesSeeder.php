<?php

use App\Models\SwRightsDuties;
use Illuminate\Database\Seeder;

class SwRightsDutiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/sw_rights_duties.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            SwRightsDuties::create([
                
                'name' =>  $row->name,
                'code' =>  $row->code,
            ]);
        }
    }
}
