<?php

use App\Models\OxygenType;
use Illuminate\Database\Seeder;

class OxygenTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/oxygen_type.json'));

        foreach (json_decode($data) as $row) {
            OxygenType::create([
               
                'name' =>  $row->name,
            ]);
        }
    }
}
