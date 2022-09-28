<?php

use App\Models\DeniedReason;
use Illuminate\Database\Seeder;

class DeniedReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDeniedReason = file_get_contents(database_path('json/denied_reason.json'));
        
        foreach(json_decode($jDeniedReason) as $row){
            DeniedReason::create([
                'name' => $row->name,
                'denied_type_id' => $row->denied_type_id,
            ]);
        }
    }
}
