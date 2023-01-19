<?php

use App\Models\TaxValueUnit;
use Illuminate\Database\Seeder;

class TaxValueUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jTaxValueUnit = file_get_contents(database_path('json/tax_value_unit.json'));
        
        foreach(json_decode($jTaxValueUnit) as $row){
            TaxValueUnit::create([
                'value' => $row->value,
                'year' => $row->year,
            ]);
        }
    }
}
