<?php

use App\Models\PeriodicityFrequency;
use Illuminate\Database\Seeder;

class PeriodicityFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/periodicity_frequency.json'));

        foreach (json_decode($data) as $row) {
            PeriodicityFrequency::create([
                'name' =>  $row->name,
                'days' =>  $row->days,
            ]);
        }
    }
}
