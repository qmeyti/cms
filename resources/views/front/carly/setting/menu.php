<?php


return [
    [
        'title' => 'مدیریت قالب',
        'parts' => [
            [
                'icon' => 'fas fa-gem',
                'title' => 'تنظیمات قالب',
                'class' => '',
                'active' => ['template.*'],
                'items' => [
                    [
                        'icon' => '',
                        'title' => 'سر صفحه',
                        'active' => ['template.create' => ['module' => 'header']],
                        'url' => route('template.create', ['module' => 'header']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'اسلایدر',
                        'active' => ['template.create' => ['module' => 'slider']],
                        'url' => route('template.create', ['module' => 'slider']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'درباره ما',
                        'active' => ['template.create' => ['module' => 'about']],
                        'url' => route('template.create', ['module' => 'about']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'همکاران',
                        'active' => ['template.create' => ['module' => 'brand']],
                        'url' => route('template.create', ['module' => 'brand']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'خدمات',
                        'active' => ['template.create' => ['module' => 'service']],
                        'url' => route('template.create', ['module' => 'service']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'نمونه کارها',
                        'active' => ['template.create' => ['module' => 'case']],
                        'url' => route('template.create', ['module' => 'case']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'تماس با ما',
                        'active' => ['template.create' => ['module' => 'contact']],
                        'url' => route('template.create', ['module' => 'contact']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'وبلاگ',
                        'active' => ['template.create' => ['module' => 'blog']],
                        'url' => route('template.create', ['module' => 'blog']),
                    ],
                    [
                        'icon' => '',
                        'title' => 'پاصفحه',
                        'active' => ['template.create' => ['module' => 'footer']],
                        'url' => route('template.create', ['module' => 'footer']),
                    ],
                ],
            ]
        ]
    ],
];
