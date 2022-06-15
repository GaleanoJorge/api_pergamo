<?php

use App\Models\ChAssPattern;
use Illuminate\Database\Seeder;

class ChAssPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-pattern.json'));

        foreach (json_decode($data) as $row) {
            ChAssPattern::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
