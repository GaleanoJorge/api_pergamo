<?php

use App\Models\Base\ProductDose;
use Illuminate\Database\Seeder;

class ProductDoseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-dose.json'));

        foreach (json_decode($data) as $row) {
            ProductDose::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
