<?php

namespace common\models;

use yii\db\ActiveRecord;

class Article extends Html {
    public static $image_resizes = [
        'desktop' => [300, 300],
        'mobile' => [350, 350],
        'tablet' => [640, 640],
        'small' => [120, 120],
        'tiny' => [60, 60],
    ];
    
}