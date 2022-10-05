<?php

use App\Models\ChPsInsufficiency;
use Illuminate\Database\Seeder;

class ChPsInsufficiencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_insufficiency.json'));

        foreach (json_decode($data) as $row) {
            ChPsInsufficiency::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
