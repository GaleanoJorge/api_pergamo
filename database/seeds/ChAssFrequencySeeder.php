<?php

use App\Models\ChAssFrequency;
use Illuminate\Database\Seeder;

class ChAssFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-frequency.json'));

        foreach (json_decode($data) as $row) {
            ChAssFrequency::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
