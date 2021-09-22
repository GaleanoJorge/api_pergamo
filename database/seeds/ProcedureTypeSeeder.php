<?php

use App\Models\ProcedureType;
use Illuminate\Database\Seeder;

class ProcedureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/procedure-type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProcedureType::create([
                'name' => $row->name,
            ]);
        }
    }
}
