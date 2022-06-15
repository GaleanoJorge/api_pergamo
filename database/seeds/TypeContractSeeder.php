<?php

use App\Models\ContractType;
use App\Models\TypeContract;
use Illuminate\Database\Seeder;

class TypeContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type-contract.json'));

        foreach (json_decode($data) as $row) {
            TypeContract::create([
        
                'name' =>  $row->name,
            ]);
            
        }
    }
}
