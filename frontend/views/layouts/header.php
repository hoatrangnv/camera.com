<?php

use frontend\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row-fluid">
    <div class="col-md-2">
        <a class="logo center-block" href="<?= Url::home() ?>" title="<?= Yii::$app->name ?>"></a>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <div class="banner"></div>
    </div>
    <div class="clearfix"></div>
</div>
<nav class="navbar navbar-image">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::home() ?>"><?= Yii::$app->name ?></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
                $menu = Menu::getData(Menu::LIMIT);
                $current_id = Menu::getCurrentId();
                foreach ($menu as $id => $item) {
                    ?>
                    <li <?= $id == $current_id ? 'class="active"' : '' ?>><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="clearfix"></div>