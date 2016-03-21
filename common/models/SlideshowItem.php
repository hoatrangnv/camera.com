<?php
namespace common\models;
use yii\db\ActiveRecord;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlideshowItem
 *
 * @author quyet
 */
class SlideshowItem extends ActiveRecord {
    //put your code here
    const DEVICE_TYPE_DESKTOP = 1;
    const DEVICE_TYPE_MOBILE = 2;
    const DEVICE_TYPE_TABLET = 3;
    
    public static $image_resizes = [
        'desktop' => [1180, 1180],
        'mobile' => [420, 420],
        'tablet' => [780, 780],
    ];

}
