<?php

use App\Models\ChPsExamOthers;
use Illuminate\Database\Seeder;

class ChPsExamOthersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_exam_others.json'));

        foreach (json_decode($data) as $row) {
            ChPsExamOthers::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
