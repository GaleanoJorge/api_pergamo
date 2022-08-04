<?php

use App\Models\HourlyFrequency;
use Illuminate\Database\Seeder;

class HourlyFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/hourly_frequency.json'));

        foreach (json_decode($data) as $row) {
            HourlyFrequency::create([
                'name' => $row->name,
                'value' => $row->value,
            ]);
        }
    }
}
