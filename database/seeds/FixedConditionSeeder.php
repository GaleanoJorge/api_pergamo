<?php

use App\Models\FixedCondition;
use Illuminate\Database\Seeder;

class FixedConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_condition.json'));

        foreach (json_decode($data) as $row) {
            FixedCondition::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
