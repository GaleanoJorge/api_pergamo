<?php

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-category.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProductCategory::create([
                'name' => $row->name,
                'product_group_id' => $row->product_group_id,
            ]);
        }
    }
}
