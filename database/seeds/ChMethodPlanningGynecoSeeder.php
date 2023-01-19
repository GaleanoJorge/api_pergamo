<?php

use App\Models\ChMethodPlanningGyneco;
use Illuminate\Database\Seeder;

class ChMethodPlanningGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_method_planning_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChMethodPlanningGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
