<?php

use App\Models\ContractType;
use App\Models\TypeBillingEvidence;
use Illuminate\Database\Seeder;

class TypeBillingEvidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type-billing-evidence.json'));

        foreach (json_decode($data) as $row) {
            TypeBillingEvidence::create([
        
                'name' =>  $row->name,
            ]);
        }
    }
}
