<?php


return [
    [
        'icon' => 'fa fa-laptop',
        'section' => 'تنظیمات قالب',
        'items' =>
            [
                /*[
                    'icon' => 'fa fa-home',
                    'title' => 'منوها',
                    'url' => route('template.create', ['module' => 'menu']),
                ],*/
                [
                    'icon' => 'fa fa-home',
                    'title' => 'سر صفحه',
                    'url' => route('template.create', ['module' => 'header']),
                ],
                [
                    'icon' => 'fa fa-home',
                    'title' => 'اسلایدر',
                    'url' => route('template.create', ['module' => 'slider']),
                ],
                [
                    'icon' => 'fa fa-home',
                    'title' => 'درباره ما',
                    'url' => route('template.create', ['module' => 'about']),
                ],
                [
                    'icon' => 'fa fa-home',
                    'title' => 'همکاران',
                    'url' => route('template.create', ['module' => 'brand']),
                ],
            ],
    ],
];
