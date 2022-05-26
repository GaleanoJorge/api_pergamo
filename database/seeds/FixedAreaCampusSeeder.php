<?php

use App\Models\FixedAreaCampus;
use Illuminate\Database\Seeder;

class FixedAreaCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_area_campus.json'));

        foreach (json_decode($data) as $row) {
            FixedAreaCampus::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
