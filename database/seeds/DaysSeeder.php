<?php

use App\Models\Days;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/days.json'));

        foreach (json_decode($data) as $row) {
            Days::create([
                'name' => $row->name,
            ]);
        }
    }
}
