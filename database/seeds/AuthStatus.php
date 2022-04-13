<?php

use App\Models\AuthStatus;
use Illuminate\Database\Seeder;

class AuthStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/auth_status.json'));

        foreach (json_decode($data) as $row) {
            AuthStatus::create([
                'id' => $row->id,
                'name' =>  $row->name,
                'code' => $row->code,
            ]);
        }
    }
}
