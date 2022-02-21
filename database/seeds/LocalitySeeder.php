<?php

use App\Models\Locality;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/locality.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Locality::create([
                'id' => $row -> id,
                'name' => $row -> name,
                'municipality_id' => $row ->municipality_id
            ]);
        }
    }
}
