<?php

use App\Models\PriceType;
use Illuminate\Database\Seeder;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/price-type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            PriceType::create([
                'name' => $row->name,
            ]);
        }
    }
}
