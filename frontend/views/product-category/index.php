<section class="products-group">
    <h1><?= $cate->name ?></h1>
    <div class="list">
        <?php
        foreach ($products as $item) {
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