<?php

use App\Models\PaymentTerms;
use Illuminate\Database\Seeder;

class PaymentTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/payment-terms.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            PaymentTerms::create([
                'name' => $row->name,
                'term' => $row->term,
            ]);
        }
    }
}
