<?php

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/relationship.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Relationship::create([
                'name' => $row->name,
            ]);
        }
    }
}
