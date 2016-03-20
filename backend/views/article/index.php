<?php

use backend\models\ArticleCategory;
use backend\models\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\User;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ArticleSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Tin tức';
$this->params['breadcrumbs'][] = $this->title;

yii\helpers\Url::remember();
?>
<div class="article-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img($model->getImage('--120x120'), ['style'=>'max-height:100px;max-width:100px']);
                },
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, $model->getLink(), ['style'=>'color:#04a', 'target' => '_blank']);
                },
            ],
//            'content:ntext',
            'slug',
            [
                'attribute' => 'article_category_ids',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getArticleCategory() !== null ? $model->getArticleCategory()->name : 'N/A';
                },
                'filter' => Html::activeDropDownList($searchModel, 'article_category_ids', ArrayHelper::merge(ArrayHelper::map(ArticleCategory::find()->asArray()->all(), 'id', 'name'), [0 => 'N/A']), ['class'=>'form-control', 'prompt' => '']),
            ],
//            'old_slugs',
            // 'description',
            // 'image_path',
            // 'meta_title',
            // 'meta_keywords',
            // 'meta_description',
            // 'h1',
            // 'view_count',
            // 'like_count',
            // 'comment_count',
            // 'share_count',
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($model) {
                    return date('Y-m-d H:i', $model->created_at);
                },
            ],
            // 'updated_at',
            [
                'attribute' => 'created_by',
                'filter' => Html::activeDropDownList($searchModel, 'created_by', ArrayHelper::merge(ArrayHelper::map(User::find()->asArray()->all(), 'username', 'username'), [0 => 'N/A']), ['class'=>'form-control', 'prompt' => '']),
            ],
            // 'updated_by',
            // 'auth_alias',
            // 'is_hot',
            // 'position',
            // 'status',
            // 'long_description:ntext',
            // 'published_at',
            [
                'attribute' => 'is_active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_active === 1 ? Html::tag('span', 'Ok', ['class' => 'label label-success']) : Html::tag('span', '<span class="fa fa-close"></span>', ['class' => 'label label-danger']);
                },
                'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Có', 0 => 'Không'], ['class'=>'form-control', 'prompt' => '']),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
