<?php

return [
    [
        'icon' => 'fa fa-dashboard',
        'section' => ' منوی کاربری',
        'items' =>
            [
                [
                    'icon' => 'fa fa-newspaper-o',
                    'title' => 'صفحات و اخبار',
                    'url' => route('pages.index'),
                ],
                [
                    'icon' => 'fa fa-code-fork',
                    'title' => 'دسته بندی',
                    'url' => route('category.index'),
                ],
                [
                    'icon' => 'fa fa-tag',
                    'title' => 'برچسب',
                    'url' => route('tags.index'),
                ],
                [
                    'icon' => 'fa fa-picture-o',
                    'title' => 'اسلایدر',
                    'url' => route('slider.index'),
                ],
                [
                    'icon' => 'fa fa-users',
                    'title' => 'کاربران',
                    'url' => route('users.index'),
                ],
                [
                    'icon' => 'fa fa-certificate',
                    'title' => 'نقش های کاربران',
                    'url' => route('roles.index'),
                ],
                [
                    'icon' => 'fa fa-random',
                    'title' => 'حقوق دسترسی',
                    'url' => route('permissions.index'),
                ],
                [
                    'icon' => 'fa fa-magic',
                    'title' => 'مدیریت منوها',
                    'url' => route('menus.index'),
                ],
                [
                    'icon' => 'fa fa-tasks',
                    'title' => 'لاگ تغییرات',
                    'url' => route('activitylogs.index'),
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
                    'url' => route('settings.index'),
                ],
                [
                    'icon' => 'fa fa-puzzle-piece',
                    'title' => 'ایجاد ماژول',
                    'url' => '/admin/generator',
                ],
            ],
    ],
];
