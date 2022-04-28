<?php

use App\Models\ContractType;
use App\Models\Packing;
use Illuminate\Database\Seeder;

class PackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/packing.json'));

        foreach (json_decode($data) as $row) {
            Packing::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
