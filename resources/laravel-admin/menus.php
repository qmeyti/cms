<?php

return [
    [
        'title' => 'مدیریت سایت',
        'parts' => [
            [
                'icon' => 'bi bi-grid-fill',
                'title' => 'داشبورد',
                'url'=> route('dashboard'),
                'class' => 'active',
                'items' => [],
            ],
            [
                'icon' => 'bi bi-pen-fill',
                'title' => 'نوشته ها',
                'class' => '',
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست نوشته ها',
                        'url' => route('pages.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'نوشته جدید',
                        'url' => route('pages.create'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'دسته بندی',
                        'url' => route('category.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'برچسب',
                        'url' => route('tags.index'),
                    ],
                ],
            ],
            [
                'icon' => 'bi bi-people-fill',
                'title' => 'کاربران',
                'class' => '',
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست کاربران',
                        'url' => route('users.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'نقش های کاربران',
                        'url' => route('roles.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'حقوق دسترسی',
                        'url' => route('permissions.index'),
                    ],
                ],
            ],
            [
                'icon' => 'bi bi-puzzle-fill',
                'title' => 'ماژول ها',
                'class' => '',
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'url' => route('slider.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس ها',
                        'url' => route('contacts.index'),
                    ],
                ],
            ],
            [
                'icon' => 'bi bi-palette-fill',
                'title' => 'تنظیمات ظاهری',
                'class' => '',
                'items' => [

                    [
                        'icon' => '',
                        'title' => 'منوها',
                        'url' => route('menus.index'),
                    ],
                ],
            ],
        ]
    ],
    [
        'title' => 'ابزار مدیریتی',
        'parts' => [
            [
                'icon' => 'bi bi-tools',
                'title' => 'ابزار',
                'class' => '',
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لاگ تغییرات',
                        'url' => route('activitylogs.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'مدیریت تنظیمات',
                        'url' => route('settings.index'),
                    ],
                    [
                        'icon' => '',
                        'title' => 'ایجاد ماژول',
                        'url' => '/admin/generator',
                    ],

                ],
            ],
        ]
    ],
];
