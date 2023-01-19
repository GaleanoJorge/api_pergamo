<?php

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/campus.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Campus::create([
                'name' => $row->name,
                'address' => $row->address,
                'enable_code' => $row->enable_code,
                'region_id' => $row->region_id,
                'status_id' => $row->status_id,
                'billing_pad_credit_note_prefix_id' => $row->billing_pad_credit_note_prefix_id,
                'billing_pad_prefix_id' => $row->billing_pad_prefix_id,
                'municipality_id' => $row->municipality_id,
            ]);
        }
    }
}
