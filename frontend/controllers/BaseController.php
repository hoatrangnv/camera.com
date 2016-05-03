<?php
namespace frontend\controllers;

use common\utils\MobileDetect;
use frontend\models\SeoInfo;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Base Controller
 */
class BaseController extends Controller {
    public
    $link_canonical,
    $page_title,
    $meta_title,
    $meta_keywords,
    $meta_description,
    $long_description,
    $h1,
    $meta_index,
    $meta_follow,
    $meta_image,
    $breadcrumbs = array(),
    $seo_exist = false,
    $seo_image_exist = false,
    $is_mobile,
    $is_tablet;
    
    public function init()
    {
        parent::init();
        
        $this->meta_index = 'index';
        $this->meta_follow = 'follow';
        $mobile_detect = new MobileDetect;
        $this->is_mobile = $mobile_detect->isMobile();
        $this->is_tablet = $mobile_detect->isTablet();
        $this->meta_image = Yii::$app->params['default_image'];
        $this->breadcrumbs[] = ['label' => 'Trang chủ', 'url' => Url::home()];
        $this->h1 = 'Camera quan sát, camera văn phòng, đầu ghi chính hãng';
        
        if ($seoInfo = SeoInfo::getCurrent()) {
            $this->seo_exist = true;
            
            $this->page_title = $seoInfo->page_title;
            $this->h1 = $seoInfo->h1;
            $this->meta_title = $seoInfo->meta_title;
            $this->meta_description = $seoInfo->meta_description;
            $this->meta_keywords = $seoInfo->meta_keywords;
            $this->long_description = $seoInfo->long_description;
            if ($seoInfo->getImage() !== null) {
                $this->seo_image_exist = true;
                $this->meta_image = $seoInfo->getImage();
            }
        }    
    }
}