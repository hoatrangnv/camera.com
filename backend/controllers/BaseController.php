<?php
namespace backend\controllers;

use backend\models\ProductCategory;
use backend\models\ProductToProductCategory;
use backend\models\Tag;
use frontend\models\ArticleCategory;
use frontend\models\ArticleToArticleCategory;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Base controller
 */
class BaseController extends Controller {
    public $product_id, $tags_idToName;
    public $ncp, $ncpc, $nca, $ncac;
    public function init() {
        parent::init();
        $this->tags_idToName = ArrayHelper::map(Tag::find()->all(), 'id', 'name');
        
        /////////////////
        $ncp = [];
        $ncpc = [];
        $product_categories = ProductCategory::find()->all();
        foreach ($product_categories as $item) {
           if (!ProductToProductCategory::find()->where(['product_category_id' => $item->id])->one()) {
               $ncp[$item->id] = $item->name;
           }
           if (!ProductCategory::find()->where(['parent_id' => $item->id])->one()) {
               $ncpc[$item->id] = $item->name;
           }
        }
        $this->ncp = $ncp;
        $this->ncpc = $ncpc;
        
        /////////////////
        $nca = [];
        $ncac = [];
        $article_categories = ArticleCategory::find()->all();
        foreach ($article_categories as $item) {
           if (!ArticleToArticleCategory::find()->where(['article_category_id' => $item->id])->one()) {
               $nca[$item->id] = $item->name;
           }
           if (!ArticleCategory::find()->where(['parent_id' => $item->id])->one()) {
               $ncac[$item->id] = $item->name;
           }
        }
        $this->nca = $nca;
        $this->ncac = $ncac;
    }
}
