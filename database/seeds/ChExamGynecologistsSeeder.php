<?php

use App\Models\ChExamGynecologists;
use Illuminate\Database\Seeder;

class ChExamGynecologistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_exam_gynecologists.json'));

        foreach (json_decode($data) as $row) {
            ChExamGynecologists::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
