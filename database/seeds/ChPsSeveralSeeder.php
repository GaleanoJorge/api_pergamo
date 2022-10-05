<?php

use App\Models\ChPsSeveral;
use Illuminate\Database\Seeder;

class ChPsSeveralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_several.json'));

        foreach (json_decode($data) as $row) {
            ChPsSeveral::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
