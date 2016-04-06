<?php

namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\Redirect;
use Yii;
use yii\helpers\Url;

class ArticleController extends BaseController
{
    const ITEMS_PER_PAGE = 10;
    
    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($article = Article::find()->where(['slug' => $slug])->andWhere(['<=', 'published_at', strtotime('now')])->one()) {
            $this->link_canonical = $article->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            if ($cate = $article->getArticleCategory()) {
                $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $cate->getLink()];            
                $related_articles = $cate->getArticles(['limit' => 3, 'orderBy' => 'rand()', 'id_not_equal' => $article->id]);
            }
            $this->breadcrumbs[] = ['label' => $article->name, 'url' => $this->link_canonical];            
            
            if (!$this->seo_exist) {
                $this->page_title = $article->page_title;
                $this->h1 = $article->h1;
                $this->meta_title = $article->meta_title;
                $this->meta_description = $article->meta_description;
                $this->meta_keywords = $article->meta_keywords;
                $this->long_description = $article->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $article->getImage();
            }
            
            $article->view_count++;
            $article->save();
            
            return $this->render('index', [
                'article' => $article,
                'related_articles' => $related_articles ? $related_articles : array()
            ]);
        } else {
            Redirect::go();
        }
    }
    
    public function actionCounter()
    {
        $id = Yii::$app->request->post('id');
        if ($model = Article::findOne(['id' => $id])) {
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
    
    public function actionViewAll()
    {
        $this->link_canonical = Url::to(['article/view-all'], true);
        $this->breadcrumbs[] = ['label' => 'Tin tức', 'url' => $this->link_canonical];
        
        $page = Yii::$app->request->get('page', 0);
        if ($page > 0) {
            $this->meta_index = 'noindex';
            $this->meta_follow = 'nofollow';
            $this->page_title .= " - trang $page";
            $this->meta_keywords .= " - trang $page";
            $this->meta_description .= " - trang $page";
        }
        $page = $page > 0 ? $page : 1;
        
        $articles = Article::getArticles([
            'limit' => static::ITEMS_PER_PAGE,
            'offset' => ($page - 1) * static::ITEMS_PER_PAGE,
        ]);
        
        $totalItems = count(Article::getArticles());

        $total = ceil($totalItems / static::ITEMS_PER_PAGE);
        $firstItemOnPage = ($totalItems > 0) ? ($page-1) * static::ITEMS_PER_PAGE + 1 : 0;
        $lastItemOnPage = ($totalItems < $page * static::ITEMS_PER_PAGE) ? $totalItems : $page * static::ITEMS_PER_PAGE;
        $pagination = [
            'firstItemOnPage' => $firstItemOnPage,
            'lastItemOnPage' => $lastItemOnPage,
            'totalItems' => $totalItems,
            'current' => $page,
            'total' => $total,
        ];

        return $this->render('view-all', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
}
