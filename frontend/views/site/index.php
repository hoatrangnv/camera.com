<?php

use frontend\models\Product;

?>
<?= $this->render('//modules/slideshow') ?>
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