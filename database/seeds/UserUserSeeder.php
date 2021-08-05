<?php

use App\Models\UserUser;
use Illuminate\Database\Seeder;

class UserUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/user_user.json'));

        foreach (json_decode($data) as $row) {
            UserUser::create([
                'user_id' => $row->user_id,
                'user_parent_id' => $row->user_parent_id,
            ]);
        }
    }
}
