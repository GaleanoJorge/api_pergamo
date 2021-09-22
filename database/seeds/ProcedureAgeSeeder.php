<?php

use App\Models\ProcedureAge;
use Illuminate\Database\Seeder;

class ProcedureAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/procedure-age.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProcedureAge::create([
                'name' => $row->name,
                'begin' => $row->begin,
                'end' => $row->end,
                
                
            ]);
        }
    }
}
