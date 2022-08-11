<?php

use App\Models\ChSwHousing;
use Illuminate\Database\Seeder;

class ChSwHousingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_housing.json'));

        foreach (json_decode($data) as $row) {
            ChSwHousing::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
