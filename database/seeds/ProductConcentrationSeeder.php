<?php

use App\Models\ProductConcentration;
use Illuminate\Database\Seeder;

class ProductConcentrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-concentration.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProductConcentration::create([
                'value' => $row->value,
            ]);
        }
    }
}
