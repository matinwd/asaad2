<?php

return [
    'use_package_routes'       => false,

    'allow_private_folder'     => false,

    'private_folder_name'      => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,

    'allow_shared_folder'      => true,

    'shared_folder_name'       => 'shares',

    'folder_categories'        => [
        'file'  => [
            'folder_name'  => 'files',
            'startup_view' => 'list',
            'max_size'     => 50000, // size in KB
            'valid_mime'   => [
                'application/pdf',
                'video/mp4',
                'audio/mp3',
            ],
            'valid_extension'   => [
                'pdf',
                'mp4',
                'mp3',
            ],
        ],
        'image' => [
            'folder_name'  => 'photos',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'valid_mime'   => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
            'valid_extension'   => [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'ico',
            ],
        ],
    ],

    'paginator' => [
        'perPage' => 30,
    ],

    'disk'                     => 'lfm',

    'rename_file'              => true,

    'rename_duplicates'        => true,

    'alphanumeric_filename'    => true,

    'alphanumeric_directory'   => true,

    'should_validate_size'     => true,

    'should_validate_mime'     => true,

    'should_validate_extension'     => true,

    // behavior on files with identical name
    // setting it to true cause old file replace with new one
    // setting it to false show `error-file-exist` error and stop upload
    'over_write_on_duplicate'  => false,


    // If true, image thumbnails would be created during upload
    'should_create_thumbnails' => false,

    'thumb_folder_name'        => 'thumbs',

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes'         => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],

    'thumb_img_width'          => 200, // px

    'thumb_img_height'         => 200, // px

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
     */

    'file_type_array'          => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
    ],

    'php_ini_overrides'        => [
        'memory_limit' => '256M',
    ],
];
