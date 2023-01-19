<?php

use App\Models\ChPsIntelligence;
use Illuminate\Database\Seeder;

class ChPsIntelligenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_intelligence.json'));

        foreach (json_decode($data) as $row) {
            ChPsIntelligence::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
