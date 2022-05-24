<?php

use App\Models\LitersPerMinute;
use Illuminate\Database\Seeder;

class LitersPerMinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/liters_per_minute.json'));

        foreach (json_decode($data) as $row) {
            LitersPerMinute::create([
               
                'name' =>  $row->name,
            ]);
        }
    }
}
