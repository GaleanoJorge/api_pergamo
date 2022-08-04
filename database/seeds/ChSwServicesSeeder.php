<?php

use App\Models\ChSwServices;
use Illuminate\Database\Seeder;

class ChSwServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_services.json'));

        foreach (json_decode($data) as $row) {
            ChSwServices::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
