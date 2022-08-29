<?php

use App\Models\MedicalStatus;
use App\Models\Status;
use Illuminate\Database\Seeder;

class MedicalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/medical-status.json'));
        
        foreach(json_decode($jStatus) as $row){
            MedicalStatus::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
