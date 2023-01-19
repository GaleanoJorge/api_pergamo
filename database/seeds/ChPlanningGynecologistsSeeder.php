<?php

use App\Models\ChPlanningGynecologists;
use Illuminate\Database\Seeder;

class ChPlanningGynecologistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_planning_gynecologists.json'));

        foreach (json_decode($data) as $row) {
            ChPlanningGynecologists::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
