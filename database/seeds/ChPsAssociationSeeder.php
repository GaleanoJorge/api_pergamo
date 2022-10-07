<?php

use App\Models\ChPsAssociation;
use Illuminate\Database\Seeder;

class ChPsAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_association.json'));

        foreach (json_decode($data) as $row) {
            ChPsAssociation::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
