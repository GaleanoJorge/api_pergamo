<?php

use App\Models\Assistance;
use Illuminate\Database\Seeder;

class AssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jAssistance = file_get_contents(database_path('json/assistance.json'));
        
        foreach(json_decode($jAssistance) as $row){
            Assistance::create([
                'id' => $row->id,
                'user_id'=> $row-> user_id,
                'medical_record'=> $row->medical_record,
                'contract_type_id'=> $row->contract_type_id,
                'cost_center_id'=> $row->cost_center_id,
                'PAD_service'=> $row->PAD_service,
                'PAD_patient_quantity'=> $row->PAD_patient_quantity,
                'attends_external_consultation'=> $row->attends_external_consultation,
                'serve_multiple_patients'=> $row->serve_multiple_patients,
                'file_firm'=> $row->file_firm,
            ]);
        }
    }
}