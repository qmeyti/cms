<?php


return [
    [
        'title' => 'مدیریت قالب',
        'permissions' => ['show-posts'],
        'parts' => [
            [
                'icon' => 'fas fa-gem',
                'title' => 'تنظیمات قالب',
                'class' => '',
                'active' => ['template.*'],
                'permissions' => ['show-posts'],

                'items' => [
                    [
                        'icon' => '',
                        'title' => 'سر صفحه',
                        'active' => ['template.create' => ['module' => 'header']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'header']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'صحفه ی اصلی',
                        'active' => ['template.create' => ['module' => 'slider']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'slider']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'درباره ما',
                        'active' => ['template.create' => ['module' => 'about']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'about']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'همکاران',
                        'active' => ['template.create' => ['module' => 'brand']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'brand']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'خدمات',
                        'active' => ['template.create' => ['module' => 'service']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'service']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'نمونه کارها',
                        'active' => ['template.create' => ['module' => 'case']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'case']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس با ما',
                        'active' => ['template.create' => ['module' => 'contact']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'contact']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'وبلاگ',
                        'active' => ['template.create' => ['module' => 'blog']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'blog']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'پاصفحه',
                        'active' => ['template.create' => ['module' => 'footer']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'footer']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'سرصفحه صفحات داخلی',
                        'active' => ['template.create' => ['module' => 'inner_header']],
                        'permissions' => ['show-posts'],
                        'url' => route('template.create', ['module' => 'inner_header']),
                    ],
                ],
            ]
        ]
    ],
];
