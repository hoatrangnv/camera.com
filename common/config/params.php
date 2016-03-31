<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@camera-web1tvq.rhcloud.com',
    'user.passwordResetTokenExpire' => 3600,
    
    'fb_app_id' => '',
    'ga_id' => '',
    'gcse_cx' => '',
    
    'root_url' => 'http://',
    'backend_url' => 'http://camera-web1tvq.rhcloud.com/backend',
    'frontend_url' => 'http://camera-web1tvq.rhcloud.com',
    'images_url' => 'http://camera-web1tvq.rhcloud.com/images',
    'uploads_url' => 'http://camera-web1tvq.rhcloud.com/backend/uploads',
    
    'root_folder' => '/var/lib/openshift/56fd164b0c1e6658be00008d/app-root/repo',
    'backend_folder' => '/var/lib/openshift/56fd164b0c1e6658be00008d/app-root/repo/camera-web1tvq.rhcloud.com/backend/web',
    'frontend_folder' => '/var/lib/openshift/56fd164b0c1e6658be00008d/app-root/repo/camera-web1tvq.rhcloud.com/frontend/web',
    'images_folder' => '/var/lib/openshift/56fd164b0c1e6658be00008d/app-root/repo/camera-web1tvq.rhcloud.com/frontend/web/images',
    'uploads_folder' => '/var/lib/openshift/56fd164b0c1e6658be00008d/app-root/repo/camera-web1tvq.rhcloud.com/backend/web/uploads',

    'relative_backend_folder' => '/backend/web',
    'relative_frontend_folder' => '/frontend/web',
    'relative_images_folder' => '/frontend/web/images',
    'relative_uploads_folder' => '/backend/web/uploads',
    
    'default_image' => '',
    
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
    
    'cache_time' => [
        'short' => 60,
        'medium' => 300,
        'long' => 1800,
    ]
];
