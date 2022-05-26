<?php

use App\Models\NomProduct;
use Illuminate\Database\Seeder;

class NomProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/nom-product.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            NomProduct::create([
                'name' => $row->name,
                'product_subcategory_id' => $row->product_subcategory_id,
            ]);
        }
    }
}
