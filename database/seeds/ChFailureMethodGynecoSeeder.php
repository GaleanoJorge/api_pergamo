<?php

use App\Models\ChFailureMethodGyneco;
use Illuminate\Database\Seeder;

class ChFailureMethodGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_failure_method_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChFailureMethodGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
