<?php

return [
    'menus' =>
        [
            [
                'icon' => 'fa fa-dashboard',
                'section' => ' منوی کاربری',
                'items' =>
                    [
                        [
                            'icon' => 'fa fa-newspaper-o',
                            'title' => 'صفحات و اخبار',
                            'url' => '/admin/pages',
                        ],
                        [
                            'icon' => 'fa fa-code-fork',
                            'title' => 'دسته بندی',
                            'url' => '/admin/category',
                        ],
                        [
                            'icon' => 'fa fa-tag',
                            'title' => 'برچسب',
                            'url' => '/admin/tags',
                        ],
                        [
                            'icon' => 'fa fa-picture-o',
                            'title' => 'اسلایدر',
                            'url' => '/admin/slider',
                        ],
                        [
                            'icon' => 'fa fa-users',
                            'title' => 'کاربران',
                            'url' => '/admin/users',
                        ],
                        [
                            'icon' => 'fa fa-certificate',
                            'title' => 'نقش های کاربران',
                            'url' => '/admin/roles',
                        ],
                        [
                            'icon' => 'fa fa-random',
                            'title' => 'حقوق دسترسی',
                            'url' => '/admin/permissions',
                        ],
                        [
                            'icon' => 'fa fa-tasks',
                            'title' => 'لاگ تغییرات',
                            'url' => '/admin/activitylogs',
                        ],
                    ],
            ],
            [
                'icon' => 'fa fa-exclamation-triangle',
                'section' => 'ابزارها',
                'items' =>
                    [
                        [
                            'icon' => 'fa fa-sliders',
                            'title' => 'مدیریت تنظیمات',
                            'url' => '/admin/settings',
                        ],
                        [
                            'icon' => 'fa fa-puzzle-piece',
                            'title' => 'ایجاد ماژول',
                            'url' => '/admin/generator',
                        ],
                    ],
            ],
        ],
];
