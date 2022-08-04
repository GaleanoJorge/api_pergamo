<?php

use App\Models\ChSwNetwork;
use Illuminate\Database\Seeder;

class ChSwNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_network.json'));

        foreach (json_decode($data) as $row) {
            ChSwNetwork::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
