<?php

use App\Models\CompanyType;
use Illuminate\Database\Seeder;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/company-type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            CompanyType::create([
                'name' => $row->name,
            ]);
        }
    }
}
