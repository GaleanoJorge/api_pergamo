<?php

use App\Models\ChTypeGynecologists;
use Illuminate\Database\Seeder;

class ChTypeGynecologistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_gynecologists.json'));

        foreach (json_decode($data) as $row) {
            ChTypeGynecologists::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
