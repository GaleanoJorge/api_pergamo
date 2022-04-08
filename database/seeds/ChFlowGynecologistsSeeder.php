<?php

use App\Models\ChFlowGynecologists;
use Illuminate\Database\Seeder;

class ChFlowGynecologistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_flow_gynecologists.json'));

        foreach (json_decode($data) as $row) {
            ChFlowGynecologists::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
