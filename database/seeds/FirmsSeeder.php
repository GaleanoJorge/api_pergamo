<?php

use App\Models\Firms;
use Illuminate\Database\Seeder;

class FirmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/firms.json'));

        foreach (json_decode($data) as $row) {
            Firms::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
