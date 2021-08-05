<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/item.json'));

        foreach (json_decode($data) as $row) {
            Item::create([
                'id' => $row->id,
                'item_parent_id' => $row->item_parent_id,
                'name' => $row->name,
                'code' => $row->code,
                'route' => $row->route,
                'icon' => $row->icon,
                'show_menu' => $row->show_menu,
            ]);
        }
    }
}
