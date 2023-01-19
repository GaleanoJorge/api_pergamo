<?php

use App\Models\FixedStock;
use Illuminate\Database\Seeder;

class FixedStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_stock.json'));

        foreach (json_decode($data) as $row) {
            FixedStock::create([
                'fixed_type_id' =>  $row->fixed_type_id,
                'campus_id' =>  $row->campus_id,
            ]);
        }
    }
}
