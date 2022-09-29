<?php

use App\Models\ChPsJudgment;
use Illuminate\Database\Seeder;

class ChPsJudgmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_judgment.json'));

        foreach (json_decode($data) as $row) {
            ChPsJudgment::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
