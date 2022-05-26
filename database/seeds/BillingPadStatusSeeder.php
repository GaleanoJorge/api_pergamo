<?php

use App\Models\BillingPadStatus;
use Illuminate\Database\Seeder;

class BillingPadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/billing-pad-status.json'));

        foreach (json_decode($data) as $row) {
            BillingPadStatus::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
