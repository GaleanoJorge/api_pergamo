<?php

use App\Models\TypeConsents;
use Illuminate\Database\Seeder;

class TypeConsentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type_consents.json'));

        foreach (json_decode($data) as $row) {
            TypeConsents::create([
                
                'name' => $row->name,
            ]);
        }
    }
}
