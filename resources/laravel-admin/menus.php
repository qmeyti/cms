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
                'items' => [],
            ],
            [
                'icon' => 'fas fa-pen-alt',
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
                'icon' => 'fas fa-users',
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
                'icon' => 'fas fa-puzzle-piece',
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
                'icon' => 'fas fa-palette',
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
                'icon' => 'fas fa-tools',
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
