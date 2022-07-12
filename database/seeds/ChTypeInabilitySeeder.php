<?php

use App\Models\ChTypeInability;
use Illuminate\Database\Seeder;

class ChTypeInabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_inability.json'));

        foreach (json_decode($data) as $row) {
            ChTypeInability::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
