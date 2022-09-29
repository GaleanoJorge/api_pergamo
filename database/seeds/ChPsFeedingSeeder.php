<?php

use App\Models\ChPsFeeding;
use Illuminate\Database\Seeder;

class ChPsFeedingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_feeding.json'));

        foreach (json_decode($data) as $row) {
            ChPsFeeding::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
