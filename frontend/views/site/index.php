<?php

use frontend\models\Product;
use frontend\models\SlideshowItem;
$slideshow = [];
foreach (SlideshowItem::find()->where(['is_active' => 1])->all() as $item) {
    $slideshow[] = [
        'image' => $item->getImage(),
        'caption' => $item->caption,
        'alt' => $item->caption,
        'link' => $item->link
    ];
}
?>
<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 300,
        'time_out' => 3000,
        'auto_run' => true,
        'pause_on_hover' => true
    ]
]) ?>
<section class="products-group">
    <h2>Sản phẩm bán chạy</h2>
    <div class="list">
        <?php
        foreach (Product::getProducts() as $item) {
        ?>
        <a class="product-item" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
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