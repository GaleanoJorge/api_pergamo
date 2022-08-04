<?php

use App\Models\ChSwHousingType;
use Illuminate\Database\Seeder;

class ChSwHousingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_housing_type.json'));

        foreach (json_decode($data) as $row) {
            ChSwHousingType::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
