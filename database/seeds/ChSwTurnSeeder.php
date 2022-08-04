<?php

use App\Models\ChSwTurn;
use Illuminate\Database\Seeder;

class ChSwTurnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_turn.json'));

        foreach (json_decode($data) as $row) {
            ChSwTurn::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
