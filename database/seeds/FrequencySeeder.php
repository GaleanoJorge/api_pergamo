<?php

use App\Models\Frequency;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/frequency.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Frequency::create([
                'name' => $row->name,
            ]);
        }
    }
}
