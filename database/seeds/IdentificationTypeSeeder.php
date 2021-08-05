<?php

use Illuminate\Database\Seeder;
use App\Models\IdentificationType;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/identification_type.json'));

        foreach (json_decode($data) as $row) {
            IdentificationType::create([
                'name' => $row->name,
                'code' => $row->code,
                'sga_origin_fk' => $row->sga_origin_fk
            ]);
        }
    }
}
