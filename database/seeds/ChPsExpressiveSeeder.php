<?php

use App\Models\ChPsExpressive;
use Illuminate\Database\Seeder;

class ChPsExpressiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_expressive.json'));

        foreach (json_decode($data) as $row) {
            ChPsExpressive::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
