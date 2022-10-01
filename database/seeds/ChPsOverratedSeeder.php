<?php

use App\Models\ChPsOverrated;
use Illuminate\Database\Seeder;

class ChPsOverratedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_overrated.json'));

        foreach (json_decode($data) as $row) {
            ChPsOverrated::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
