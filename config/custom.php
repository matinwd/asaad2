<?php
return [
    'custom' => [
        'mainLayoutType' => 'vertical', // Options[String]: vertical(default), horizontal
        'theme' => 'light', // options[String]: 'light'(default), 'dark', 'bordered'
        'sidebarCollapsed' => false, // options[Boolean]: true, false(default) (warning:this option only applies to the vertical theme.)
        'navbarColor' => '', // options[String]: bg-primary, bg-info, bg-warning, bg-success, bg-danger, bg-dark (default: '' for #fff)
        'horizontalMenuType' => 'floating', // options[String]: floating(default) / static /sticky (Warning:this option only applies to the Horizontal theme.)
        'verticalMenuNavbarType' => 'floating', // options[String]: floating(default) / static / sticky / hidden (Warning:this option only applies to the vertical theme)
        'footerType' => 'hidden', // options[String]: static(default) / sticky / hidden
        'layoutWidth' => 'full', // options[String]: full(default) / boxed,
        'showMenu' => true, // options[Boolean]: true(default), false //show / hide main menu (Warning: if set to false it will hide the main menu)
        'bodyClass' => '', // add custom class
        'pageHeader' => true, // options[Boolean]: true(default), false (Page Header for Breadcrumbs)
        'contentLayout' => 'default', // options[String]: default, content-left-sidebar, content-right-sidebar, content-detached-left-sidebar, content-detached-right-sidebar (warning:use this option if your whole project with sidenav Otherwise override this option as page level )
        'defaultLanguage' => 'fa',    //en(default)/de/pt/fr here are four optional language provided in theme
        'blankPage' => false, // options[Boolean]: true, false(default) (warning:only make true if your whole project without navabr and sidebar otherwise override option page wise)
        'direction' => env('MIX_CONTENT_DIRECTION', 'rtl'), // Options[String]: ltr(default), rtl
    ],
    'blocks' => [
        'text' => [
            'name' => 'text',
            'component' => 'text-block',
            'title' => 'متن عادی',
            'data' => [
                'title' => '',
                'text' => '',
                'background' => '_',
                'data_bg_img' => [],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'text_slider' => [
            'name' => 'text_slider',
            'component' => 'text-slider-block',
            'title' => 'متن و اسلایدر',
            'data' => [
                'title' => '',
                'text' => '',
                'items' => [
                    [
                        'title' => '',
                        'price' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'price' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'price' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'price' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                ],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'image' => [
            'name' => 'image',
            'component' => 'file-block',
            'title' => 'رسانه (تصویر-picture)',
            'data' => [
                'type' => 'image',
                'title' => '',
                'text' => '',
                'file' => [],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'sound' => [
            'name' => 'sound',
            'component' => 'file-block',
            'title' => 'رسانه (صدا-sound)',
            'data' => [
                'type' => 'sound',
                'title' => '',
                'text' => '',
                'file' => '',
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'video' => [
            'name' => 'video',
            'component' => 'file-block',
            'title' => 'رسانه (ویدئو)',
            'data' => [
                'type' => 'video',
                'title' => '',
                'text' => '',
                'file' => '',
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'form' => [
            'name' => 'form',
            'component' => 'form-block',
            'title' => 'فرم',
            'data' => [
                'title' => '',
                'details' => '',
                'form_id' => null,
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'slider_b' => [
            'name' => 'slider_b',
            'component' => 'slider-b-block',
            'title' => 'اسلایدر ایکن',
            'data' => [
                'items' => [
                    [
                        'title' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                ],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'accordion' => [
            'name' => 'accordion',
            'component' => 'accordions-block',
            'title' => 'آکاردئون / Accordion',
            'data' => [
                'title' => '',
                'items' => [
                    [
                        'title' => '',
                        'text' => '',
                    ],
                    [
                        'title' => '',
                        'text' => '',
                    ],
                    [
                        'title' => '',
                        'text' => '',
                    ],
                ],
                'background' => '_',
                'data_bg_img' => [],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'feature_a' => [
            'name' => 'feature_a',
            'component' => 'feature-block',
            'title' => 'ویژگی ها - A',
            'data' => [
                'items' => [
                    [
                        'title' => '',
                        'description' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'description' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                    [
                        'title' => '',
                        'description' => '',
                        'icon' => '',
                        'url' => '',
                    ],
                ],
                'background' => '_',
                'data_bg_img' => [],
            ]
        ],
        'users_reviews' => [
            'name' => 'users_reviews',
            'component' => 'reviews-block',
            'title' => 'نظرات کاربران',
            'data' => [
                'items' => [
                    [
                        'description' => '',
                        'icon' => '',
                        'user_name' => '',
                        'user_job' => '',
                    ],
                    [
                        'description' => '',
                        'icon' => '',
                        'user_name' => '',
                        'user_job' => '',
                    ],
                    [
                        'description' => '',
                        'icon' => '',
                        'user_name' => '',
                        'user_job' => '',
                    ],
                    [
                        'description' => '',
                        'icon' => '',
                        'user_name' => '',
                        'user_job' => '',
                    ],
                ],
                'background' => '_',
                'data_bg_img' => [],
            ]
        ],
        'recent_posts' => [
            'name' => 'recent_posts',
            'component' => 'recent-entity-block',
            'title' => 'اخبار اخیر',
            'data' => [
                'title' => '',
                'details' => '',
                'background' => '_',
                'data_bg_img' => [],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
        'recent_products' => [
            'name' => 'recent_products',
            'component' => 'recent-entity-block',
            'title' => 'آخرین محصولات',
            'data' => [
                'title' => '',
                'details' => '',
                'background' => '_',
                'data_bg_img' => [],
                'col_lg' => '12',
                'col_md' => '12',
                'col_sm' => '12',
            ]
        ],
    ],
];