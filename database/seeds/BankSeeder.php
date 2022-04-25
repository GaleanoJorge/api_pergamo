<?php

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/bank.json'));

        foreach (json_decode($data) as $row) {
            Bank::create([
               
                'code' => $row->code,
                'name' => $row->name,
            ]);
        }
    }
}
