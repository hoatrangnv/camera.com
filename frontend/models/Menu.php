<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class Menu extends ActiveRecord
{
    
    const LIMIT = null;
    public static $data = array();
    
    public static function getData($limit = null, $offset = null)
    {
        $cache_key = 'Main menu set data';
//        static::$data = Yii::$app->cache->get($cache_key);
//        if (!static::$data) {
            $id = 0;
            static::$data[$id++] = ['label' => 'Trang chủ', 'url' => Url::home(true), 'children' => []];
            $productCategories = ProductCategory::getProductCategories(['limit' => $limit, 'offset' => $offset, 'orderBy' => 'position asc, is_hot desc']);
            foreach ($productCategories as $item) {
                if ($item->parent_id === null or $item->parent_id === 0) {
                    $children = [];
                    foreach ($productCategories as $child) {
                        if ($child->parent_id === $item->id) {
                            $children[$id++] = ['label' => $child->name, 'url' => $child->getLink()];
                        }
                    }
                    static::$data[$id++] = ['label' => $item->name, 'url' => $item->getLink(), 'children' => $children];
                }
            }
//            Yii::$app->cache->set($cache_key, static::$data, Yii::$app->params['cache_time']['medium']);
//        }
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
            foreach ($item['children'] as $c_id => $c_item) {
                $arr2 = explode('/', $c_item['url']);
                $count_diff = count(array_diff($arr1, $arr2));
                if ($c_id == 0 || $count_diff < $min) {
                    $current_id = $c_id;
                    $min = $count_diff;
                }
            }
        }
        return $current_id;
    }
}