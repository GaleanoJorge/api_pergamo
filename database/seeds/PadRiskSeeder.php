<?php

use App\Models\PadRisk;
use Illuminate\Database\Seeder;

class PadRiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jPadRisk = file_get_contents(database_path('json/pad_risk.json'));
        
        foreach(json_decode($jPadRisk) as $row){
            PadRisk::create([
                'name' => $row->name
            ]);
        }
    }
}
