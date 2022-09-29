<?php

use App\Models\ChPsFear;
use Illuminate\Database\Seeder;

class ChPsFearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_fear.json'));

        foreach (json_decode($data) as $row) {
            ChPsFear::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
