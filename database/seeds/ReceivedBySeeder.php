<?php

use App\Models\ReceivedBy;
use Illuminate\Database\Seeder;

class ReceivedBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/received_by.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ReceivedBy::create([
                'name' => $row->name,
            ]);
        }
    }
}
