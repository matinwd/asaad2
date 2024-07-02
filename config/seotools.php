<?php

return [
    'meta' => [
        'defaults'       => [
            'title'        => "Ductcen",
            'titleBefore'  => true,
            'description'  => 'Ductcen company',
            'separator'    => ' | ',
            'keywords'     => ['Ductcen','Shopping','GoodShopping','HealthCare'],
            'canonical'    => true,
            'robots'       => 'all',
        ],
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => 'Ductcen',
            'description' => 'Ductcen company',
            'url'         => true,
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title'       => 'Ductcen',
            'description' => 'Ductcen company',
            'url'         => true,
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];