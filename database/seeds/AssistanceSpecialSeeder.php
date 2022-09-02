<?php

use App\Models\AssistanceSpecial;
use Illuminate\Database\Seeder;

class AssistanceSpecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jAssistanceSpecial = file_get_contents(database_path('json/assistance_special.json'));
        
        foreach(json_decode($jAssistanceSpecial) as $row){
            AssistanceSpecial::create([
                'specialty_id'=> $row-> specialty_id,
                'assitance_id'=> $row->assitance_id,
            ]);
        }
    }
}