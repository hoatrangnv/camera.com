<?php

namespace frontend\controllers;

use frontend\models\Product;
use frontend\models\Redirect;
use Yii;

class ProductController extends BaseController
{
    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($product = Product::find()->where(['slug' => $slug])->andWhere(['<=', 'published_at', strtotime('now')])->one()) {
            $this->link_canonical = $product->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            if ($cate = $product->getProductCategory()) {
                $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $cate->getLink()];            
                $related_products = $cate->getProducts(['limit' => 3, 'orderBy' => 'rand()', 'id_not_equal' => $product->id]);
            }
            $this->breadcrumbs[] = ['label' => $product->name, 'url' => $this->link_canonical];            
            
            if (!$this->seo_exist) {
                $this->page_title = $product->page_title;
                $this->h1 = $product->h1;
                $this->meta_title = $product->meta_title;
                $this->meta_description = $product->meta_description;
                $this->meta_keywords = $product->meta_keywords;
                $this->long_description = $product->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $product->getImage();
            }
            
            $product->view_count++;
            $product->save();
            
            return $this->render('index', [
                'product' => $product,
                'related_products' => $related_products ? $related_products : array()
            ]);
        } else {
            Redirect::go();
        }
    }
    
    public function actionCounter()
    {
        $id = Yii::$app->request->post('id');
        if ($model = Product::findOne(['id' => $id])) {
            $comment_count = Yii::$app->request->post('comment_count');
            $like_count = Yii::$app->request->post('like_count');
            $share_count = Yii::$app->request->post('share_count');
            if (!empty($comment_count)) {
                $model->comment_count = $comment_count;
                $model->save();
            }
            if (!empty($like_count)) {
                $model->like_count = $like_count;
                $model->save();
            }
            if (!empty($share_count)) {
                $model->share_count = $share_count;
                $model->save();
            }
        }
    }

}
