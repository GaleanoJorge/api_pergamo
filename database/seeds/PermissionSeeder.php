<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/permission.json'));

        foreach (json_decode($data) as $row) {
            Permission::create([
                'name' => $row->name,
                'class' => $row->class,
                'icon' => $row->icon,
                'action' => $row->action,
            ]);
        }
    }
}
