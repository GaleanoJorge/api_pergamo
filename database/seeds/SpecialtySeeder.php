<?php

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/specialty.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Specialty::create([
                'id' => $row->id,
                'name' => $row->name,
                'status_id' => $row->status_id,
                'type_professional_id' => $row->type_professional_id
            ]);
        }
    }
}
