<?php

use App\Models\AcademicLevel;
use Illuminate\Database\Seeder;

class AcademicLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/academic_level.json'));

        foreach (json_decode($data) as $row) {
            AcademicLevel::create([
                'name' => $row->name,
            ]);
        }
    }
}
