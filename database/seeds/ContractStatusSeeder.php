<?php

use App\Models\ContractStatus;
use Illuminate\Database\Seeder;

class ContractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/contract-status.json'));

        foreach (json_decode($data) as $row) {
            ContractStatus::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
