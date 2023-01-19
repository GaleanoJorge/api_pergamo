<?php

use App\Models\ChAssSwing;
use Illuminate\Database\Seeder;

class ChAssSwingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-swing.json'));

        foreach (json_decode($data) as $row) {
            ChAssSwing::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
