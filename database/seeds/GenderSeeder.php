<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/gender.json'));

        foreach (json_decode($data) as $row) {
            Gender::create([
                'name' => $row->name,
                'code' => $row->code,
            ]);
        }
    }
}
