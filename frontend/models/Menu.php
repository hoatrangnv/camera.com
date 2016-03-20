<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{
    
    const LIMIT = 10;
    public static $data = array();

    public static function getData($limit = null, $offset = null)
    {
        static::$data[] = ['label' => 'Trang chủ', 'url' => Yii::$app->params['frontend_url'], 'level' => 1, 'parent_id' => null];
        $productCategories = ProductCategory::getProductCategories(['is_parent' => true, 'limit' => $limit, 'offset' => $offset, 'orderBy' => 'is_hot desc, position asc']);
        foreach ($productCategories as $item) {
            static::$data[] = ['label' => $item->name, 'url' => $item->getLink(), 'level' => 2, 'parent_id' => null];
        }
        return static::$data;
    }
    
    public static function getCurrentId($data = null)
    {
        !empty($data) or $data = static::getData();
        $url = Yii::$app->request->absoluteUrl;
        !is_numeric($question_mark_pos = strpos($url, '?'))
        or $url = substr($url, 0, $question_mark_pos - strlen($url));
        $arr1 = explode('/', $url);
        $current_id = -1;
        $min = 0;
        foreach ($data as $id => $item) {
            $arr2 = explode('/', $item['url']);
            $count_diff = count(array_diff($arr1, $arr2));
            if ($id == 0 || $count_diff < $min) {
                $current_id = $id;
                $min = $count_diff;
            }
        }
        return $current_id;
    }
    
}