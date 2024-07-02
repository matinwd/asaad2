<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        MenuTranslation::truncate();
        Menu::truncate();

        Menu::create([
            'name' => 'header',
            'fa' => [
                'items' => [
                    [
                        'name' => 'خانه',
                        'url' => '/',
                        '_open' => false,
                    ],
                    [
                        'name' => 'معرفی شرکت',
                        'url' => 'javascript:;',
                        '_open' => false,
                        'children' => [
                            [
                                'name' => 'درباره ما',
                                'url' => '/about-us',
                                '_open' => false,
                            ],
                            [
                                'name' => 'اعضای هیئت مدیره',
                                'url' => 'javascript:;',
                                '_open' => false,
                            ]
                        ]
                    ],
                    [
                        'name' => 'فعالیت ها',
                        'url' => 'javascript:;',
                        '_open' => false,
                    ],
                    [
                        'name' => 'آموزش',
                        'url' => '/articles',
                        '_open' => false,
                    ],
                    [
                        'name' => 'اخبار',
                        'url' => '/posts',
                        '_open' => false,
                    ],
                    [
                        'name' => 'گالری تصاویر',
                        'url' => '/galleries',
                        '_open' => false,
                    ],
                    [
                        'name' => 'تماس با ما',
                        'url' => '/contact_us',
                        '_open' => false,
                    ],
                ],
            ],
            'en' => [
                'items' => [
                    [
                        'name' => 'En-خانه',
                        'url' => '/',
                        '_open' => false,
                    ],
                    [
                        'name' => 'En-معرفی شرکت',
                        'url' => 'javascript:;',
                        '_open' => false,
                        'children' => [
                            [
                                'name' => 'En-درباره ما',
                                'url' => '/about-us',
                                '_open' => false,
                            ],
                            [
                                'name' => 'En-اعضای هیئت مدیره',
                                'url' => 'javascript:;',
                                '_open' => false,
                            ]
                        ]
                    ],
                    [
                        'name' => 'En-شرکت های وابسته',
                        'url' => 'javascript:;',
                        '_open' => false,
                        'children' => [
                            [
                                'name' => 'En-تولیدی',
                                'url' => 'javascript:;',
                                '_open' => false,
                                'children' => [
                                    [
                                        'name' => 'En-شرکت یک',
                                        'url' => 'javascript:;',
                                        '_open' => false,
                                    ],
                                    [
                                        'name' => 'En-شرکت دو',
                                        'url' => 'javascript:;',
                                        '_open' => false,
                                    ]
                                ]
                            ],
                            [
                                'name' => 'En-خدماتی',
                                'url' => 'javascript:;',
                                '_open' => false,
                                'children' => [
                                    [
                                        'name' => 'En-شرکت یک',
                                        'url' => 'javascript:;',
                                        '_open' => false,
                                    ],
                                    [
                                        'name' => 'En-شرکت دو',
                                        'url' => 'javascript:;',
                                        '_open' => false,
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'En-فعالیت ها',
                        'url' => 'javascript:;',
                        '_open' => false,
                    ],
                    [
                        'name' => 'En-آموزش',
                        'url' => '/articles',
                        '_open' => false,
                    ],
                    [
                        'name' => 'En-اخبار',
                        'url' => '/posts',
                        '_open' => false,
                    ],
                    [
                        'name' => 'En-گالری تصاویر',
                        'url' => '/galleries',
                        '_open' => false,
                    ],
                    [
                        'name' => 'En-تماس با ما',
                        'url' => '/contact_us',
                        '_open' => false,
                    ],
                ],
            ],
        ]);

        Menu::create([
            'name' => 'footer',
            'fa' => [
                'items' => [
                    [
                        'name' => 'آیتم یک',
                        'url' => '/a'
                    ],
                    [
                        'name' => 'آیتم دو',
                        'url' => '/b'
                    ],
                    [
                        'name' => 'آیتم سه',
                        'url' => '/c'
                    ],
                    [
                        'name' => 'آیتم چهار',
                        'url' => '/d'
                    ],
                ],
            ],
            'en' => [
                'items' => [
                    [
                        'name' => 'Item A',
                        'url' => '/a'
                    ],
                    [
                        'name' => 'Item B',
                        'url' => '/b'
                    ],
                    [
                        'name' => 'Item C',
                        'url' => '/c'
                    ],
                    [
                        'name' => 'Item D',
                        'url' => '/d'
                    ],
                ],
            ],
        ]);

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
