<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuBuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_menus = array(
            array(
                "id" => 1,
                "name" => "main_menu",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 2,
                "name" => "footer_menu_one",
                "created_at" => "2024-01-18 05:57:31",
                "updated_at" => "2024-01-18 05:57:31",
            ),
            array(
                "id" => 3,
                "name" => "footer_menu_two",
                "created_at" => "2024-01-18 05:57:31",
                "updated_at" => "2024-01-18 05:57:31",
            ),
            array(
                "id" => 4,
                "name" => "footer_menu_three",
                "created_at" => "2024-01-18 05:57:31",
                "updated_at" => "2024-01-18 05:57:31",
            ),
        );


        $admin_menu_items = array(
            array(
                "id" => 2,
                "label" => "Home",
                "link" => "/home",
                "parent_id" => 0,
                "sort" => 2,
                "class" => NULL,
                "menu_id" => 2,
                "depth" => 0,
                "created_at" => "2024-01-18 05:57:31",
                "updated_at" => "2024-01-18 05:57:31",
            ),
            array(
                "id" => 2,
                "label" => "About",
                "link" => "/about",
                "parent_id" => 0,
                "sort" => 1,
                "class" => NULL,
                "menu_id" => 2,
                "depth" => 0,
                "created_at" => "2024-01-18 05:57:31",
                "updated_at" => "2024-01-18 05:57:31",
            ),
        );

        DB::table('admin_menus')->insert($admin_menus);
        DB::table('admin_menu_items')->insert($admin_menu_items);

    }
}
