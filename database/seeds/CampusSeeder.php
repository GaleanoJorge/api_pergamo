<?php

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/campus.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Campus::create([
                'name' => $row -> name,
                'region_id' => $row ->region_id,
                'municipality_id' => $row ->municipality_id,
            ]);
        }
    }
}
