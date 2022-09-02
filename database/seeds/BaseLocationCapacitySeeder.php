<?php

use App\Models\BaseLocationCapacity;
use Illuminate\Database\Seeder;

class BaseLocationCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jBaseLocationCapacity = file_get_contents(database_path('json/base_location_capacity.json'));
        
        foreach(json_decode($jBaseLocationCapacity) as $row){
            BaseLocationCapacity::create([
                'phone_consult'=> $row->phone_consult,
                'assistance_id'=> $row->assistance_id,
                'locality_id'=> $row->locality_id,
                'PAD_base_patient_quantity'=> $row->PAD_base_patient_quantity,
            ]);
        }
    }
}