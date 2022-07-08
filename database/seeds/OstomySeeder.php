<?php

use App\Models\Ostomy;
use Illuminate\Database\Seeder;

class OstomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ostomy.json'));

        foreach (json_decode($data) as $row) {
            Ostomy::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
