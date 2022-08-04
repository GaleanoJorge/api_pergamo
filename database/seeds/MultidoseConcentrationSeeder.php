<?php

use App\Models\MultidoseConcentration;
use Illuminate\Database\Seeder;

class MultidoseConcentrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/multidose-concentration.json'));

        foreach (json_decode($data) as $row) {
            MultidoseConcentration::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
