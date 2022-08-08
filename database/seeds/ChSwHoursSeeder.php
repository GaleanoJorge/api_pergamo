<?php

use App\Models\ChSwHours;
use Illuminate\Database\Seeder;

class ChSwHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_hours.json'));

        foreach (json_decode($data) as $row) {
            ChSwHours::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
