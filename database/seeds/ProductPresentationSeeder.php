<?php

use App\Models\AdministrationRoute;
use App\Models\ProductPresentation;
use Illuminate\Database\Seeder;

class ProductPresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/product-presentation.json'));

        foreach (json_decode($data) as $row) {
            ProductPresentation::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
