<?php

use App\Models\ContractType;
use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/contract-type.json'));

        foreach (json_decode($data) as $row) {
            ContractType::create([
        
                'name' =>  $row->name,
            ]);
        }
    }
}
