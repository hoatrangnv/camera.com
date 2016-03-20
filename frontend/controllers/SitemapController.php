<?php

namespace frontend\controllers;

use frontend\models\ArticleCategory;
use Yii;
use yii\web\Response;

class SitemapController extends BaseController
{
    public $layout;
    
    public function actionIndex()
    {
        if(!$items = ArticleCategory::find()->where(['is_active'=>1])->all()){
            $items = [new ArticleCategory];
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
        $this->layout = false;
        
        return $this->render('index', ['items' => $items]);
    }
    
    public function actionArticleCategory()
    {
        $slug = Yii::$app->request->get('slug', '');
        
        if (!$cate = ArticleCategory::find()->where(['slug' => $slug])->andWhere(['is_active'=>1])->one()) {
            return $this->redirect(['index']);
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
        $this->layout = false;
        
        return $this->render('article-category', ['cate' => $cate]);     
    }

}
