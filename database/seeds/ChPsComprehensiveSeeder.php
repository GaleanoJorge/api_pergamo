<?php

use App\Models\ChPsComprehensive;
use Illuminate\Database\Seeder;

class ChPsComprehensiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_comprehensive.json'));

        foreach (json_decode($data) as $row) {
            ChPsComprehensive::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
