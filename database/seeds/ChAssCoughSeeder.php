<?php

use App\Models\ChAssCough;
use Illuminate\Database\Seeder;

class ChAssCoughSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-cough.json'));

        foreach (json_decode($data) as $row) {
            ChAssCough::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
