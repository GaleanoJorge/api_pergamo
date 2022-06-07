<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/country.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Country::create([
                'name' => $row->name,
                'sga_origin_fk' => $row->sga_origin_fk,
                'code' => $row->code,
            ]);
        }
    }
}
