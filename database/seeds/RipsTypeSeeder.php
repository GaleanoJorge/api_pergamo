<?php

use App\Models\RipsType;
use Illuminate\Database\Seeder;

class RipsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/rips-type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            RipsType::create([
                'name' => $row->name,
                'rips_typefile_id' => $row->rips_typefile_id,
            ]);
        }
    }
}
