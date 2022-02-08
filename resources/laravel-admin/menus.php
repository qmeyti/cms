<?php

return [

    [
        'title' => 'مدیریت سایت',
        'permissions' => ['show-posts','show-postsssdsds'],
        'parts' => [
            [
                'icon' => 'fas fa-th-large',
                'title' => 'داشبورد',
                'url' => route('dashboard'),
                'class' => '',
                'active' => ['dashboard'],
                'permissions' => ['show-posts','show-posts'],
                'items' => [],
            ],
            [
                'icon' => 'fas fa-pen-alt',
                'title' => 'نوشته ها',
                'class' => '',
                'active' => ['pages.*', 'category.*', 'tags.*'],
                'permissions' => ['show-posts','show-posts'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لیست نوشته ها',
                        'url' => route('pages.index'),
                        'active' => ['pages.index', 'pages.show'],
                        'permissions' => ['show-posts'],                    ],
                    [
                        'icon' => '',
                        'title' => 'نوشته جدید',
                        'url' => route('pages.create'),
                        'active' => ['pages.create', 'pages.edit'],
                        'permissions' => ['show-posts'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'دسته بندی',
                        'url' => route('category.index'),
                        'active' => ['category.*'],
                        'permissions' => ['show-posts'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'برچسب',
                        'url' => route('tags.index'),
                        'active' => ['tags.*'],
                        'permissions' => ['show-posts'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-users',
                'title' => 'کاربران',
                'class' => '',
                'active' => ['users.*', 'roles.*', 'permissions.*'],
                'permissions' => ['show-posts','manage-themes'],
                'items' => [
                    [

                        'icon' => '',
                        'title' => 'لیست کاربران',
                        'url' => route('users.index'),
                        'active' => ['users.*'],
                        'permissions' => ['show-posts'],                    ],
                    [
                        'icon' => '',
                        'title' => 'نقش کاربری',
                        'url' => route('roles.index'),
                        'active' => ['roles.*'],
                        'permissions' => ['show-posts'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'حق دسترسی',
                        'url' => route('permissions.index'),
                        'active' => ['permissions.*'],
                        'permissions' => ['show-posts'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ماژول',
                        'url' => route('modules.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['modules.*'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-puzzle-piece',
                'title' => 'ماژول ها',
                'class' => '',
                'permissions' => ['show-posts'],
                'active' => ['slides.*', 'sliders.*', 'contacts.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'url' => route('sliders.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['sliders.*', 'slides.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'سوالات متداول',
                        'url' => route('faq.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['faq.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس ها',
                        'url' => route('contacts.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['contacts.*'],
                    ],
                ],
            ],
            [
                'icon' => 'fas fa-palette',
                'title' => 'تنظیمات ظاهری',
                'class' => '',
                'permissions' => ['show-posts'],
                'active' => ['menus.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'منوها',
                        'url' => route('menus.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['menus.*'],
                    ],
                ],
            ],
        ]
    ],
    [
        'title' => 'ابزار مدیریتی',
        'permissions' => ['show-posts','show-posts'],
        'parts' => [
            [
                'icon' => 'fas fa-tools',
                'title' => 'ابزار',
                'class' => '',
                'active' => ['generator', 'activitylogs.*', 'settings.*'],
                'permissions' => ['show-posts'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'لاگ تغییرات',
                        'url' => route('activitylogs.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['activitylogs.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'مدیریت تنظیمات',
                        'url' => route('settings.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['settings.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ایجاد ماژول',
                        'url' => '/admin/generator',
                        'permissions' => ['show-posts'],
                        'active' => ['generator'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'چند زبان',
                        'url' => route('languages.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['languages.*'],
                    ],
                    [
                        'icon' => '',
                        'title' => 'ترجمه ها',
                        'url' => route('translationkey.index'),
                        'permissions' => ['show-posts'],
                        'active' => ['translationkey.*'],
                    ],



                ],
            ],
        ]
    ],
];
