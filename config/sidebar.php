<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dashboard Sidebar Menu
    |--------------------------------------------------------------------------
    |
    | Here you can define the sidebar menu for your application. It will be
    | displayed on the dashboard page. You can also specify the translation
    | key for each menu item.
    |
    */

    [
        'route' => 'dashboard',
        'icon' => 'ti ti-home',
        'locales' => [
            'en' => 'Dashboard',
            'ar' => 'لوحة التحكم',
        ],
    ],

    [
        'icon' => 'ti ti-clipboard',
        'locales' => [
            'en' => 'Utilities',
            'ar' => 'الأدوات',
        ],

        'children' => [
            [
                'route' => 'memos.index',
                'locales' => [
                    'en' => 'Memos',
                    'ar' => 'المذكرات',
                ],
            ],

            [
                'route' => 'qr-code.index',
                'locales' => [
                    'en' => 'QR Code',
                    'ar' => 'رمز الاستجابة السريعة',
                ],
            ],

            [
                'route' => 'impersonate.create',
                'locales' => [
                    'en' => 'Impersonate',
                    'ar' => 'تسجيل الدخول كمستخدم',
                ],
            ],
        ],
    ],

    [
        'icon' => 'ti ti-settings',
        'locales' => [
            'en' => 'Settings',
            'ar' => 'الإعدادات',
        ],

        'children' => [
            [
                'route' => 'profile.edit',
                'locales' => [
                    'en' => 'Profile',
                    'ar' => 'الملف الشخصي',
                ],
            ],

            [
                'route' => 'roles.index',
                'locales' => [
                    'en' => 'Roles',
                    'ar' => 'الصلاحيات',
                ],
            ],

            [
                'route' => 'admins.index',
                'locales' => [
                    'en' => 'Admins',
                    'ar' => 'المشرفين',
                ],
            ],

            [
                'route' => 'language.index',
                'locales' => [
                    'en' => 'Language',
                    'ar' => 'اللغة',
                ],
            ],
        ],
    ],
];
