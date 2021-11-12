<?php

use App\Models\StudyLevelStatus;
use Illuminate\Database\Seeder;

class StudyLevelStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/study-level-status.json'));

        foreach (json_decode($data) as $row) {
            StudyLevelStatus::create([
            
                'name' =>  $row->name,
            ]);
        }
    }
}
