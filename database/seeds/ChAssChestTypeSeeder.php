<?php

use App\Models\ChAssChestType;
use Illuminate\Database\Seeder;

class ChAssChestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-chest-type.json'));

        foreach (json_decode($data) as $row) {
            ChAssChestType::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
