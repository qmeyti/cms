<?php

return [
    [
        'title' => 'مدیریت سایت',
        'parts' => [
            [
                'icon' => 'fas fa-th-large',
                'title' => 'داشبورد',
                'url'=> route('dashboard'),
                'class' => 'active',
                'active' => [],
                'items' => [],
            ],
            [
                'icon' => 'fas fa-pen-alt',
                'title' => 'نوشته ها',
                'class' => '',
                'active' => [],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست نوشته ها',
                        'url' => route('pages.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'نوشته جدید',
                        'url' => route('pages.create'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'دسته بندی',
                        'url' => route('category.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'برچسب',
                        'url' => route('tags.index'),
                        'active' => [],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-users',
                'title' => 'کاربران',
                'class' => '',
                'active' => [],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست کاربران',
                        'url' => route('users.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'نقش کاربری',
                        'url' => route('roles.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'حق دسترسی',
                        'url' => route('permissions.index'),
                        'active' => [],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-puzzle-piece',
                'title' => 'ماژول ها',
                'class' => '',
                'active' => [],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'url' => route('slider.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس ها',
                        'url' => route('contacts.index'),
                        'active' => [],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-palette',
                'title' => 'تنظیمات ظاهری',
                'class' => '',
                'active' => [],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'منوها',
                        'url' => route('menus.index'),
                        'active' => [],
                    ],
                ],
            ],
        ]
    ],
    [
        'title' => 'ابزار مدیریتی',
        'parts' => [
            [
                'icon' => 'fas fa-tools',
                'title' => 'ابزار',
                'class' => '',
                'active' => [],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لاگ تغییرات',
                        'url' => route('activitylogs.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'مدیریت تنظیمات',
                        'url' => route('settings.index'),
                        'active' => [],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ایجاد ماژول',
                        'url' => '/admin/generator',
                        'active' => [],
                    ],

                ],
            ],
        ]
    ],
];
