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

        ////////////////////////

        $footermenu1 = Menu::create([
            'name' => 'منوی فوتر 1',
        ]);

        $footermenu1->items()->create(
            [
                'label' =>' توسعه دهنده',
                'link' =>'front.contact',
                'parent'=>1,

                'type' =>'route',
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu1->items()->create(
            [
                'label' =>' تجارت الکترونیک',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );
        $footermenu1->items()->create(
            [
                'label' =>'طراحی سایت',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );

        $footermenu1->items()->create(
            [
                'label' =>'برند تجاری',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu1->items()->create(
            [
                'label' =>' شبکه ملی',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        ////////////////////////

        $footermenu2 = Menu::create([
            'name' => 'منوی فوتر 2',
        ]);

        $footermenu2->items()->create(
            [
                'label' =>' صفحه اصلی',
                'link' =>'front.contact',
                'parent'=>1,
                'type' =>'route',
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu2->items()->create(
            [
                'label' =>'درباره ما',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );
        $footermenu2->items()->create(
            [
                'label' =>'وبلاگ',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );

        $footermenu2->items()->create(
            [
                'label' =>' تیم فنی',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu2->items()->create(
            [
                'label' =>'سوالات متداول',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

        /////////////////////////////////////////////

        $footermenu3 = Menu::create([
            'name' => 'منوی فوتر 3',
        ]);

        $footermenu3->items()->create(
            [
                'label' =>' ایران ، اهواز',
                'link' =>'front.contact',
                'parent'=>1,
                'type' =>'route',
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu3->items()->create(
            [
                'label' =>'021-87654321',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );
        $footermenu3->items()->create(
            [
                'label' =>'وبلاگ',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );

        $footermenu3->items()->create(
            [
                'label' =>' تیم فنی',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ],
        );
        $footermenu3->items()->create(
            [
                'label' =>'mail@everb.com',
                'link' =>'front.contact',
                'type' =>'route',
                'parent'=>1,
                'sort' =>0,
                'depth' =>0,
            ]
        );

    }
}
