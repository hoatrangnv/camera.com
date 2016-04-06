<?php

use frontend\models\Product;
use frontend\models\SlideshowItem;
$slideshow = [];
foreach (SlideshowItem::find()->where(['is_active' => 1])->all() as $item) {
    $slideshow[] = [
        'caption' => $item->caption,
        'link' => $item->link,
        'img_src' => $item->getImage(),
        'img_alt' => $item->caption,
    ];
}
?>
<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 300,
        'time_out' => 3000,
        'auto_run' => false,
        'pause_on_hover' => true
    ]
]) ?>
<section class="list-view">
    <h2>Sản phẩm bán chạy</h2>
    <div class="list">
        <?php
        foreach (Product::getProducts() as $item) {
        ?>
        <a class="thumb" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="image">
                <img src="<?= $item->getImage() ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <h3><?= $item->name ?></h3>
            <p class="desc"><?= $item->description ?></p>
            <div class="clr"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>