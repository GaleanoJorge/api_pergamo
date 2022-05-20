<?php

use App\Models\ProductGroup;
use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-group.json'));

        foreach (json_decode($data) as $row) {
            ProductGroup::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
