<?php

use App\Models\ProductSubcategory;
use Illuminate\Database\Seeder;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-sub-category.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProductSubcategory::create([
                'name' => $row->name,
                'product_category_id' => $row->product_category_id,
            ]);
        }
    }
}
