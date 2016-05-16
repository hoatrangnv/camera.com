<?php

namespace frontend\controllers;

use frontend\models\ArticleCategory;
use frontend\models\ProductCategory;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SitemapController extends BaseController
{
    public $layout;
    
    public function actionIndex()
    {
        $items = [];
        $article_categories = ArticleCategory::find()->where(['parent_id' => null])->andWhere(['is_active' => 1])->all();
        $product_categories = ProductCategory::find()->where(['parent_id' => null])->andWhere(['is_active' => 1])->all();
        foreach ($article_categories as $item) {
            $items[] = Url::to(['sitemap/article', 'slug' => $item->slug], true);
        }
        foreach ($product_categories as $item) {
            $items[] = Url::to(['sitemap/product', 'slug' => $item->slug], true);
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $this->layout = false;
        
        return $this->render('index', [
            'items' => $items
        ]);
    }
    
    public function actionProduct()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($product_category = ProductCategory::find()->where(['slug' => $slug])->andWhere(['is_active' => 1])->one()) {
            
            $home = ['url' => Url::home(true), 'img' => ''];
            
            $parent = null;
            
            $category = ['url' => $product_category->getLink(), 'img' => $product_category->getImage()];
            
            $children_categories = $product_category->getChildren();
            $children = [];
            foreach ($children_categories as $item) {
                $children[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }
            
            $products = $product_category->getProducts();
            $items = [];
            foreach ($products as $item) {
                $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }

            Yii::$app->response->format = Response::FORMAT_RAW;
            $headers = Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/xml; charset=utf-8');
            $this->layout = false;

            return $this->render('details', [
                'home' => $home,
                'parent' => $parent,
                'category' => $category,
                'children' => $children,
                'items' => $items,
            ]);
        } else {
            throw new NotFoundHttpException;
        }
    }
    public function actionArticle()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($article_category = ArticleCategory::find()->where(['slug' => $slug])->andWhere(['is_active' => 1])->one()) {
            
            $home = ['url' => Url::home(true), 'img' => ''];
            
            $parent = null;
            
            $category = ['url' => $article_category->getLink(), 'img' => $article_category->getImage()];
            
            $children_categories = $article_category->getChildren();
            $children = [];
            foreach ($children_categories as $item) {
                $children[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }
            
            $articles = $article_category->getArticles();
            $items = [];
            foreach ($articles as $item) {
                $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }

            Yii::$app->response->format = Response::FORMAT_RAW;
            $headers = Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/xml; charset=utf-8');
            $this->layout = false;

            return $this->render('details', [
                'home' => $home,
                'parent' => $parent,
                'category' => $category,
                'children' => $children,
                'items' => $items,
            ]);
        } else {
            throw new NotFoundHttpException;
        }
    }
    
//    public $layout;
//    
//    public function actionIndex()
//    {
//        if(!$items = ArticleCategory::find()->where(['is_active'=>1])->all()){
//            $items = [new ArticleCategory];
//        }
//        
//        Yii::$app->response->format = Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
//        $this->layout = false;
//        
//        return $this->render('index', ['items' => $items]);
//    }
//    
//    public function actionArticleCategory()
//    {
//        $slug = Yii::$app->request->get('slug', '');
//        
//        if (!$cate = ArticleCategory::find()->where(['slug' => $slug])->andWhere(['is_active'=>1])->one()) {
//            return $this->redirect(['index']);
//        }
//        
//        Yii::$app->response->format = Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
//        $this->layout = false;
//        
//        return $this->render('article-category', ['cate' => $cate]);     
//    }

}
