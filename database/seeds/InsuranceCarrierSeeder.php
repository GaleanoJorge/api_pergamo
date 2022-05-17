<?php

use App\Models\InsuranceCarrier;
use Illuminate\Database\Seeder;

class InsuranceCarrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/insurance-carrier.json'));

        foreach (json_decode($data) as $row) {
            InsuranceCarrier::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
