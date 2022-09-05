<?php

use App\Models\FinancialData;
use Illuminate\Database\Seeder;

class FinancialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jFinancialData = file_get_contents(database_path('json/financial_data.json'));
        
        foreach(json_decode($jFinancialData) as $row){
            FinancialData::create([
                'user_id' => $row-> user_id,
                'bank_id'=> $row-> bank_id,
                'account_type_id' => $row-> account_type_id,
                'account_number'=> $row-> account_number,
                'rut'=> $row-> rut,
            ]);
        }
    }
}