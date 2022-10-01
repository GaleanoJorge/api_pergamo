<?php

use App\Models\ChPsAnger;
use Illuminate\Database\Seeder;

class ChPsAngerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_anger.json'));

        foreach (json_decode($data) as $row) {
            ChPsAnger::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
