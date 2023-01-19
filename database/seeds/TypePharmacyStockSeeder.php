<?php

use App\Models\ContractType;
use App\Models\TypePharmacyStock;
use Illuminate\Database\Seeder;

class TypePharmacyStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type-pharmacy-stock.json'));

        foreach (json_decode($data) as $row) {
            TypePharmacyStock::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
