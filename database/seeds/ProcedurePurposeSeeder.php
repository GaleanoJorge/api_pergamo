<?php

use App\Models\ProcedurePurpose;
use Illuminate\Database\Seeder;

class ProcedurePurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/procedure-purpose.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProcedurePurpose::create([
                'code' => $row->code,
                'name' => $row->name,
                
            ]);
        }
    }
}
