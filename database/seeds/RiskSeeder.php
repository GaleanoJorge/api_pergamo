<?php

use App\Models\Risk;
use Illuminate\Database\Seeder;

class RiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/risk.json'));

        foreach (json_decode($data) as $row) {
            Risk::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
