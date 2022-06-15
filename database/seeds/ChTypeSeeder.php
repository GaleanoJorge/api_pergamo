<?php

use App\Models\ChType;
use Illuminate\Database\Seeder;

class ChTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type.json'));

        foreach (json_decode($data) as $row) {
            ChType::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
