<?php

use App\Models\ChPsSexuality;
use Illuminate\Database\Seeder;

class ChPsSexualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_sexuality.json'));

        foreach (json_decode($data) as $row) {
            ChPsSexuality::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
