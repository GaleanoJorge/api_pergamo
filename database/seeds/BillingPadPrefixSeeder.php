<?php

use App\Models\BillingPadPrefix;
use Illuminate\Database\Seeder;

class BillingPadPrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jBillingPadPrefix = file_get_contents(database_path('json/billing_pad_prefix.json'));
        
        foreach(json_decode($jBillingPadPrefix) as $row){
            BillingPadPrefix::create([
                'name' => $row->name,
            ]);
        }
    }
}
