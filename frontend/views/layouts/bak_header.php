<?php

use frontend\models\Menu;
use frontend\models\SlideshowItem;
use yii\helpers\Url;

$menu = Menu::getData(Menu::LIMIT);
$current_id = Menu::getCurrentId();
if ($this->context->is_mobile && !$this->context->is_tablet) {
    $slideshow_item_image_ratio = Yii::$app->params['wph_ratios']['slideshow_item_image_mobile'];
    $slideshow_item_image_suffix = SlideshowItem::$image_resizes['mobile'];
} else if ($this->context->is_tablet) {
    $slideshow_item_image_ratio = Yii::$app->params['wph_ratios']['slideshow_item_image_tablet'];
    $slideshow_item_image_suffix = SlideshowItem::$image_resizes['tablet'];
} else {
    $slideshow_item_image_ratio = Yii::$app->params['wph_ratios']['slideshow_item_image_desktop'];
    $slideshow_item_image_suffix = SlideshowItem::$image_resizes['desktop'];
}
$slideshow_items = SlideshowItem::getList();
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
<nav class="navbar navbar-inverse">
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
<table class="table">
    <tr>
        <td style="width:25%;padding:0;border:none">
            <?=
            $this->render('//layouts/left')
            ?>
        </td>
        <td style="padding:0;border:none">
            <?=
            $this->render('//modules/carousel', [
                'slideshow_items' => $slideshow_items,
                'slideshow_item_image_suffix' => $slideshow_item_image_suffix
            ])
            ?>
        </td>
    </tr>
</table>
<div class="clearfix"></div>
<?php
$this->registerCss('
.navbar.navbar-inverse {
    margin-bottom: 0.5em;
}
');
