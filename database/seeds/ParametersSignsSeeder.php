<?php

use App\Models\ParametersSigns;
use Illuminate\Database\Seeder;

class ParametersSignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/parameters_signs.json'));

        foreach (json_decode($data) as $row) {
            ParametersSigns::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
