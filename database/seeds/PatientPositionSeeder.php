<?php

use App\Models\PatientPosition;
use Illuminate\Database\Seeder;

class PatientPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/patient_position.json'));

        foreach (json_decode($data) as $row) {
            PatientPosition::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
