<?php

use App\Models\CompanyKindperson;
use Illuminate\Database\Seeder;

class CompanyKindpersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/company-kindperson.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            CompanyKindperson::create([
                'name' => $row->name,
            ]);
        }
    }
}
