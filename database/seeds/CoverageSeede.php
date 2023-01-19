<?php

use App\Models\Coverage;
use Illuminate\Database\Seeder;

class CoverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/coverage.json'));

        foreach (json_decode($data) as $row) {
            Coverage::create([
                'id' => $row->id,
                'code' => $row->code,
                'name' =>  $row->name,
            ]);
        }
    }
}
