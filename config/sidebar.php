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
        'route' => 'dashboard.index',
        'icon' => 'ti ti-home',
        'locales' => [
            'en' => 'Dashboard',
            'ar' => 'لوحة التحكم',
        ],
    ],

    [
        'icon' => 'ti ti-world-www',
        'locales' => [
            'en' => 'Website Management',
            'ar' => 'إدارة الموقع',
        ],

        'children' => [
            [
                'route' => 'dashboard.users.index',
                'locales' => [
                    'en' => 'Users Management',
                    'ar' => 'إدارة المستخدمين',
                ],
            ],
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
                'route' => 'dashboard.memos.index',
                'locales' => [
                    'en' => 'Memos',
                    'ar' => 'المذكرات',
                ],
            ],

            [
                'route' => 'dashboard.qr-code.index',
                'locales' => [
                    'en' => 'QR Code',
                    'ar' => 'رمز الاستجابة السريعة',
                ],
            ],

            [
                'route' => 'dashboard.impersonate.create',
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
                'route' => 'dashboard.profile.edit',
                'locales' => [
                    'en' => 'Profile',
                    'ar' => 'الملف الشخصي',
                ],
            ],

            [
                'route' => 'dashboard.roles.index',
                'locales' => [
                    'en' => 'Roles',
                    'ar' => 'الصلاحيات',
                ],
            ],

            [
                'route' => 'dashboard.admins.index',
                'locales' => [
                    'en' => 'Admins',
                    'ar' => 'المشرفين',
                ],
            ],

            [
                'route' => 'dashboard.settings.edit',
                'locales' => [
                    'en' => 'Settings',
                    'ar' => 'الإعدادات',
                ],
            ],

            [
                'route' => 'dashboard.language.index',
                'locales' => [
                    'en' => 'Language',
                    'ar' => 'اللغة',
                ],
            ],
        ],
    ],
];
