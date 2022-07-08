<?php

use App\Models\ChSigns;
use Illuminate\Database\Seeder;

class ChSignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-sings.json'));

        foreach (json_decode($data) as $row) {
            ChSigns::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
