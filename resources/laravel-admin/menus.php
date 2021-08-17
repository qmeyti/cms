<?php

return [
    'menus' =>
        [
            [
                'section' => 'منوی کاربری',
                'items' =>
                    [

                        [
                            'title' => 'صفحات و اخبار',
                            'url' => '/admin/pages',
                        ],
                        [
                            'title' => 'دسته بندی',
                            'url' => '/admin/category',
                        ],
                        [
                            'title' => 'برچسب',
                            'url' => '/admin/tags',
                        ],
                        [
                            'title' => 'اسلایدر',
                            'url' => '/admin/slider',
                        ],
                        [
                            'title' => 'کاربران',
                            'url' => '/admin/users',
                        ],
                        [
                            'title' => 'نقش های کاربران',
                            'url' => '/admin/roles',
                        ],
                        [
                            'title' => 'حقوق دسترسی',
                            'url' => '/admin/permissions',
                        ],
                        [
                            'title' => 'تنظیمات',
                            'url' => '/admin/settings',
                        ],
                        [
                            'title' => 'لاگ تغییرات',
                            'url' => '/admin/activitylogs',
                        ],
                    ],
            ],
            [
                'section' => 'ابزارها',
                'items' =>
                    [
                        [
                            'title' => 'سازنده',
                            'url' => '/admin/generator',
                        ],
                    ],
            ],
        ],
];
