<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'css/main.css',
    ];
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
