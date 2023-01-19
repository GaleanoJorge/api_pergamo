<?php

use App\Models\ChPsAwareness;
use Illuminate\Database\Seeder;

class ChPsAwarenessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_awareness.json'));

        foreach (json_decode($data) as $row) {
            ChPsAwareness::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
