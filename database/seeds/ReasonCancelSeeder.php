<?php

use App\Models\ReasonCancel;
use Illuminate\Database\Seeder;

class ReasonCancelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/reason-cancel.json'));

        foreach (json_decode($data) as $row) {
            ReasonCancel::create([
                'id' =>  $row->id,
                'name' =>  $row->name,
                'status_id' =>  $row->status_id,
            ]);
        }
    }
}
