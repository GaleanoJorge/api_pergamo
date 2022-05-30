<?php

use App\Models\ChTypePhysicalExam;
use Illuminate\Database\Seeder;

class ChTypePhysicalExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type_ch_physical_exam.json'));

        foreach (json_decode($data) as $row) {
            ChTypePhysicalExam::create([
                'name' =>  $row->name,
                'description' => $row->description,
            ]);
        }
    }
}
