<?php

use App\Models\ChSwCommunications;
use Illuminate\Database\Seeder;

class ChSwCommunicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_communications.json'));

        foreach (json_decode($data) as $row) {
            ChSwCommunications::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
