<?php

namespace common\models;

use common\utils\FileUtils;
use Yii;
use yii\db\ActiveRecord;

class Html extends ActiveRecord {
    //put your code here
    /** 
   * function ->getImage ($suffix, $refresh) 
   */ 
   public $_image; 
   public function getImage ($suffix = null, $refresh = false) 
   { 
       if ($this->_image === null || $refresh == true) { 
           $this->_image = FileUtils::getImage([ 
               'imageName' => $this->image, 
               'imagePath' => $this->image_path, 
               'imagesFolder' => Yii::$app->params['images_folder'], 
               'imagesUrl' => Yii::$app->params['images_url'], 
               'suffix' => $suffix, 
               'defaultImage' => Yii::$app->params['default_image'] 
           ]); 
       } 
       return $this->_image; 
   }
    
    public $a = '';
    public $img = '';

    public function astrong($params = '', $value = '') {
        return $this->a($params, $value, true);
    }

    public function a($params = '', $value = '', $strong = false) {
        $result = "<a href=\"{$this->getLink()}\" title=\"" . str_replace("\"", "'", $this->name) . "\"";
        if (is_array($params)) {
            if (count($params) > 0) {
                foreach ($params as $attr => $val) {
                    if ($attr == 0) {
                        $result .= "class=\"$val\"";
                    } else if ($attr == 1) {
                        $result .= "id=\"$val\"";
                    } else {
                        $result .= $attr . "=\"$val\"";
                    }
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        $ins_opentag = '';
        $ins_closetag = '';
        if ($strong) {
            $ins_opentag = '<strong>';
            $ins_closetag = '</strong>';
        }
        if ($value != '') {
            $result .= ">$ins_opentag{$value}$ins_closetag</a>";
        } else {
            $result .= ">$ins_opentag{$this->name}$ins_closetag</a>";
        }
        return $result;
    }

    public function img($suffix = null, $params = []) {
        $result = "<img title=\"" . str_replace("\"", "'", $this->name) . "\" alt=\"" . str_replace("\"", "'", $this->name) . "\"";
        $has_src = false;
        if (is_array($params)) {
            foreach ($params as $attr => $val) {
                if ($attr == 0) {
                    $result .= "class=\"$val\"";
                } else if ($attr == 1) {
                    $result .= "id=\"$val\"";
                } else {
                    $result .= "$attr=\"$val\"";
                }
                if ($attr == 'src') {
                    $has_src = true;
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        if (!$has_src) {
            $result .= "src=\"{$this->getImage($suffix, true)}\">";
        }
        return $result;
    }
    
    /**
    * function ->getBanner ($suffix, $refresh)
    */
    public $_banner;
    public function getBanner ($suffix = null, $refresh = false)
    {
        if ($this->_banner === null || $refresh == true) {
            $this->_banner = FileUtils::getImage([
                'imageName' => $this->banner,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_banner;
    }
    
}
