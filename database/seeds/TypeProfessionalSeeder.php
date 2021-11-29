<?php

use App\Models\TypeProfessional;
use Illuminate\Database\Seeder;

class TypeProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type-professional.json'));

        foreach (json_decode($data) as $row) {
            TypeProfessional::create([
        
                'name' =>  $row->name,
            ]);
        }
    }
}
