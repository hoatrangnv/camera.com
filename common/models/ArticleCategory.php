<?php
namespace common\models;

use yii\db\ActiveRecord;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductCategory
 *
 * @author quyet
 */
class ArticleCategory extends ActiveRecord {
    //put your code here
    public static $image_resizes = [
        'desktop' => [660, 660],
        'mobile' => [220, 220],
        'tablet' => [400, 400],
    ];
    
    public static $banner_resizes = [
        'desktop' => [1370, 1370],
        'mobile' => [420, 420],
        'tablet' => [780, 780],
    ];
    
}
