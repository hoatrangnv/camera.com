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
//        $cache_key = 'Main menu set data';
//        static::$data = Yii::$app->cache->get($cache_key);
//        if (!static::$data) {
//            $id = 0;
//            static::$data[$id++] = ['label' => 'Trang chủ', 'url' => Yii::$app->params['frontend_url'], 'children' => []];
//            $articleCategories = ArticleCategory::getArticleCategories(['limit' => $limit, 'offset' => $offset, 'orderBy' => 'position asc, is_hot desc']);
//            foreach ($articleCategories as $item) {
//                if ($item->parent_id === null or $item->parent_id === 0) {
//                    $children = [];
//                    foreach ($articleCategories as $child) {
//                        if ($child->parent_id === $item->id) {
//                            $children[$id++] = ['label' => $child->name, 'url' => $child->getLink()];
//                        }
//                    }
//                    static::$data[$id++] = ['label' => $item->name, 'url' => $item->getLink(), 'children' => $children];
//                }
//            }
//            Yii::$app->cache->set($cache_key, static::$data, Yii::$app->params['cache_time']['medium']);
//        }
        static::$data = [
            0 => ['label' => 'Trang chủ', 'url' => Url::home()],
            1 => ['label' => 'Giới thiệu', 'url' => Url::home() . 'gioi-thieu.html'],
            2 => ['label' => 'Sản phẩm', 'url' => Url::home() . 'san-pham'],
            3 => ['label' => 'Tin tức', 'url' => Url::home() . 'tin-tuc'],
            4 => ['label' => 'Liên hệ', 'url' => Url::home() . 'lien-he.html'],
        ];
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
    
    public static $data2 = array();
    public static function getData2()
    {
        $cache_key = 'Main menu set data';
        static::$data = Yii::$app->cache->get($cache_key);
        if (!static::$data) {
            $id = 0;
            static::$data[$id++] = ['label' => 'Trang chủ', 'url' => Yii::$app->params['frontend_url'], 'children' => []];
            $articleCategories = ArticleCategory::getArticleCategories(['limit' => $limit, 'offset' => $offset, 'orderBy' => 'position asc, is_hot desc']);
            foreach ($articleCategories as $item) {
                if ($item->parent_id === null or $item->parent_id === 0) {
                    $children = [];
                    foreach ($articleCategories as $child) {
                        if ($child->parent_id === $item->id) {
                            $children[$id++] = ['label' => $child->name, 'url' => $child->getLink()];
                        }
                    }
                    static::$data[$id++] = ['label' => $item->name, 'url' => $item->getLink(), 'children' => $children];
                }
            }
            Yii::$app->cache->set($cache_key, static::$data, Yii::$app->params['cache_time']['medium']);
        }
    }
}