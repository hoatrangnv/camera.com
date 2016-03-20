<?php
namespace backend\controllers;

use backend\models\ProductCategory;
use backend\models\Tag;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Base controller
 */
class BaseController extends Controller {
    public $product_id, $tags_idToName, $articleCategories_idToName, $parent_articleCategories_idToName, $productCategories_idToName, $parent_productCategories_idToName;
    public function init() {
        parent::init();
        $this->tags_idToName = ArrayHelper::map(Tag::find()->all(), 'id', 'name');
        
        $this->parent_articleCategories_idToName = ArrayHelper::map(ProductCategory::find()->where(['parent_id' => null])->all(), 'id', 'slug');
        foreach ($this->parent_articleCategories_idToName as $id => $slug) {
            $this->articleCategories_idToName[$slug] = ArrayHelper::map(ProductCategory::find()->where(['parent_id' => $id])->all(), 'id', 'slug');
        }
        is_array($this->articleCategories_idToName) or $this->articleCategories_idToName = array();
        
        $this->parent_productCategories_idToName = ArrayHelper::map(ProductCategory::find()->where(['parent_id' => null])->all(), 'id', 'slug');
        foreach ($this->parent_productCategories_idToName as $id => $slug) {
            $this->productCategories_idToName[$slug] = ArrayHelper::map(ProductCategory::find()->where(['parent_id' => $id])->all(), 'id', 'slug');
        }
        is_array($this->productCategories_idToName) or $this->productCategories_idToName = array();
    }
}
