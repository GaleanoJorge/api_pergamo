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
                'pad_risk_id' => $row->pad_risk_id,
                'role_id' => $row->role_id,
                'scope_of_attention_id' => $row->scope_of_attention_id,
            ]);
        }
    }
}
