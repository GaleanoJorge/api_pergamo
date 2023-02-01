<?php

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/payment_type.json'));

        foreach (json_decode($data) as $row) {
            PaymentType::create([
                'name' => $row->name,
            ]);
        }
    }
}
