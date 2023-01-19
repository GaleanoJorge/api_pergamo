<?php

use App\Models\ChTypeBackground;
use Illuminate\Database\Seeder;

class ChTypeBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_background.json'));

        foreach (json_decode($data) as $row) {
            ChTypeBackground::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
