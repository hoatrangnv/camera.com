<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'content:ntext',
            'slug',
            'old_slugs',
            'description',
            'image',
            'image_path',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'h1',
            'view_count',
            'like_count',
            'comment_count',
            'share_count',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'auth_alias',
            'is_hot',
            'position',
            'status',
            'long_description:ntext',
            'published_at',
            'is_active',
        ],
    ]) ?>

</div>
