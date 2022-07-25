<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/company.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Company::create([
                'id' => $row->id,
                'identification_type_id' => $row->identification_type_id,
                'identification' => $row->identification,
                'verification' => $row->verification,
                'name' => $row->name,
                'company_category_id' => $row->company_category_id,
                'company_type_id' => $row->company_type_id,
                'administrator' => $row->administrator,
                'country_id' => $row->country_id,
                'city_id' => $row->city_id,
                'municipality_id' => $row->municipality_id,
                'address' => $row->address,
                'phone' => $row->phone,
                'web' => $row->web,
                'mail' => $row->mail,
                'representative' => $row->representative,
                'repre_phone' => $row->repre_phone,
                'repre_mail' => $row->repre_mail,
                'repre_identification' => $row->repre_identification,
                'iva_id' => $row->iva_id,
                'retiner_id' => $row->retiner_id,
                'company_kindperson_id' => $row->company_kindperson_id,
                'registration' => $row->registration,
                'opportunity' => $row->opportunity,
                'discount' => $row->discount,
                'payment_terms_id' => $row->payment_terms_id,
            ]);
        }
    }
}
