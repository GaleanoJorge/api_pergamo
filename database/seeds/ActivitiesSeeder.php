<?php

use App\Models\Activities;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/activities.json'));

        foreach (json_decode($data) as $row) {
            Activities::create([
                'code' => $row->code,
                'name' =>  $row->name,
            ]);
        }
    }
}
