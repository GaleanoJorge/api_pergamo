<?php

use App\Models\NursingProcedure;
use Illuminate\Database\Seeder;

class NursingProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/nursing-procedure.json'));

        foreach (json_decode($data) as $row) {
            NursingProcedure::create([
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->description,
            ]);
        }
    }
}
