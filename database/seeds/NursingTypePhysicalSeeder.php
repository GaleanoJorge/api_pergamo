<?php

use App\Models\NursingTypePhysical;
use Illuminate\Database\Seeder;

class NursingTypePhysicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/nursing_type_physical.json'));

        foreach (json_decode($data) as $row) {
            NursingTypePhysical::create([
                'id' =>  $row->id,
                'name' =>  $row->name,
                'observation' => $row->observation,
            ]);
        }
    }
}
