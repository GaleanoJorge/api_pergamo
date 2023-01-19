<?php

use App\Models\ChReason;
use Illuminate\Database\Seeder;

class ChReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_reason.json'));

        foreach (json_decode($data) as $row) {
            ChReason::create([
                'name' => $row->name,
            ]);
        }
    }
}
