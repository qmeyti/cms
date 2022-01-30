<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::create(
            [

                'label' =>'',
                'link' =>'',
                'type' =>'url',
                'parent'=>null,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        $menu = Menu::create([
                'name' => 'منوی اصلی',
        ]);


        $menu->items()->create(
            [

            'label' =>'خانه',
            'link' =>'front.home',
            'type' =>'route',
            'parent'=>1,
            'sort' =>0,
            'depth' =>0,
        ]
        );

        $menu->items()->create(
            [

                'label' =>'درباره ما',
                'link' =>'front.about-us',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        $menu->items()->create(
            [

                'label' =>'خدمات',
                'link' =>'front.service',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        $menu->items()->create(
            [

                'label' =>'نمونه کارها',
                'link' =>'front.portfolio',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        $menu->items()->create(
            [

                'label' =>'وبلاگ',
                'link' =>'front.blog',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        $menu->items()->create(
            [
                'label' =>'تماس با ما',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

    }
}
