<?php

use App\Models\Tariff;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jTariff = file_get_contents(database_path('json/tariff.json'));

        foreach (json_decode($jTariff) as $row) {
            Tariff::create([
                'name' => $row->name,
                'amount' => $row->amount,
                'quantity' => $row->quantity,
                'extra_dose' => $row->extra_dose,
                'phone_consult' => $row->phone_consult,
                'status_id' => $row->status_id,
                'pad_risk_id' => $row->pad_risk_id,
                'program_id' => $row->program_id,
                'type_of_attention_id' => $row->type_of_attention_id,
                'admissions_id' => $row->admissions_id,
                'failed' => $row->failed,
            ]);
        }
    }
}
