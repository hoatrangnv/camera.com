<?php
namespace common\models;

use yii\db\ActiveRecord;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductImage
 *
 * @author quyet
 */
class ProductImage extends ActiveRecord{
    //put your code here
    public static $image_resizes = [
        'desktop' => [640, 640],
        'mobile' => [400, 400],
        'tablet' => [740, 740],
    ];
    
}
