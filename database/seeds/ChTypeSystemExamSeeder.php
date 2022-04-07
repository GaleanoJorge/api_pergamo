<?php

use App\Models\ChTypeSystemExam;
use Illuminate\Database\Seeder;

class ChTypeSystemExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type_ch_system_exam.json'));

        foreach (json_decode($data) as $row) {
            ChTypeSystemExam::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
