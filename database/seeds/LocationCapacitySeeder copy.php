<?php

use App\Models\LocationCapacity;
use Illuminate\Database\Seeder;

class LocationCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jLocationCapacity = file_get_contents(database_path('json/location_capacity.json'));
        
        foreach(json_decode($jLocationCapacity) as $row){
            LocationCapacity::create([
                'phone_consult' => $row-> phone_consult, 
                'assistance_id'=> $row-> assistance_id,
                'locality_id'=> $row-> locality_id,
                'validation_date'=> $row-> validation_date,
                'PAD_patient_quantity'=> $row-> PAD_patient_quantity,
                'PAD_patient_actual_capacity'=> $row-> PAD_patient_actual_capacity,
                'PAD_patient_attended'=> $row-> PAD_patient_attended,
            ]);
        }
    }
}