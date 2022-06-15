<?php

use App\Models\SkinStatus;
use Illuminate\Database\Seeder;

class SkinStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/skin-status.json'));

        foreach (json_decode($data) as $row) {
            SkinStatus::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
