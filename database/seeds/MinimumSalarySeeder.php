<?php

use App\Models\MinimumSalary;
use Illuminate\Database\Seeder;

class MinimumSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jMinimumSalary = file_get_contents(database_path('json/minimum_salary.json'));
        
        foreach(json_decode($jMinimumSalary) as $row){
            MinimumSalary::create([
                'value' => $row->value,
                'year' => $row->year,
            ]);
        }
    }
}
