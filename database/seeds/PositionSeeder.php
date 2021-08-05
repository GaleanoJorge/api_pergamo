<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/position.json'));

        foreach (json_decode($jStatus) as $row) {
            Position::create([
                'name' => $row->name,
                'status_id' => $row->status_id,
                'sga_origin_fk' => $row->sga_origin_fk
            ]);
        }
    }
}
