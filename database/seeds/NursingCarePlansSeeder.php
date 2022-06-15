<?php

use App\Models\NursingCarePlan;
use Illuminate\Database\Seeder;

class NursingCarePlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/nursing_care_plans.json'));

        foreach (json_decode($data) as $row) {
            NursingCarePlan::create([
                'description' => $row->description,
            ]);
        }
    }
}
