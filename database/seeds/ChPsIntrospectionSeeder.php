<?php

use App\Models\ChPsIntrospection;
use Illuminate\Database\Seeder;

class ChPsIntrospectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_introspection.json'));

        foreach (json_decode($data) as $row) {
            ChPsIntrospection::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
