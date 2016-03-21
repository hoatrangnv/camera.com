<?php

use frontend\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row-fluid">
    <div class="col-md-2">
        <a class="logo center-block" href="<?= Url::home() ?>" title="<?= Yii::$app->name ?>"></a>
    </div>
    <div class="col-md-7">
        <div class="banner"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row-fluid">
    <div class="col-md-12">
    <ul class="menu-bar">
        <?php
        $menu = Menu::getData(Menu::LIMIT);
        $current_id = Menu::getCurrentId();
        foreach ($menu as $id => $item) {
            ?>
            <li <?= $id == $current_id ? 'class="active"' : '' ?>><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a></li>
            <?php
        }
        ?>
        <div class="clearfix"></div>
    </ul>
    </div>
</div>