<?php

use App\Models\StatusBill;
use Illuminate\Database\Seeder;

class StatusBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/status_bill.json'));

        foreach (json_decode($data) as $row) {
            StatusBill::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
