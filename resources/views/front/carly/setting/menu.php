<?php


return [
    [
        'title' => 'مدیریت پوسته',
        'parts' => [
            [
                'icon' => 'bi bi-droplet-fill',
                'title' => 'تنظیمات قالب',
                'class' => '',
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'سر صفحه',
                        'url' => route('template.create', ['module' => 'header']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'url' => route('template.create', ['module' => 'slider']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'درباره ما',
                        'url' => route('template.create', ['module' => 'about']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'همکاران',
                        'url' => route('template.create', ['module' => 'brand']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'خدمات',
                        'url' => route('template.create', ['module' => 'service']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'نمونه کارها',
                        'url' => route('template.create', ['module' => 'case']),
                    ],
                ],
            ]
        ]
    ],
];
