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
        $settings = [
            [
                'key'     => 'template',
                'value'   => 'carly',
                'user_id' => 1,
                'type'    => 'string',
                'part'    => null,
            ],
            [
                'key'     => 'element_per_page',
                'value'   => 1,
                'user_id' => 1,
                'type'    => 'int',
                'part'    => 'admin',
            ],


            //Extra fields
            //start with (__)
            [
                'key'     => '__main_menu',
                'value'   => 1,
                'user_id' => 1,
                'type'    => 'int',
                'part'    => 'home',
            ],

        ];

        Setting::insert($settings);

        // \App\Models\User::factory(10)->create();
    }
}
