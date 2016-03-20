<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
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
                    return Html::img($model->getImage(), ['style'=>'max-height:110px;max-width:110px']);
                },
            ],            
            'name',
//            'code',
//            'slug',
//            'old_slugs',
            // 'price',
            // 'original_price',
            // 'banner',
            // 'image_path',
            // 'details:ntext',
            // 'description',
            // 'long_description:ntext',
            // 'page_title',
            // 'h1',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',
            // 'is_hot',
            [
                'attribute' => 'is_active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_active === 1 ? Html::tag('span', 'Ok', ['class' => 'label label-info']) : Html::tag('span', '<span class="fa fa-close"></span>', ['class' => 'label label-danger']);
                },
            ],
            // 'status',
            // 'position',
            // 'view_count',
            // 'like_count',
            // 'share_count',
            // 'comment_count',
            // 'published_at',
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($model) {
                    return date('Y-m-d H:i', $model->created_at);
                },
            ],
            // 'updated_at',
             'created_by',
            // 'updated_by',
            // 'available_quantity',
            // 'order_quantity',
            // 'sold_quantity',
            // 'total_quantity',
            // 'total_revenue',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
