<?php

use frontend\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row-fluid">
    <div class="col-md-2">
        <a class="logo center-block" title="<?= Yii::$app->name ?>"></a>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <div class="banner"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <?= Html::a(Yii::$app->name, 'javascript:void(0)', [
                    'class' => 'navbar-brand',
                    'onClick' => '
                        var nav_class = this.parentElement.nextElementSibling.classList;
                        if (nav_class.contains("hidden")) {
                            nav_class.remove("hidden");
                        } else {
                            nav_class.add("hidden");
                        }
                    ',
                ]) ?>
            </div>
            <ul class="nav navbar-nav hidden">
                <?php
                $menu = Menu::getData(Menu::LIMIT);
                $current_id = Menu::getCurrentId();
                foreach ($menu as $id => $item) {
                ?>
                <li <?= $id = $current_id ? 'class="active"' : '' ?>><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</div>