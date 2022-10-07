<?php

use App\Models\ChPsObsessive;
use Illuminate\Database\Seeder;

class ChPsObsessiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_obsessive.json'));

        foreach (json_decode($data) as $row) {
            ChPsObsessive::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
