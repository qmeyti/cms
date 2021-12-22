<?php

return [
    [
        'title' => 'مدیریت سایت',
        'parts' => [
            [
                'icon' => 'fas fa-th-large',
                'title' => 'داشبورد',
                'url' => route('dashboard'),
                'class' => '',
                'active' => ['dashboard'],
                'items' => [],
            ],
            [
                'icon' => 'fas fa-pen-alt',
                'title' => 'نوشته ها',
                'class' => '',
                'active' => ['pages.*', 'category.*', 'tags.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست نوشته ها',
                        'url' => route('pages.index'),
                        'active' => ['pages.index', 'pages.show'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'نوشته جدید',
                        'url' => route('pages.create'),
                        'active' => ['pages.create', 'pages.edit'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'دسته بندی',
                        'url' => route('category.index'),
                        'active' => ['category.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'برچسب',
                        'url' => route('tags.index'),
                        'active' => ['tags.*'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-users',
                'title' => 'کاربران',
                'class' => '',
                'active' => ['users.*', 'roles.*', 'permissions.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست کاربران',
                        'url' => route('users.index'),
                        'active' => ['users.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'نقش کاربری',
                        'url' => route('roles.index'),
                        'active' => ['roles.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'حق دسترسی',
                        'url' => route('permissions.index'),
                        'active' => ['permissions.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ماژول',
                        'url' => route('modules.index'),
                        'active' => ['modules.*'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-puzzle-piece',
                'title' => 'ماژول ها',
                'class' => '',
                'active' => ['slides.*', 'sliders.*', 'contacts.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'url' => route('sliders.index'),
                        'active' => ['sliders.*', 'slides.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس ها',
                        'url' => route('contacts.index'),
                        'active' => ['contacts.*'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-palette',
                'title' => 'تنظیمات ظاهری',
                'class' => '',
                'active' => ['menus.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'منوها',
                        'url' => route('menus.index'),
                        'active' => ['menus.*'],
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
                'active' => ['generator', 'activitylogs.*', 'settings.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لاگ تغییرات',
                        'url' => route('activitylogs.index'),
                        'active' => ['activitylogs.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'مدیریت تنظیمات',
                        'url' => route('settings.index'),
                        'active' => ['settings.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ایجاد ماژول',
                        'url' => '/admin/generator',
                        'active' => ['generator'],
                    ],

                ],
            ],
        ]
    ],
];
