<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@camera.com',
    'user.passwordResetTokenExpire' => 3600,
    
    'fb_app_id' => '',
    'ga_id' => '',
    'gcse_cx' => '',
    
    'root_url' => 'http://',
    'backend_url' => 'http://admin.camera.com',
    'frontend_url' => 'http://camera.com',
    'images_url' => 'http://camera.com/images',
    'uploads_url' => 'http://admin.camera.com/uploads',
    
    'root_folder' => '/data/website',
    'backend_folder' => '/data/website/camera.com/backend/web',
    'frontend_folder' => '/data/website/camera.com/frontend/web',
    'images_folder' => '/data/website/camera.com/frontend/web/images',
    'uploads_folder' => '/data/website/camera.com/backend/web/uploads',

    'relative_backend_folder' => '/backend/web',
    'relative_frontend_folder' => '/frontend/web',
    'relative_images_folder' => '/frontend/web/images',
    'relative_uploads_folder' => '/backend/web/uploads',
    
    'default_image' => '',
//    'allow_rm_dir_contains_less' => 20,
    
    'wph_ratios' => [
        'product_image' => 1.5,
        'product_category_image' => 1.5,
        'product_collection_image' => 1.9,
        'product_banner' => 5,
        'product_category_banner' => 5,
        'product_collection_banner' => 5,
        'discovery_image' => 1.9,
        'slideshow_item_image' => 2.63,
        'slideshow_item_image_desktop' => 2.63,
        'slideshow_item_image_mobile' => 2.1,
        'slideshow_item_image_tablet' => 2.4,
        // more
    ],

    'decive_types' => [
        'desktop' => 1,
        'mobile' => 2,
        'tablet' => 3
    ],
    
];