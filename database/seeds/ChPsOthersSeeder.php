<?php

use App\Models\ChPsOthers;
use Illuminate\Database\Seeder;

class ChPsOthersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_others.json'));

        foreach (json_decode($data) as $row) {
            ChPsOthers::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
