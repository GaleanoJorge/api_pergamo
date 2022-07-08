<?php

use App\Models\ChAssMode;
use Illuminate\Database\Seeder;

class ChAssModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-mode.json'));

        foreach (json_decode($data) as $row) {
            ChAssMode::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
