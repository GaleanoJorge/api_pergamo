<?php

use App\Models\ChTypeProcedure;
use Illuminate\Database\Seeder;

class ChTypeProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_procedure.json'));

        foreach (json_decode($data) as $row) {
            ChTypeProcedure::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
