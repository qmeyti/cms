<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AclSeeder::class);

        $this->call(UserSeeder::class);

        $settings = [
            [
                'key' => 'template',
                'value' => 'carly',
                'user_id' => 1,
                'type' => 'string',
                'part' => null,
            ],
            [
                'key' => 'element_per_page',
                'value' => 1,
                'user_id' => 1,
                'type' => 'int',
                'part' => 'admin',
            ],
            [
                'key' => 'single_page_route_name',
                'value' => 'front.single.slug',
                'user_id' => 1,
                'type' => 'string',
                'part' => 'home',
            ],
            [
                'key' => 'page_author_name_show_model',
                'value' => 'role',//fullname-username-name-family-role
                'user_id' => 1,
                'type' => 'string',
                'part' => 'home',
            ],
            [
                'key' => 'blog_elements_per_page',
                'value' => 10,
                'user_id' => 1,
                'type' => 'int',
                'part' => 'home',
            ],
            [
                'key' => 'guest_can_write_comment',
                'value' => 1,
                'user_id' => 1,
                'type' => 'bool',
                'part' => null,
            ],
            [
                'key' => 'publish_comments_without_admin_permission',
                'value' => 1,
                'user_id' => 1,
                'type' => 'bool',
                'part' => null,
            ],
            [
                'key' => 'delay_between_comments_second',
                'value' => 120,
                'user_id' => 1,
                'type' => 'int',
                'part' => null,
            ],

            //Extra fields
            //start with (__)
            [
                'key' => '__main_menu',
                'value' => 1,
                'user_id' => 1,
                'type' => 'int',
                'part' => 'home',
            ],

            [
                'key' => '__blog_tags_limit',
                'value' => 24,
                'user_id' => 1,
                'type' => 'int',
                'part' => 'home',
            ],

        ];

        Setting::insert($settings);

        // \App\Models\User::factory(10)->create();
    }
}
