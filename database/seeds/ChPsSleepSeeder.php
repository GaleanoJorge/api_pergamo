<?php

use App\Models\ChPsSleep;
use Illuminate\Database\Seeder;

class ChPsSleepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_sleep.json'));

        foreach (json_decode($data) as $row) {
            ChPsSleep::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
