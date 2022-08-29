<?php

use App\Models\FixedNomProduct;
use Illuminate\Database\Seeder;

class FixedNomProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_nom_product.json'));

        foreach (json_decode($data) as $row) {
            FixedNomProduct::create([
                'fixed_clasification_id' =>  $row->fixed_clasification_id,
                'name' =>  $row->name,
            ]);
        }
    }
}
